<?php
    session_start();
    // var_dump($_SESSION);
    // echo ("<br>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Heads or Tails" - Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $access = $_SESSION["access"];
        $level = $_SESSION["level"];
        $currentWins = $_SESSION["currentWins"];
        $balance = $_SESSION["balance"];
        if ($access == 0 && $level == "easy" && $currentWins >= 6) {
            $_SESSION["access"] += 1;
            echo ("<p>Congratulations! You can now play on Medium difficulty.</p>");
        } else if ($access == 1 && $level == "medium" && $currentWins >= 6) {
            $_SESSION["access"] += 1;
            echo ("<p>Congratulations! You can now play on Hard difficulty.</p>");
        }
        echo ("<p>You won ".$currentWins." times on current game.</p>");
        echo ("<p>You won ".$_SESSION["wins"]." times.</p>");
        echo ("<p>You lost ".$_SESSION["loses"]." times.</p>");
    ?>
    <form action="index.php" method="post">
        <p><input type="submit" value="Return to Play"></p>
    </form>
    <form action="../tea/index.php" method="post">
        <?php
            echo ("<p>Your balance is: ".$balance." UAH.</p>");
        ?>
        <p><input type="submit" value="Order some Tea" <?php
    if ($access < 2 || $_SESSION["balance"] < 3) {
        echo ("disabled");
    }
    ?>></p>
    </form>
</body>
</html>