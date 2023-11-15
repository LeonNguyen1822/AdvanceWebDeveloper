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
<h2>Extra Challenge</h2>
<form action = "standardpalindromeself.php" method = "post" > 
   <p>String: <input type="text" name="string"></p>
   <input type="submit" value = "Check for Perfect Palindrome">
</form> 
<?php 
  if (isset ($_POST["string"]) && $_POST['string'] !== ""){ 
    $str = $_POST["string"]; 
    $newStr = str_replace(['?', '.', ',', '!', '-', ';', "'", ':'], '' , $str);
    $strRev = strrev($newStr);
    if (strcmp($newStr, $strRev) == 0) {
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