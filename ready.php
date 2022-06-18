<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$prev='showgroup';
$next='challenge';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

prevpage($prev);

echo '
<main>
    <section>
        <h1>Etes-vous prêt ?</h1>
    </section>
    <section>
        <p class="text">Veuillez etre <span>devant la salle</span> de votre premier défi avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono sera lancé !</span></p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';