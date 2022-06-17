<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='challenge';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

echo '
<main>
    <section>
        <h1>Bravo tu as réussi le défi <span>"'.$_SESSION['complete_challenge'].'" !</span></h1>
    </section>
    <section>
        <p>'.$_SESSION['challenges_temps'][$_SESSION['complete_challenge']].'</p>
        <p class="text">Veuillez etre <span>devant la salle</span> du défi suivant avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono reprendra !</span></p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';