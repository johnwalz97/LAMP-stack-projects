<?php
    session_start();
    if(isset($_SESSION['status'])){
        header("LOCATION: home.php");
        exit();
    }
?>
<!DOCTYPE html>
    
<html>
<head>
    <title>Registration</title>
</head>

<body>
    <?php
        if(isset($_SESSION["errors"])){
            foreach($_SESSION['errors']  as $error){
                echo $error."<br/>";
            }
        }
    ?>
    <h2>Register</h2>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="register">
        <p>Email:
        <input type="email" name="email"></p>
        <p>First Name:
        <input type="text" name="first_name"></p>
        <p>Last Name:
        <input type="text" name="last_name"></p>
        <p>Password:
        <input type="password" name="password"></p>
        <p>Confirm Password:
        <input type="password" name="confirm_password"></p>
        <input type="submit" value="Register">
    </form>
    <?php
        if(isset($_SESSION["log_errors"])){
            foreach($_SESSION["log_errors"] as $error){
                echo $error."<br/>";
            }
        }
    ?>
    <h2>Login</h2>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="login">
        <p>Email:
        <input type="email" name="email"></p>
        <p>Password:
        <input type="password" name="password"></p>
        <input type="submit" value="Log In">        
    </form>
</body>
</html>