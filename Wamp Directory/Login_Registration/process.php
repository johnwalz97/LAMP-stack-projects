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
        run_mysql_query("INSERT INTO users (email, first_name, last_name, password, created_at) VALUES ('".$email."', '".$first_name."', '".$last_name."', '".$password."', NOW())");
        $_SESSION['status'] = "logged_in";
        header("LOCATION: home.php");
        exit();
    }
}

//if user is Logging in
elseif($_POST['action'] == 'login'){
    $errors = array();
    if(empty($_POST['email'])){
        $errors[] = "Email cannot be left blank";
    }
    if(empty($_POST['password'])){
        $errors[] = "Password cannot be left blank";
    }
    if(!empty($errors)){
        $_SESSION['log_errors'] = $errors;
        header("LOACTION: index.php");
        exit();
    }
    else{
        $logged_in = fetch_record("SELECT * FROM users WHERE email = '".$_POST['email']."' && password = '".$_POST['password']."'");
        var_dump($logged_in);
        if(!empty($logged_in)){
            $_SESSION['status'] = 'logged_in';
            header("LOCATION: home.php");
            exit();
        }
        else{
            $errors[] = "Your email or password is incorrect.";
            $_SESSION['log_errors'] = $errors;
            //header("LOCATION: index.php");
            exit();
        }
    }
}

//if user is logging off
else {
    session_destroy();
    header("LOCATION: index.php");
}
?>



//<?php
//    session_start();
//    session_destroy;
//    $errors = array();
//    if(empty($_POST['user_name'])){
//        $errors[] = "You must enter your name!";
//    };
//    if(empty($_POST['quote'])){
//        $errors[] = "You must enter a quote!";
//    };
//    if(!empty($errors)){
//        $_SESSION['errors'] = $errors;
//        header("LOCATION: index.php");
//        die();
//    }
//    else {
//        require_once("connection.php");
//        run_mysql_query("INSERT INTO quotes (user, quote, created_at) VALUES ('".$_POST['user_name']."', '".$_POST['quote']."', NOW())");
//        header("LOCATION: main.php");        
//    };
//?>