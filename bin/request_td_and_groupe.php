<?php
require 'lib_crud.inc.php';

$name = $_POST['name'];
if(isset($name) === true && empty($name) === false){
    $co = connexionBD();
    $alias = "SELECT * FROM (SELECT *, CONCAT_WS (' ', etudiant_prenom, etudiant_nom) AS etudiant_nomcomplet FROM etudiant INNER JOIN groupe ON etudiant._groupe_id = groupe.groupe_id) AS alltable WHERE etudiant_nomcomplet ";
    $query = $co->query($alias.' LIKE "'.$name.'%"');

    foreach ($query as $value) {
        echo $value['etudiant_td'].',';
        echo $value['groupe_nom'].',';
    }
}elseif(empty($name) === true){
    echo ' , ';
}
