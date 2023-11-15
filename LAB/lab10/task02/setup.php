<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <title>Lab 10 – MySQL Databases with PHP</title> 
</head> 
<body> 
  <h1>Web Programming - Lab10</h1>
  <h2>Task 2: Creating a simple “Hit Counter” </h2>
  <hr>
  <h3>Database Info</h3>

  <form action="setup.php" method = "post">
      <fieldset>
          <legend style="font-weight:bold">Enter your database details</legend>
          <p>Host Name: <input type="text" name="host" required></p>
          <p>Username: <input type="text" name="user" required></p>
          <p>Password: <input type="password" name="pswd" required></p>
          <p>Database Name: <input type="text" name="dbnm" required></p>
      </fieldset>
      <p><input type="submit" value="Set Up" name="submit">
      <input type="reset"></p>
  </form>
  <p><a href="countvisits.php">Go to Hit Counter site</a></p>
</body> 
</html> 

<?php
    if (isset($_POST["submit"])) {
        $filename = "../../../data/mykeys.inc.txt";
        $handle = fopen($filename, "a+");
        $data = $_POST["host"] . "\t" . $_POST["user"] . "\t" . $_POST["pswd"] . "\t" . $_POST["dbnm"]; 
        fwrite($handle, $data); 
        fclose($handle);   

        require_once 'hitcounter.php';
        $setup = new HitCounter($_POST["host"], $_POST["user"], $_POST["pswd"], $_POST["dbnm"]);
        $setup->checkAndCreate();
        if ($setup <> FALSE) {
            echo "<p style=\"color:green\">Everything is setup OK.</p>";
        }
        $setup->closeConnection();  
    }
?>