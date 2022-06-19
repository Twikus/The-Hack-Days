<?php
require 'lib_crud.inc.php';

if(isset($_SESSION['time'])){
    $raw_actual_time=strtotime(date("Y-m-d H:i:s"));
    $actual_time = strtotime(gmdate("H:i:s",$raw_actual_time));
    $launch_time = strtotime($_SESSION["launch_time"]);
    $raw_result = $actual_time-$launch_time;
    $result = gmdate("H:i:s",$raw_result);
    $_SESSION['classic_time'] = $result;

    if ($_SESSION['time_statut'] == 0){
        $result = $_SESSION['challenges_temps'][$_SESSION['complete_challenge']];
        echo $result;
        $_SESSION['time'] = $result;
    }elseif (isset($_SESSION['challenges_temps_inde']) && isset($_SESSION['classic_time']) && isset($_SESSION['delay_time']) && isset($_SESSION['challenges_temps'])){
        if (isset($_SESSION['complete_challenge'])){
            $raw_result = strtotime($_SESSION['classic_time']) - (strtotime($_SESSION['delay_time']) - strtotime($_SESSION['challenges_temps'][$_SESSION['complete_challenge']]));
        }else{
            $raw_result = strtotime($_SESSION['classic_time']) - (strtotime($_SESSION['delay_time']) - strtotime($_SESSION['challenges_temps'][$_SESSION['older_complete_challenge']]));
        }
        $result = gmdate("H:i:s",$raw_result);
        echo $result;
        $_SESSION['time'] = $result;
    }else{
        $raw_actual_time=strtotime(date("Y-m-d H:i:s"));
        $actual_time = strtotime(gmdate("H:i:s",$raw_actual_time));
        $launch_time = strtotime($_SESSION["launch_time"]);
        $raw_result = $actual_time-$launch_time;
        $result = gmdate("H:i:s",$raw_result);
        echo $result;
        $_SESSION['time'] = $result;
    }
}