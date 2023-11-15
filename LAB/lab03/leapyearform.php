<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Adv Web Development :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Task 2 form</title>
</head>
<body>
    <h1>Lab3 Task2: Leap Year</h1>
    <form id="year" action="leapyear.php" method="get">
        <p><label>Enter year:
            <input id="yearEntered" type="text" name="yearEntered" pattern="[0-9]{4}"/>
        </label></p>
        <p><input type="submit" value="Check if it's a leap year"/></p>
    </form>
</body>
</html>