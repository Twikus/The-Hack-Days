<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

echo '
<main>
    <div>
        <img class="bienvenue" src="medias/glitch.gif" alt="Bienvenue">
    </div>
</main>';

$next='name';
next_page($next);

require 'inc/end.php';