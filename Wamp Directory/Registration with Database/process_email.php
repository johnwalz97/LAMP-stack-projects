<?php
    session_start();
    require_once("new-connection.php");    
    
    
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'] = "<p>You did not enter a valid email address</p>";
        header("LOCATION: index.php");
        exit();
    }
    else {
        $email = $_POST["email"];
        $_SESSION['email'] = $email;
        $new_email = run_mysql_query("INSERT INTO emails (email, created_at, updated_at) VALUES ('$email', NOW(), NOW())");
        header ("LOCATION: success.php");
        die();
    }
?>