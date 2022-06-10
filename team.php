<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='name';
prev_page($prev);

echo '
<main>
    <div>
        <h1>Entre ton nom d\'équipe:</h1>
        <form method="GET">
            <input type="search" name="équipe">
        </form>
    </div>

    <div>
        <h1>Votre photo d\'équipe :</h1>
        <h2>Conard</h2>
    </div>
</main>';

$next='equipe';
next_page($next);

require 'inc/end.php';