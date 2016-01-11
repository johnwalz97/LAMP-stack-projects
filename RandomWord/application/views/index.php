<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
    
<html>
<head>
    <title>Random Word</title>
</head>

<body>
    <p>Random Word (attempt #<?=$this->session->userdata('count')?>)</p>
    <div class="word">
        <h1><?php if(!empty($rand)){echo $rand;}?></h1>
    </div>
	<form action="/random/process_rand" method="post">
		<input type="submit" value="Generate">
	</form>
</body>
</html>