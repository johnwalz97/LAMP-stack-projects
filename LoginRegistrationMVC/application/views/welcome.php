<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
    
<html>
<head>
    <title>Welcome</title>
</head>

<body>    
    <h1>Welcome <?=$this->session->userdata('user')['first_name']?></h1>
    <a href="/users/logoff">Log Off</a>
    <h2>User Information</h2>
    <p>First Name: <?=$this->session->userdata('user')['first_name']?></p>
    <p>Last Name: <?=$this->session->userdata('user')['last_name']?></p>
    <p>Email: <?=$this->session->userdata('user')['email']?></p>
</body>
</html>