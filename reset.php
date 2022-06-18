<?php
require 'inc/lib_crud.inc.php';

unset($_SESSION['challenges_temps']);
unset($_SESSION['challenges_names']);
unset($_SESSION['challenges_temps_inde']);
unset($_SESSION['older_complete_challenge']);
unset($_SESSION['complete_challenge']);
unset($_SESSION['time_overall']);
unset($_SESSION['delay_time']);
$_SESSION["launch_time"]=date("Y-m-d H:i:s");
$_SESSION["time"]='00:00:00';
$_SESSION["classic_time"]='00:00:00';