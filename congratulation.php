<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='challenge';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

if (empty($_SESSION['challenges_names']) == true){
    $_SESSION['time_overall']=$_SESSION['time'];
    $next='result';
}else{
    $next='challenge';
}

echo '
<p style="position:absolute;" id="chrono"></p>
<main>
    <section>
        <h1>Bravo tu as réussi le défi <span>"'.$_SESSION['complete_challenge'].'" !</span></h1>
    </section>
    <section>
        <h2>Temps pour ce défi a été de : '.$_SESSION['challenges_temps_inde'][$_SESSION['complete_challenge']].'</h2>
        <p class="text">Veuillez etre <span>devant la salle</span> du défi suivant avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono reprendra !</span></p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';