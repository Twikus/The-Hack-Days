<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

echo '
<main>
    <img class="bienvenue" src="medias/glitch.gif" alt="Bienvenue">
</main>';

$next='group';
next_page($next);

require 'inc/end.php';