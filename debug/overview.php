<?php
require '../inc/lib_crud.inc.php';

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
