<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <meta name="author"   content="Leon Nguyen - 103139729" /> 
  <title>Lab 8 – MySQL Databases with PHP</title> 
</head> 
<body> 
<h1>Web Programming - Lab08</h1>
<h2>Task 1: Retrieve and display records from the table</h2>
<hr>
<?php  
  require_once ("settings.php"); 
 
  //connect to the database
  $dbConnect = mysqli_connect($host, $user, $pswd, $dbnm)
      or die ("<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");
  echo "<p style=\"color:green\">Successfully connected to the database server <b>$host</b>, database named <b>$dbnm</b></p>";
  //query
  $query = "SELECT car_id, make, model, price FROM cars";
  $results = mysqli_query($dbConnect, $query)
    or die("<p>Unable to execute the query.</p>". "<p>Error code " . mysqli_errno($dbConnect). ": " . mysqli_error($dbConnect)) . "</p>";
  //display results
  echo "<table style=\"border: 1px solid black\">";
  echo "<tr>";
  echo "<th style=\"border: 1px solid black\">Car ID</th>";
  echo "<th style=\"border: 1px solid black\">Make</th>";
  echo "<th style=\"border: 1px solid black\">Model</th>";
  echo "<th style=\"border: 1px solid black\">Price</th>";
  echo "</tr>";
  //fetch rows
  $row = mysqli_fetch_row($results);
  while ($row) {
    echo "<tr><td style=\"border: 1px solid black; text-align:center\">{$row[0]}</td>";
    echo "<td style=\"border: 1px solid black\">$row[1]</td>";
    echo "<td style=\"border: 1px solid black\">$row[2]</td>";
    echo "<td style=\"border: 1px solid black; text-align:right;\">$". number_format($row[3],2)."</td></tr>";
    $row = mysqli_fetch_row($results);
  }
  echo "</table>";
  //close the connection
  mysqli_free_result($results);
  mysqli_close($dbConnect);
?> 
<hr>
<a href="../task02/vip_member.php">Lab 08 - Task 02</a>
</body> 
</html> 