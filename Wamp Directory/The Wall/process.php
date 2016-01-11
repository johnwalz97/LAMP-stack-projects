<?php
session_start();
require_once("new-connection.php");

//if user is registering
if($_POST['action'] == 'register'){
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $password =  $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $errors = array();

        
    foreach($_POST as $key => $value){
        if(empty($value)){
            $errors[] = "<p>".ucfirst($key)." cannot be empty.</p>";
        }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "<p>You did not enter a valid email address</p>";
    }
    if(preg_match('/[0-9]/',$first_name)){
        $errors[] = "<p>Your first name cannot contain numbers.</p>";
    }
    if(preg_match('/[0-9]/',$last_name)){
        $errors[] = "<p>Your last name cannot contain numbers.</p>";
    }    
    if(strlen($password) <= 6 && strlen($password) > 0){
        $errors[] = "<p>Your password is too short</p>";
    }
    if($password !== $confirm_password){
        $errors[] = "<p>Your passwords do not match</p>";
    }
    if(preg_match('/\s/', $first_name)){
        $errors[] = "<p>Your first name cannot be more than one word and cannot have any space after it.</p>";
    }
    if(preg_match('/\s/', $last_name)){
        $errors[] = "<p>Your first name cannot be more than one word and cannot have any space after it.</p>";
    }
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("LOCATION: index.php");
        exit();
    }
    else {
        $query = "INSERT INTO users (email, first_name, last_name, password, created_at) VALUES ('".escape_this_string($email)."', '".escape_this_string($first_name)."', '".escape_this_string($last_name)."', '".escape_this_string($password)."', NOW())";
        $_SESSION['user_id'] = run_mysql_query($query);
        $_SESSION['status'] = "logged_in";
        header("LOCATION: home.php");
        exit();
    }
}

//if user is Logging in
if($_POST['action'] == 'login'){
    $errors = array();
    if(empty($_POST['email'])){
        $errors[] = "Email cannot be left blank";
    }
    if(empty($_POST['password'])){
        $errors[] = "Password cannot be left blank";
    }
    if(!empty($errors)){
        $_SESSION['log_errors'] = $errors;
        header("LOCATION: index.php");
        exit();
    }
    else{
        $query = "SELECT id FROM users WHERE email = '".escape_this_string($_POST['email'])."' && password = '".escape_this_string($_POST['password'])."'";
        $logged_in = fetch_record($query);
        //var_dump($logged_in);
        if(!empty($logged_in)){
            $_SESSION['status'] = 'logged_in';
            $_SESSION['user_id'] = $logged_in['id'];           
            header("LOCATION: home.php");
            exit();
        }
        else{
            $errors[] = "Your email or password is incorrect.";
            $_SESSION['log_errors'] = $errors;
            header("LOCATION: index.php");
            exit();
        }
    }
}


//if user is posting a message
if($_POST['action'] == 'post_message'){
    $query = "INSERT INTO messages (user_id, message, created_at, updated_at) VALUES ('".escape_this_string($_SESSION['user_id'])."', '".escape_this_string($_POST['message'])."', NOW(), NOW())";
    run_mysql_query($query);
    header("LOCATION: home.php");
    exit();
}

//if user is posting a comment
if($_POST['action'] == 'post_comment'){
    $query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at) VALUES ('".escape_this_string($_POST['message_id'])."','".escape_this_string($_POST['user_id'])."', '".escape_this_string($_POST['comment'])."', NOW(), NOW())";
    run_mysql_query($query);
    header("LOCATION: home.php");
    exit();
}

//if user is logging off
if($_POST['action'] == 'logoff') {
    header("LOCATION: index.php");
    session_destroy();
    exit();
}

//if user is deleting his message
if($_POST['action'] == 'delete'){
    $query = "DELETE FROM messages WHERE id = ".escape_this_string($_POST['message_id']);
    run_mysql_query($query);
    header("LOCATION: home.php");
    exit();
}
?>