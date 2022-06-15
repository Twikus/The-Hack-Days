<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$prev='team';
$next='ready';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

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