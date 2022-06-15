<?php
require 'lib_crud.inc.php';

$prev='challenge';
$next='congratulation';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
$challenge=$_GET['challenge'];
$response=$_GET['response'];

$co = connexionBD();
$resultat = $co->query('SELECT * FROM groupe WHERE groupe_id="'.$etudiant_id.'"');
$lignes_resultat=$resultat->rowCount();
if ($lignes_resultat>0) { 
    foreach ($resultat as $value) {
        if ($value[$challenge] == $response){
            header('Location: ../'.$next.'.php');
            $_SESSION['complete_challenge']=$_SESSION['challenges_names'][$challenge];
            unset($_SESSION['challenges_names'][$challenge]);
        }else{
            $_SESSION['second_error']='<p class=error>'.$response.' n\'est pas la bonne clé</p>';
            header('Location: ../'.$prev.'.php');
        }
    }
}
deconnexionBD($co);