<?php
    session_start();
    date_default_timezone_set("America/Los_Angeles");
    if(!isset($_SESSION['activities'])){
        $_SESSION['activities'] = array();
    }
    if($_POST["destroy"]){
        session_destroy();
    }
    switch ($_POST["location"]) {
        case "farm":
            $rand1= rand(10, 20);
            $_SESSION["gold_count"] = $_SESSION["gold_count"] + $rand1;
            array_push($_SESSION["activities"], "You entered a farm and earned $rand1 golds(".date("F d, Y h:i a").")&#013;&#010");
            break;
        case "cave":
            $rand2 = rand(5, 10);
            $_SESSION["gold_count"] = $_SESSION["gold_count"] + $rand2;
            array_push($_SESSION["activities"], "You entered a cave and earned $rand2 golds(".date("F d, Y h:i a").")&#013;&#010");
            break;
        case "house":
            $rand3 = rand(2, 5);
            $_SESSION["gold_count"] = $_SESSION["gold_count"] + $rand3;
            array_push($_SESSION["activities"], "You entered a house and earned $rand3 golds(".date("F d, Y h:i a").")&#013;&#010");
            break;
        case "casino":
            $rand4 = rand(-50, 50);
            $_SESSION["gold_count"] = $_SESSION["gold_count"] + $rand4;
            $rand4 < 0?$action = "lost":$action = "earned";
            if ($action == "lost"){$rand4 = abs($rand4);}
            array_push($_SESSION["activities"], "You entered a casino and $action $rand4 golds(".date("F d, Y h:i a").")&#013;&#010");
            break;
    }
    header('LOCATION: NinjaGold.php');
    exit();
?>