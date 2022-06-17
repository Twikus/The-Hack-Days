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
        <h1>Bravo tu as réussi <span>tous les défis !</span></h1>
    </section>
    <section>
        <h1>Ton temps :</h1>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';