<?php
require 'lib_crud.inc.php';

$prev='challenge';
$next='congratulation';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
$challenge=$_GET['challenge'];
$response=$_GET['response'];
$actual_time=$_SESSION['time'];

if (empty($_SESSION['challenges_temps'])){
    $_SESSION['challenges_temps'] = array();
}
if (!empty($_SESSION['complete_challenge'])){
    $_SESSION['older_complete_challenge'] = $_SESSION['complete_challenge'];
    unset($_SESSION['complete_challenge']);
}


$co = connexionBD();
$resultat = $co->query('SELECT * FROM groupe WHERE groupe_id="'.$etudiant_id.'"');
$lignes_resultat=$resultat->rowCount();
if ($lignes_resultat>0) { 
    foreach ($resultat as $value) {
        if ($value[$challenge] == $response){
            $_SESSION['complete_challenge']=$_SESSION['challenges_names'][$challenge];
            unset($_SESSION['challenges_names'][$challenge]);
            if (empty($_SESSION['challenges_names']) == true){
                $_SESSION['challenges_temps'] += array($_SESSION['complete_challenge'] => $actual_time);
                unset($_SESSION['challenges_temps']);
                unset($_SESSION['older_complete_challenge']);
                unset($_SESSION['complete_challenge']);
                unset($_SESSION['complete_challenge']);
                header('Location: ../result.php');
            }else{
                $_SESSION['challenges_temps'] += array($_SESSION['complete_challenge'] => $actual_time);
                header('Location: ../'.$next.'.php');
            }
        }else{
            $_SESSION['second_error']='<p class=error>'.$response.$_SESSION['older_complete_challenge'].' n\'est pas la bonne clé</p>';
            header('Location: ../'.$prev.'.php');
        }
    }
}

$_SESSION['second_error']='<p class=error>  Temps de ce defi ->'.$_SESSION['challenges_temps'][$_SESSION['complete_challenge']].'<br>
                                            Temps du defi prec ->'.$_SESSION['challenges_temps'][$_SESSION['older_complete_challenge']].'<br></p>';
deconnexionBD($co);
