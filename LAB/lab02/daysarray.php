<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <meta name="keywords" content="Web,programming" />
    <title>Using variables, arrays and operators</title>
</head>

<body>
    <h1>Web Programming - Lab 2</h1>
    <?php
    $days = array("Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    echo "<p>The days of the week in English are: <br>";
    $length=count($days);
    for ($i=0;$i<$length-1;$i++){
       echo "$days[$i], ";
    }
    $j = $length - 1;
    echo "$days[$j].";
    $days[0] = "Dimanche";
    $days[1] = "Lundi";
    $days[2] = "Mardi";
    $days[3] = "Mercredi";
    $days[4] = "Jeudi";
    $days[5] = "Vendredi";
    $days[7] = "Samedi";

    echo "<p>The days of the week in French are: <br>";
    $length=count($days);
    for ($i=0;$i<$length-1;$i++){
       echo "$days[$i], ";
    }
    $j = $length - 1;
    echo "$days[$j].";
    ?>
</body>

</html>
