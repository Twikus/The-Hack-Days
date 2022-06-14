<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='name';
/*-----Données-----*/

echo '
<main>
    <section>
        <img class="bienvenue" src="medias/background_2.gif" alt="Bienvenue">
    </section>
</main>';

nextpage($next);

require 'inc/end.php';