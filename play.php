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
    <title>"Heads or Tails" - Play the Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if (isset ($_POST["level"])) {
            $_SESSION["level"] = $_POST["level"];
        }
        $level = $_SESSION["level"];
        $count = $_SESSION["count"];
        ++$_SESSION["count"];
        $verify = 0;
        echo ("<p>You are playing on ".$level." difficulty level.</p>");
    ?>
    <form action="<?php if ($count == "10") {echo ("results.php");} else {echo ("play.php");}?>" method="post">
        <?php
            if ($count == "10") {
                echo ('<button type="submit">Show results</button>');
            } else {
                echo ('<button type="submit" name="choice" value="0">Orel</button>
                    <button type="submit" name="choice" value="1">Reshka</button>');
            }
            if (isset ($_POST["choice"])) {
                $choice = $_POST["choice"];
                $coin = rand(0,1);
                switch ($choice) {
                    case $coin:
                        switch ($level) {
                            case "hard":
                                $coin = rand(0,1);
                                switch ($choice) {
                                    case $coin:
                                        ++$_SESSION["currentWins"];
                                        ++$_SESSION["wins"];
                                        ++$verify;
                                        echo ("<p>Hard win!</p>");
                                        break;
                                    default:
                                        ++$_SESSION["currentLoses"];
                                        ++$_SESSION["loses"];
                                        echo ("<p>Sorry, but... </p>");
                                }
                                break;
                            default:
                                ++$_SESSION["currentWins"];
                                ++$_SESSION["wins"];
                                ++$verify;
                                echo ("<p>You win.</p>");
                        }
                        break;
                    default:
                        switch ($level) {
                            case "easy":
                                $coin = rand(0,1);
                                switch ($choice) {
                                    case $coin:
                                        ++$_SESSION["currentWins"];
                                        ++$_SESSION["wins"];
                                        ++$verify;
                                        echo ("<p>Easy win...</p>");
                                        break;
                                    default:
                                        ++$_SESSION["currentLoses"];
                                        ++$_SESSION["loses"];
                                        echo ("<p>Loser!</p>");
                                }
                                break;
                            default:
                                ++$_SESSION["currentLoses"];
                                ++$_SESSION["loses"];
                                echo ("<p>You lose.</p>");
                        }
                }
                echo("<p>You played ".$count." times.</p>");
                echo ("<p>You win ".$_SESSION["currentWins"]." times this time.</p>");
            }
            if ($verify) {
                switch ($level) {
                    case "easy":
                        $_SESSION["balance"] = round($_SESSION["balance"] + 0.02, 2);
                        break;
                    case "medium":
                        $_SESSION["balance"] = round($_SESSION["balance"] + 0.06, 2);
                        break;
                    default:
                        $_SESSION["balance"] = round($_SESSION["balance"] + 0.20, 2);
                }
            } 
        ?>
    </form>
</body>
</html>