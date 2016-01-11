<?php
    session_start();
?>
<!DOCTYPE html>
    
<html>
<head>
    <titl>Registration</title>
</head>

<body>
    <?php
        if(isset($_SESSION["errors"])){
            echo $_SESSION["errors"];
        }
    ?>
    <form action="process_email.php" method="post">
        <input type="email" name="email">
        <input type="submit" value="submit">
    </form>
</body>
</html>