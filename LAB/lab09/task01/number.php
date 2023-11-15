<?php
 session_start(); // start the session
 if (!isset ($_SESSION["number"])) { // check if session variable exists
 $_SESSION["number"] = 0; // create the session variable
 }
 $num = $_SESSION["number"]; // copy the value to a variable
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Leon Nguyen" />
    <title>Lab09 - Task01</title>
</head>
<body>
    <h1>Web Programming - Lab09</h1>
    <h2>Task 01: Up and down counter using session</h2>
    <hr>
    <h3>Number Counter</h3>
    <?php
        echo "<p>The number is $num</p>"; // displays the number
    ?>
    
    <p>
        <a href="numberup.php"><button>Up</button></a> <!--links to updating page -->
        <a href="numberdown.php"><button>Down</button></a>
        <a href="numberreset.php"><button>Reset</button></a>
    </p>
</body>
</html>