<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';
session_destroy();

/*-------------------- Data --------------------*/
$next='name';
$column_name = array();
$to_replace = array('defi_', '_', '-');
$replace_by = array('', ' ', "'");
/*-------------------- Data --------------------*/

echo '
<main>
    <section>
        <img class="bienvenue" src="medias/background.gif" alt="Bienvenue">
    </section>
</main>';

nextpage($next);

require 'inc/end.php';