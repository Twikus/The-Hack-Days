<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-------------------- Verif --------------------*/
if (!isset($_SESSION['groupe_etudiant_session'])){
    header('Location: index.php');
}
/*-------------------- Verif --------------------*/

/*-------------------- Data --------------------*/
$prev='showgroup';
$next='challenge';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-------------------- Data --------------------*/

prevpage($prev);

echo '
<main>
    <section>
        <h1>Vous êtes prêt ?</h1>
    </section>
    <section>
        <p class="text">Veuillez être <span>devant la salle</span> de votre premier défi avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono sera lancé !</span></p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';