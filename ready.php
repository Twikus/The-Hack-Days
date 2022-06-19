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
<main class="shorter">
    <section>
        <h1>Vous êtes prêt ?</h1>
        <p class="text">Veuillez être <span>devant la salle</span> de votre premier défi avant de continuer, car à partir du moment ou vous cliquerez sur "suivant", <span>le chrono sera lancé !</span></p>
    </section>
    <section>
        <h1>À noter !</h1>
        <p class="text">Il vous est toujours possible <span>d\'abandonner un défi</span> en tapant "<span>surrender</span>" comme clé, cependant le temps de ce dernier sera enregistré comme étant de <span>25min</span> !</p>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';