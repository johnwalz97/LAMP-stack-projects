<?php
    session_start();
    require_once("new-connection.php");
    $emails = fetch_all("SELECT email as 'Email', created_at as '' FROM emails");
    //print_r($emails);
?>
<!DOCTYPE html>
    
<html>
<head>
    <title>Success Page</title>
    <style>
        .emails{
            width: 550px;
            margin-left: 50px;
        }
        .emails p {
            color: blue;
        }
        .emails span{
            margin-left: 20px
        }
    </style>
</head>

<body>
    <div class="success">
        <h1>The email address you entered (<?=$_SESSION['email'];?>) is a Valid email address! Thank you!</h1>
    </div>
    <h1>Email Addresses Entered:</h1>
    <div class="emails"><?php
        for($i=0; $i<count($emails); $i++){
            echo "<p>Email: ".$emails[$i]['Email']."<span>".$emails[$i]['']."</span></p>";
        }  
    ?></div>
</body>
</html>