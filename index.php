<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='name';
/*-----Données-----*/

echo '
<main>
    <div>
        <img class="bienvenue" src="medias/glitch.gif" alt="Bienvenue">
    </div>
</main>';

nextpage($next);

require 'inc/end.php';