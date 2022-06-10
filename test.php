<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='index';
prev_page($prev);

echo '<main>';
$co = connexionBD();
AfficherTest($co);
deconnexionBD($co);
echo '</main>';

$next='name';
next_page($next);

require 'inc/end.php';