<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Adv Web Development :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Task 2</title>
</head>
<body>
    <?php
    $input = $_GET["yearEntered"];
    if ($input > 0) {
        if ($input % 4 == 0) {  // ensures leap year.
            if (($input % 100 == 0) && ($input % 400 !== 0)) {    // unless divisible by 100 and NOT 400.
                echo "The year you entered " .$input ." is not a leap year" ;
            } else {
                echo "The year you entered " .$input ." is a leap year";
            }
        } else {
            echo "The year you entered " .$input ." is not a leap year" ;
        }
    } else {
        echo "Please enter a positive number";
    }
    echo "<p><a href=\"leapyearform.php\">Back</a><p>";
    ?>
</body>
</html>