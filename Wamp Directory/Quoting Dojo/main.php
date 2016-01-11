<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
    
<html>
<head>
    <title>Quoting Dojo</title>
    <style>
        h1 {
            text-align: center;
            font-size: 40px;
        }
        .quote {
            height: auto;
            width: 80%;
            margin-left: 10%;
            border-bottom: solid thick black;
        }
        .quote p {
            margin-left: 100px;
        } 
    </style>
</head>

<body>
    <h1>Here are the awesome quotes!</h1>
    <?php
        $array = fetch_all("SELECT quote, user, created_at FROM quotes");
        //var_dump($array);
        foreach($array as $entry){?>
            <div class="quote">
                <h4><?=$entry["quote"];?></h4>
                <p>- <?=$entry["user"];?> at <?=$entry["created_at"];?></p>
            </div>
    <?php } ?>
</body>
</html>