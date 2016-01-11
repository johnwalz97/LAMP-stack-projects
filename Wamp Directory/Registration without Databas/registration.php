<?php
   session_start(); 
?>
<!DOCTYPE html>

<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <form enctype="multipart/form-data" action="process_account.php" method="post">
        <h1>Register!</h1>
        <?php
            //var_dump($_SESSION['errors']);
            if (isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $error){
                    echo $error;
                }
            }
            else {
                echo "Your registration has been submitted.";
            }
        ?>
        <input name="email" type="email" placeholder="Email">
        <input name="first_name" type="text" placeholder="First Name">
        <input name="last_name" type="text" placeholder="Last Name">
        <input name="password" type="password" placeholder="Password">
        <input name="confirm_password" type="password" placeholder="Confirm Password">
        <input name="birth_date" type="date" placeholder="Birth Date">
        <input class="file" name="profile_picture" type="file" placeholder="Profile Picture" accept="image/*">
        <input type="submit" value="Register">
    </form>
</body>
</html>