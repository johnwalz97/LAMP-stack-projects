<?php
    session_start();
    session_destroy;
    $errors = array();
    if(empty($_POST['user_name'])){
        $errors[] = "You must enter your name!";
    };
    if(empty($_POST['quote'])){
        $errors[] = "You must enter a quote!";
    };
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("LOCATION: index.php");
        die();
    }
    else {
        require_once("connection.php");
        run_mysql_query("INSERT INTO quotes (user, quote, created_at) VALUES ('".$_POST['user_name']."', '".$_POST['quote']."', NOW())");
        header("LOCATION: main.php");        
    };
?>