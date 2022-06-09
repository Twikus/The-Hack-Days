<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='index';
prev_page($prev);

echo '
<main>
    <h1>Choisis ton groupe de TD :</h1>
    <div class="groups">
        <ul>
            <li><a>TD AB</a></li>
            <li><a>TD CD</a></li>
            <li><a>TD EF</a></li>
            <li><a>TD GH</a></li>
        </ul>
    </div>
</main>';

$next='name';
next_page($next);

require 'inc/end.php';