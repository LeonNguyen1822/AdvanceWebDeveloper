<?php
require_once 'hitcounter.php';

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

$restart = new HitCounter($host,$user,$pswd,$dbnm);
$restart->startOver();
$restart->closeConnection();
header("location:countvisits.php"); // redirect
?>