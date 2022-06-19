<?php
require 'inc/lib_crud.inc.php';
require 'inc/head.php';

/*-------------------- Verif --------------------*/
if (!isset($_SESSION['groupe_etudiant_session'])){
    header('Location: index.php');
}

if (isset($_SESSION['time_overall'])){
    header('Location: index.php');
}
/*-------------------- Verif --------------------*/

/*-------------------- Data --------------------*/
$next='verif_challenge';
if (!isset($_SESSION['time'])){
    $_SESSION['time']='00:00:00';
}
if (!isset($_SESSION['time_statut'])){
    $_SESSION['time_statut'] = 1;
}
if ($_SESSION['time_statut'] == 0){
    $_SESSION['delay_time']=$_SESSION['classic_time'];
    $_SESSION['time_statut'] = 1;
}
if (empty($_SESSION['challenges_names'])){
    $_SESSION['challenges_names']=array('groupe_defi_1' => 'Le Cr’Hack du Dev',
                                        'groupe_defi_2' => 'Hack n’ Snap', 
                                        'groupe_defi_3' => 'Wall Hack', 
                                        'groupe_defi_4' => 'Tr’Hack It !');
    $_SESSION["launch_time"]=date("Y-m-d H:i:s");
}
/*-------------------- Data --------------------*/

echo '
<p style="position:absolute;" id="chrono"></p>
<form method="POST" action="inc/'.$next.'.php" name="form" enctype="multipart/form-data">
<main>
    <section>
        <h1>Sélectionnez le défi :</h1>
        <select name="challenge" placeholder="Sélection du défi" id="challenge">';
            foreach($_SESSION['challenges_names'] as $key => $value){
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
        echo'
        </select>
        </section>

    <section>
        <h1>La clé du défi :</h1>
        <input type="text" name="response" id="response" placeholder="La clé">';
        if (!empty($_SESSION['second_error'])) {
            echo $_SESSION['second_error'];
            unset ($_SESSION['second_error']);
        }
        echo'
    </section>
</main>';

nextpage($next);

require 'inc/end.php';