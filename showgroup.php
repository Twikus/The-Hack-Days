<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-------------------- Verif --------------------*/
if (!isset($_SESSION['groupe_etudiant_session'])){
    header('Location: index.php');
}
/*-------------------- Verif --------------------*/

/*-------------------- Data --------------------*/
$prev='team';
$next='ready';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-------------------- Data --------------------*/

prevpage($prev);

echo '
<main>
    <section>
        <h1>Ton équipe est donc :</h1>
    </section>
    <section>';
        $co=connexionBD();
        ShowGroup($co,$etudiant_id);
        deconnexionBD($co);
        echo'
    </section>
</main>';

nextpage($next);

require 'inc/end.php';