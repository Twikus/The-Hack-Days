<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-------------------- Verif --------------------*/
if (!isset($_SESSION['groupe_etudiant_session'])){
    header('Location: index.php');
}
/*-------------------- Verif --------------------*/

/*-------------------- Data --------------------*/
$etudiant_id=$_SESSION['groupe_etudiant_session'];

if (empty($_SESSION['challenges_names'])){
    $_SESSION['time_overall']=$_SESSION['challenges_temps'][$_SESSION['complete_challenge']];
    $next='result';
}else{
    $next='challenge';
}
/*-------------------- Data --------------------*/
echo'
<p id="chrono"></p>
<main>
    <section>';
if ($_SESSION['challenges_temps_inde'][$_SESSION['complete_challenge']] >= '00:25:00'){
    echo'<h1>Vous n\'avez pas réussi le défi <span>"'.$_SESSION['complete_challenge'].'" </span>!</h1>';
}else{
    echo '<h1>Bravo vous avez réussi le défi <span>"'.$_SESSION['complete_challenge'].'" </span>!</h1>';
}
echo'
    </section>
    <section>
        <p class="text">Votre temps pour ce défi est de : <span>'.$_SESSION['challenges_temps_inde'][$_SESSION['complete_challenge']].'</span></p>
        <p class="text">Veuillez vous rendre <span>devant la salle</span> du défi suivant avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono reprendra !</span></p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';