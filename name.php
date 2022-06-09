<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='group';
prev_page($prev);

echo '
<main>
    <h1>Entre ton nom</h1>
</main>';

$next='name';
next_page($next);

require 'inc/end.php';