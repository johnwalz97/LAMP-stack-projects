<?php
    session_start();
    require_once("new-connection.php");
    if(!isset($_SESSION['status'])){
        header("LOCATION: index.php");
        die();
    }
    $array_of_ids = fetch_all("SELECT id FROM messages WHERE created_at >=NOW() - INTERVAL 30 MINUTE AND user_id = '".$_SESSION['user_id']."'");
    $ids = array();
    foreach($array_of_ids as $array){
        array_push($ids, $array['id']);
    }
    $messages = fetch_all("SELECT messages.id, messages.user_id, messages.message, messages.created_at, users.first_name, users.last_name FROM messages LEFT JOIN users ON messages.user_id = users.id ORDER BY messages.id DESC");
    $user_name = fetch_record("SELECT first_name, last_name FROM users WHERE id = ".$_SESSION['user_id']);
    $name = $user_name['first_name']." ".$user_name['last_name'];
    //print_r($emails);
?>
<!DOCTYPE html>
    
<html>
<head>
    <title>The Wall</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="background"></div>
    <div class="header">
        <h1>Coding Dojo Wall!</h1>
        <h3 class="head">Welcome, <span><?=$name;?></span></h3>
        <form class="head" action="process.php" method="post">
            <input  type="hidden" name="action" value="logoff">
            <input type="submit" value="Log Off">
        </form>
    </div>
    <div class="wrapper">
        <form action="process.php" method="post" class="post_message">
            <input type="hidden"  name="action" value="post_message">
            <h2>Post a Message:</h2>
            <textarea name="message"></textarea>
            <input type="submit" value="Post Message">
        </form>
        <?php
            foreach ($messages as $message){ ?>
                <div class="message">
                    <h4><span><?=$message['first_name']?> <?=$message['last_name']?></span>- <?=$message['created_at']?></h1>
                    <p><?=$message['message']?></p>
                    <?php
                        if($message['user_id'] == $_SESSION['user_id']&& in_array($message['id'], $ids)){?>
                            <form class="delete" action="process.php" method="post">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="message_id" value="<?=$message['id'];?>">
                                <input type="submit" value="Delete Message!">
                            </form>
                    <?php } ?>
                <?php
                    $comments = fetch_all("SELECT comments.comment, users.first_name, users.last_name, comments.created_at FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.message_id = ".$message['id']);
                    foreach ($comments as $comment){ ?>
                        <div class="comment">
                            <h4><span><?=$comment['first_name']?> <?=$comment['last_name']?></span>- <?=$comment['created_at']?></h1>
                            <p><?=$comment['comment']?></p>
                        </div>
                <?php } ?>
                <form class="comment" action="process.php" method="post">
                    <input type="hidden"  name="action" value="post_comment">
                    <h5>Post a Comment:</h5>
                    <textarea name="comment"></textarea>
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="message_id" value="<?=$message['id']?>">
                    <input type="submit" value="Post Comment">
                </form> 
                </div>
        <?php } ?>
    </div>
</body>
</html>