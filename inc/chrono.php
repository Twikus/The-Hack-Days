<?php
session_start();

$raw_actual_time=strtotime(date("Y-m-d H:i:s"));
$actual_time = strtotime(gmdate("H:i:s",$raw_actual_time));

$launch_time = strtotime($_SESSION["launch_time"]);

$raw_result = $actual_time-$launch_time;
$result = gmdate("H:i:s",$raw_result);
echo $result;
$_SESSION['time'] = $result;