<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Leon Nguyen" />
    <title>Lab09 - Task02</title>
</head>
<body>
    <h1>Web Programming - Lab09</h1>
    <h2>Task 02: Creating a simple “Guessing Game”</h2>
    <hr>
    <h3>Guessing Game</h3>
    <?php
        session_start();
        $num = $_SESSION["number"];
        echo "<p style=\"color:blue\">The hidden number was: <b>$num</b></p>";
        $SESSION["number"] = array();
    ?>
    <p><a href = "startover.php"><button>Start Over</button></a></p>
</body>