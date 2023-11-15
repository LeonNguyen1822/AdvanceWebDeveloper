<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <meta name="author"   content="Leon Nguyen 103139729" /> 
  <title>Lab 8 – MySQL Databases with PHP</title> 
</head> 
<body> 
<h1>Web Programming - Lab08</h1>
<h2>Task 2: VIP member Registration System</h2>
<hr>
<h3>Display All Members Page</h3>

<?php
    //Initiate DB connection key
    $settings = __DIR__ . DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR . "task01" . DIRECTORY_SEPARATOR. "settings.php";
    require_once ($settings); 

    //Connect to the DB
    $dbConnect = mysqli_connect($host, $user, $pswd, $dbnm)
        or die ("<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");
    echo "<p style=\"color:green\">Successfully connected to the database server <b>$host</b>, database named <b>$dbnm</b></p>";

    //Check if table exist
    $query = "SHOW TABLES LIKE 'vipmembers'";
    $results = mysqli_query($dbConnect, $query);
    if (mysqli_num_rows($results) <> 0) {
        //Query
        $query = "SELECT member_id, fname, lname FROM vipmembers";
        $results = mysqli_query($dbConnect, $query);

        //Initiate table display
        echo "<table style=\"border: 1px solid black\">";
        echo "<tr>";

        //Get field information for all fields
        $fieldinfo = mysqli_fetch_fields($results);
        foreach ($fieldinfo as $val) {
            echo "<th style=\"border: 1px solid black\">" . ($val->name) . "</th>";
          }
        echo "</tr>";

        //Get rows
        $row = mysqli_fetch_row($results);
        while ($row) {
            echo "<tr><td style=\"border: 1px solid black; text-align:center\">{$row[0]}</td>";
            echo "<td style=\"border: 1px solid black\">$row[1]</td>";
            echo "<td style=\"border: 1px solid black\">$row[2]</td></tr>";
            $row = mysqli_fetch_row($results);
        }
        echo "</table>";
    } else {
        echo "<p style=\"color:red\">Table does not exist!</p>";
    }

    mysqli_free_result($results);
    mysqli_close($dbConnect);
?>

<hr>
<a href="vip_member.php">Home Page | </a>
<a href="member_add_form.php">Add another member | </a>
<a href="member_display.php">Display all members | </a>
<a href="member_search.php">Search for member(s)</a>
</body> 
</html> 