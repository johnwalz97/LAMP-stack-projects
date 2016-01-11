<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
    
<html>
<head>
    <title>Result</title>
</head>

<body>
    <div class="thanks">
        <p>Thanks for submitting this form! You have submitted this form <?=$this->session->userdata('count')?> times now.</p>
    </div>
    <div class="info">
        <h1>Submitted Information</h1>
        <p>Your Name: <?=$this->input->post('name')?></p>
        <p>Dojo Location: <?=$this->input->post('location')?></p>
        <p>Favorite Language: <?=$this->input->post('language')?></p>
        <p>Comment:</p><?=$this->input->post('comment')?>
        <form action="index">
            <input type="submit" value="Go Back">
        </form>
    </div>
</body>
</html>