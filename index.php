<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$next='name';

echo '
<main>
    <div>
        <img class="bienvenue" src="medias/glitch.gif" alt="Bienvenue">
    </div>
</main>
<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';

require 'inc/end.php';