<?php
    session_start();
    if (!isset($_SESSION['gold_count'])){
        $_SESSION['gold_count'] = 0;
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="ninja_style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#text').scrollTop($('#text')[0].scrollHeight);
            });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="gold_count">
                <h1>Your  Gold:</h1>
                <input value="<?=$_SESSION['gold_count']?>"/>
            </div>
            <div class="places_container">
                <div class="farm">
                    <h1>Farm</h1>
                    <h2>(earns 10-20 golds)</h2>
                    <form action="process_gold.php" method="post">
                        <input type="hidden" name="location" value="farm"/>
                        <input type="submit" value="Find Gold!"/>
                    </form>
                </div>
                <div class="cave">
                    <h1>Cave</h1>
                    <h2>(earns 5-10 golds)</h2>
                    <form action="process_gold.php" method="post">
                        <input type="hidden" name="location" value="cave"/>
                        <input type="submit" value="Find Gold!"/>
                    </form>
                </div>
                <div class="house">
                    <h1>House</h1>
                    <h2>(earns 2-5 golds)</h2>
                    <form action="process_gold.php" method="post">
                        <input type="hidden" name="location" value="house"/>
                        <input type="submit" value="Find Gold!"/>
                    </form>
                </div>
                <div class="casino">
                    <h1>Casino!</h1>
                    <h2>(earns/takes 0-50 golds)</h2>
                    <form action="process_gold.php" method="post">
                        <input type="hidden" name="location" value="casino"/>
                        <input type="submit" value="Find Gold!"/>
                    </form>
                </div>
            </div>
            <div class="activities">
                <h3>Activities:</h3>
                <textarea id="text"><?php if(isset($_SESSION['activities'])&&!empty($_SESSION['activities'])){
                    foreach($_SESSION['activities'] as $activity) {
                    echo $activity;
                    }
                } ?></textarea>
            </div>
            <form class="kill" action="process_gold.php" method="post"><input type="submit" name="destroy" value="Resart the Game"></form>
        </div>
    </body>
</html>