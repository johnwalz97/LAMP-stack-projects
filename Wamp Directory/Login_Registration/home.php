<?php
    //session_start();
    //require_once("new-connection.php");
    //$emails = fetch_all("SELECT email as 'Email', created_at as '' FROM emails");
    //print_r($emails);
?>
<!DOCTYPE html>
    
<html>
<head>
    <title>Success Page</title>
</head>

<body>
    <h1>Welcome to the site</h1>
    <form action="process.php">
        <input type="submit" value="Log Off">
    </form>
</body>
</html>

<!--<!DOCTYPE html>
    
<html>
<head>
    <title>Quoting Dojo</title>
</head>

<body>
    <h1>Welcome to Quoting Dojo</h1>
    //<?php
    //    session_start();
    //    if(!empty($_SESSION['errors'])){
    //        foreach($_SESSION['errors'] as $error){
    //            echo $error."<br/>";
    //        }
    //    }
    //?>
    <form action="process.php" method="post">
        <p>Your name:
        <input type="text" name="user_name">
        </p>
        <p>Your quote"
        <textarea name="quote"></textarea>
        </p>
        <input type="submit" value="Add my quote!">
    </form>
    <form action="main.php" method="post">
        <input type="submit" value="Skip to quotes!">
    </form>
</body>
</html>-->