<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <meta name="author"   content="Leon" /> 
  <title>Lab 4 - Strings</title> 
</head> 
<body> 
<h1>Web Programming - Lab 4</h1> 
<h2>Task 2: Practicing string functions</h2>
<?php 
  if (isset ($_POST["string"])){ 
    $str = $_POST["string"]; 
    $strRev = strrev($str);
    if (strcmp($str, $strRev) == 0) {
        echo "<p>The text you entered <b>'$str'</b> is a perfect palindrome!</p>";
    } else {
        echo "<p>The text you entered <b>'$str'</b> is a standard palindrome!</p>";
    }
  } else {
      echo "<p>Please enter string from the input form.</p>"; 
  }
?>  
</body> 
</html> 