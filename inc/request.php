<?php
require 'lib_crud.inc.php';

if(isset($_POST['name']) === true && empty($_POST['name']) === false){
    $co = connexionBD();
    $alias = "SELECT * FROM (SELECT *, CONCAT_WS (' ', etudiant_prenom, etudiant_nom) AS etudiant_nomcomplet FROM etudiant) AS alltable WHERE etudiant_nomcomplet";
    $query = $co->query($alias.' LIKE "'.$_POST['name'].'%"');

    foreach ($query as $value) {
        echo $value['etudiant_td'].',';
        echo $value['_groupe_id'].',';
    }
}elseif(empty($_POST['name']) === true){
    echo ' , ';
}
