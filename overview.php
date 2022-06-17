<?php
require 'inc/lib_crud.inc.php';

foreach ($_SESSION as $key=>$val){
    if (is_array($val)){
        echo $key."<br/>";
        echo '---------------------------<br/>';
        foreach ($val as $key2=>$val2){
            echo $key2." -> ".$val2."<br/>";
        }
        echo '---------------------------<br/><br/><br/>';
    }else{
        echo $key." -> ".$val."<br/><br/><br/>";
    }
}

/*Appliquer au temps appli*/

$le_soustrait = $_SESSION['challenges_temps'][$_SESSION['complete_challenge']];
var_dump($le_soustrait);
echo '<br>';
$le_soustrayant = '00:00:39';
var_dump($le_soustrayant);
echo '<br>';
$final = gmdate("H:i:s",strtotime($le_soustrait)-strtotime($le_soustrayant));
echo $final;

echo '<br>';
echo '-----------------------------------------------------------';
echo '<br>';
$testeur = gmdate("H:i:s", strtotime('00:00:10'));
echo $testeur.'<br>';
$test = gmdate("H:i:s",strtotime($final)+strtotime($testeur));
echo $test;