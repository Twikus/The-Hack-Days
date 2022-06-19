<?php
require 'lib_crud.inc.php';

$unexistant = $_POST['name'];
if(isset($unexistant) === true && empty($unexistant) === false){
    $co = connexionBD();
    $alias = "SELECT * FROM (SELECT *, CONCAT_WS (' ', etudiant_prenom, etudiant_nom) AS etudiant_nomcomplet FROM etudiant INNER JOIN groupe ON etudiant._groupe_id = groupe.groupe_id) AS alltable WHERE etudiant_nomcomplet ";
    $query = $co->query($alias.' LIKE "'.$unexistant.'"');
    if ($query->rowCount() >= 1) {
        foreach ($query as $value) {
            echo $value['groupe_tp'].',';
            echo $value['groupe_nom'];
        }
    }else{
        echo 'Aucun étudiant correspondant';
    }
}elseif(empty($unexistant) === true){
    echo 'Aucun prénom / nom de saisie';
}
