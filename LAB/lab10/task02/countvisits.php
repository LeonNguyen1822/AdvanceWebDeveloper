<?php
    require_once 'hitcounter.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab10 - Task 02</title>
</head>
<body>
    <h1>Web Programming - Lab 10</h1>
    <h2>Task 2: Creating a simple “Hit Counter”</h2>
    <hr>
    <?php
        $filename = "../../../data/mykeys.inc.txt";
        if (file_exists($filename)){
            $handle = fopen($filename, "r");
    
            while (!feof($handle)) {
                $details = fgets($handle);
                if ($details != "")
                {
                    $data = explode("\t", $details);
                    $host = $data[0];
                    $user = $data[1];
                    $pswd = $data[2];
                    $dbnm = $data[3];
                }
            }
        }
        
        $countvisits = new HitCounter($host, $user, $pswd, $dbnm);
        $countvisits->checkAndCreate();
        $countvisits->setHits();
        echo "<hr>";
        echo "<h3>Hit Counter</h3>";
        echo "<p style=\"color:blue\">This page has received <b>".$countvisits->getHits()."</b> hits.</p>";
        $countvisits->closeConnection();  
    ?>
    <a href="startover.php">Start Over</a><br>
    <a href="setup.php">Set Up DB</a>
</body>
</html>