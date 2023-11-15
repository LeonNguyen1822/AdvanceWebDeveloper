<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Leon Nguyen" />
    <title>Lab09 - Task02</title>
</head>
<body>
    <h1>Web Programming - Lab09</h1>
    <h2>Task 02: Creating a simple “Guessing Game”</h2>
    <hr>
    <h3>Guessing Game</h3>
    <?php
        session_start();
        if(!isset($_SESSION["number"]))
        {
            $_SESSION["number"] = rand(1,100);
        }

        if(!isset($_SESSION["counter"]))
        {
            $_SESSION["counter"] = 0;
        }

        $num = $_SESSION["number"];
        $counter = $_SESSION["counter"];

        echo "<p>Enter a number between 1 and 100, then press the Guess button.</p>";
    ?>

    <form action = "guessinggame.php" method = "post">
        <label>Number: <input type="text" name = "guess"></label>
        <input type="submit" value="Guess">
    </form>
    
    <?php
        if (isset($_POST["guess"]))
        {
            error_reporting(0);
            $guess = $_POST["guess"];
            
            if ($guess > $num)
            {
                echo "<p style=\"color:red\">Your guess is high</p>";   
            }
            else if ($guess == $num)
                {
                    echo "<p style=\"color:green\">Congratulations! You guessed the hidden number <b>$num</b></p>";
                }
                else if ($guess < $num)
                {
                    echo "<p style=\"color:red\">Your guess is low</p>"; 
                }

            $counter = $_SESSION["counter"];
            ++$counter;
            $_SESSION["counter"] = $counter;
            echo "<p>Number of guesses: <b>$counter</b></p>";
        }
    ?>
    
    <p>
        <a href = "giveup.php"><button>Give Up</button></a>
        <a href = "startover.php"><button>Start Over</button></a>
    </p>
    </body>
</html>