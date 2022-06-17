<?php
session_start();

$raw_actual_time=strtotime(date("Y-m-d H:i:s"));
$actual_time = strtotime(gmdate("H:i:s",$raw_actual_time));

$launch_time = strtotime($_SESSION["launch_time"]);

$result = $actual_time-$launch_time;
echo gmdate("H:i:s",$result);