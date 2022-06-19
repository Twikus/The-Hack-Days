<?php
require 'lib_crud.inc.php';

/*-------------------- Data --------------------*/
$prev='challenge';
$next='congratulation';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
$challenge=$_POST['challenge'];
$response=$_POST['response'];
$surrender='00:25:00';
/*-------------------- Data --------------------*/

if ($_SESSION['time']=='00:00:00'){
    $actual_time=$_SESSION['classic_time'];
}else{
    $actual_time=$_SESSION['time'];
}

if (empty($_SESSION['challenges_temps']) || empty($_SESSION['challenges_temps_inde'])){
    $_SESSION['challenges_temps'] = array();
    $_SESSION['challenges_temps_inde'] = array();
}
if (!empty($_SESSION['complete_challenge'])){
    $_SESSION['older_complete_challenge'] = $_SESSION['complete_challenge'];
}

$co = connexionBD();
$resultat = $co->query('SELECT * FROM groupe WHERE groupe_id="'.$etudiant_id.'"');
$lignes_resultat=$resultat->rowCount();
if ($lignes_resultat>0) { 
    foreach ($resultat as $value) {
        if ($response == 'surrender'){
            $_SESSION['complete_challenge']=$_SESSION['challenges_names'][$challenge];
            unset($_SESSION['challenges_names'][$challenge]);
            $_SESSION['challenges_temps'] += array($_SESSION['complete_challenge'] => gmdate("H:i:s",strtotime($_SESSION['challenges_temps'][$_SESSION['older_complete_challenge']])+strtotime($surrender)));

            $_SESSION['challenges_temps_inde'] += array($_SESSION['complete_challenge'] => $surrender);
            $_SESSION['time_statut'] = 0;
            $_SESSION['delay_time']='00:00:00';
            header('Location: ../'.$next.'.php');
        }else{
            if ($value[$challenge] == $response){
                $_SESSION['complete_challenge']=$_SESSION['challenges_names'][$challenge];
                unset($_SESSION['challenges_names'][$challenge]);
                $_SESSION['challenges_temps'] += array($_SESSION['complete_challenge'] => $actual_time);
                
                $calculated_time = gmdate("H:i:s",strtotime($_SESSION['challenges_temps'][$_SESSION['complete_challenge']])-strtotime($_SESSION['challenges_temps'][$_SESSION['older_complete_challenge']]));
                $_SESSION['challenges_temps_inde'] += array($_SESSION['complete_challenge'] => $calculated_time);
                $_SESSION['time_statut'] = 0;
                $_SESSION['delay_time']='00:00:00';
                header('Location: ../'.$next.'.php');
            }else{
                $_SESSION['second_error']='<p class=error>'.$response.' n\'est pas la bonne clé</p>';
                header('Location: ../'.$prev.'.php');
            }
        }
    }
}
deconnexionBD($co);
