<?php
    session_start();
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $password =  $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $birth_date = $_POST["birth_date"];
    
    $errors = array();
    $highlights = array();
        
    foreach($_POST as $key => $value){
        if(empty($value)){
            $errors[] = "<p>".ucfirst($key)." cannot be empty.</p>";
        }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "<p>You did not enter a valid email address</p>";
        $highlights[] = "email";
    }
    if(preg_match('/[0-9]/',$first_name)){
        $errors[] = "<p>Your first name cannot contain numbers.</p>";
        $highlights[] = "first_name";
    }
    if(preg_match('/[0-9]/',$last_name)){
        $errors[] = "<p>Your last name cannot contain numbers.</p>";
        $highlights[] = "last_name";
    }    
    if(strlen($password) <= 6 && strlen($password) > 0){
        $errors[] = "<p>Your password is too short</p>";
        $highlights[] = "password";
    }
    if($password !== $confirm_password){
        $highlights[] = "confirm_password";
        $errors[] = "<p>Your passwords do not match</p>";
    }
    if(preg_match('/\s/', $first_name)){
        $highlights[] = "first_name";
        $errors[] = "<p>Your first name cannot be more than one word and cannot have any space after it.</p>";
    }
    if(preg_match('/\s/', $last_name)){
        $highlights[] = "last_name";
        $errors[] = "<p>Your first name cannot be more than one word and cannot have any space after it.</p>";
    }
    if($_FILES["profile_picture"]){
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "C:/Users/john/Desktop/Wamp Directory/uploads/profile_picture");
    }
    $_SESSION['errors'] = $errors;
    //var_dump($errors);
    //var_dump($_SESSION['errors']);
    header("LOCATION: registration.php");
?>