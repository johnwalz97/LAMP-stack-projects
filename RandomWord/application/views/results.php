<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
    
<html>
<head>
    <title>Result</title>
</head>

<body>
    <?php
        echo "session counter is" . $this->session->userdata('count');
        $this->session->set_userdata('count', rand(20,50));
        echo "changed session counter to be" . $this->session->userdata('count');
    ?>
    <p>Random Word (attempt #<?=$this->session->userdata('count')?>)</p>
    <div class="word">
        <h1><?=?></h1>
    </div>
</body>
</html>