<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Adv Web Development :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Extra challenge</title>
</head>
<body>
    
    <h1>Lab3 Task2: Leap Year</h1>
    <form id="year" action="leapyear_selfcall.php" method="get">
    <p><label>Enter year:
    <input id="yearEntered" type="text" name="yearEntered" pattern="[0-9]{4}"/>
    </label></p>
    <p><input type="submit" value="Check if it's a leap year"/></p>
    </form>
    <?php
    // checks if form has been entered before going through the code.
    if (isset($_GET["yearEntered"])) {
        $input = $_GET["yearEntered"];
        if ($input > 0) {
            if ($input % 4 == 0) {  // ensures leap year.
                if (($input % 100 == 0) && ($input % 400 !== 0)) {    // unless divisible by 100 and NOT 400.
                    echo "The year you entered " .$input ." is not a leap year" ;
                } else {
                    echo "The year you entered " .$input ." is a leap year";
                }
            } else {
                echo "The year you entered " .$input ." is not a leap year";
            }
        } else {
            echo "Please enter a positive number";
        }
    }
    ?>
</body>
</html>