<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$prev='team';
$next='';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

prevpage($prev);

echo '
<main>
    <div>
        <h1>Ton équipe est donc :</h1>';
        $co=connexionBD();
        ShowGroup($co,$etudiant_id);
        deconnexionBD($co);
        echo'
    </div>
</main>';

nextpage($next);

require 'inc/end.php';