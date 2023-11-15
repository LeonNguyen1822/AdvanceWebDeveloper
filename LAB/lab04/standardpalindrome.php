<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author"	content="Leon" />
    <title>Lab04 Task 3: Practising the use of str_replace</title>
</head>
<body>
    <h1>Web Programming - Lab 4</h1>
    <?php
    if (isset($_POST["palindrome"])){ // check if form data exists
        $rawInput = strtolower($_POST["palindrome"]);
        $input = str_replace(["?", "!", "'", "\"", ",", ".", " "], "", $rawInput);	// obtain the form data in lowercase
        $pattern = "/^.+$/";
        if (preg_match($pattern, $input)) {
            $tupni = strrev($input);
            if (strcmp($input, $tupni) == 0) {
                echo "<p>The text you entered is a standard palindrome.</p>";
            } else {
                echo "<p>$input is not a standard palindrome.</p>";
            }
        } else {
            echo "<p>Please enter a value<p>";
        }
        echo "<p><a href=\"standardpalindromeform.php\">Back to form.</a></p>";
    }
    ?>
</body>
</html>