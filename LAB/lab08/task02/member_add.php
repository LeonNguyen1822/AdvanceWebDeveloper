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
<h3>Add A New Member</h3>

<?php 
    //Initiate DB connection key
    $settings = __DIR__ . DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR . "task01" . DIRECTORY_SEPARATOR. "settings.php";
    require_once ($settings); 
    
    //Connect to the DB
    $dbConnect = mysqli_connect($host, $user, $pswd, $dbnm)
        or die ("<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");
    echo "<p style=\"color:green\">Successfully connected to the database server <b>$host</b>, database named <b>$dbnm</b></p>";
    
    //Check if table exists
    $query = "SHOW TABLES LIKE 'vipmembers'";
    $results = mysqli_query($dbConnect, $query);
    if (mysqli_num_rows($results) == 0)
        {
            $query = "CREATE TABLE vipmembers (
                member_id   INT AUTO_INCREMENT PRIMARY KEY,
                fname       VARCHAR(40),
                lname       VARCHAR(40),
                gender      VARCHAR(1),
                email       VARCHAR(40),
                phone       VARCHAR(20)
            )";
            $results = mysqli_query($dbConnect, $query)
                or die("<p style=\"color:red\">Unable to execute the query.</p>". "<p>Error code " . mysqli_errno($dbConnect). ": " . mysqli_error($dbConnect)) . "</p>";
        }
    //Insert data
    echo "<hr>";
    echo "<p><b>Inserting membership...</b></p>";
    echo "<p>Firstname: " . $_POST["mFirst"] . "</p>";
    echo "<p>Lastname: " . $_POST["mLast"] ."</p>";
    echo "<p>Gender: " . $_POST["mGender"] . "</p>";
    echo "<p>Email: " . $_POST["mEmail"] . "</p>";
    echo "<p>Phone: " . $_POST["mPhone"] . "</p>";

    echo "<hr>";
    $query = "INSERT INTO vipmembers (fname, lname, gender, email, phone) VALUES (";
    $query .= "'". $_POST["mFirst"] . "',";
    $query .= "'" . $_POST["mLast"] . "',";
    $query .= "'" . $_POST["mGender"] . "',";
    $query .= "'" . $_POST["mEmail"] . "',";
    $query .= "'" . $_POST["mPhone"] . "')";

    $results = mysqli_query($dbConnect, $query)
        or die("<p style=\"color:red\">Unable to execute the query.</p>". "<p>Error code " . mysqli_errno($dbConnect). ": " . mysqli_error($dbConnect)) . "</p>";
    echo "<p style=\"color:green\">Member added successfully!</p>";

    mysqli_close($dbConnect);
?>
<hr>
<a href="vip_member.php">Home Page | </a>
<a href="member_add_form.php">Add another member</a>
<a href="member_display.php">Display all members</a>
<a href="member_search.php">Search for member(s)</a>
</body> 
</html> 