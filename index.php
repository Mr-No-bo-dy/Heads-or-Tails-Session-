<?php
    session_start();
    // session_destroy();
    // session_id("123123");   // Doesn't work as it should - Work only for 1st page even when written on every...
    // echo session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Heads or Tails" - Choose Difficulty Level</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // var_dump($_SESSION);
        // echo ("<br>");
        $_SESSION["count"] = 0;
        if (!isset ($_SESSION["level"])) {
            $level = "easy";
        } else {
            $level = $_SESSION["level"];
        }
        if (!isset ($_SESSION["wins"])) {
            $_SESSION["wins"] = 0;
        }
        if (!isset ($_SESSION["loses"])) {
            $_SESSION["loses"] = 0;
        }
        if (!isset ($_SESSION["currentWins"])) {
            $_SESSION["currentWins"] = 0;
        }
        if (!isset ($_SESSION["currentLoses"])) {
            $_SESSION["currentLoses"] = 0;
        }
        if (!isset ($_SESSION["access"])) {
            $access = $_SESSION["access"] = 0;
        } else if ($_SESSION["currentWins"] == 0 && $_SESSION["currentLoses"] == 0) {
            $access = $_SESSION["access"] = 0;
        } else {
            $access = $_SESSION["access"];
        }
        echo ("<p>Choose difficulty level:</p>");
        if (!isset ($_SESSION["balance"])) {
            $_SESSION["balance"] = 0;
        }
    ?>
    <form action="play.php" method="post">
        <label><input type="radio" name="level" value="easy" checked>Easy</label>
        <label><input type="radio" name="level" value="medium" <?php 
                if ($access < 1) {
                    echo ("disabled");
                }
            ?>>Medium</label>
        <label><input type="radio" name="level" value="hard" <?php
                if ($access < 2) {
                    echo ("disabled");
                }
            ?>>Hard</label>
        <input type="submit" value="Choose">
    </form>
    <?php
    $_SESSION["currentWins"] = 0;
    $_SESSION["currentLoses"] = 0;
    ?>
</body>
</html>