<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='team';
$next='';
$etudiant_id=$_SESSION['groupe_etudiant_session'];

echo '
<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>

<main>
    <div>
        <h1>Ton équipe est donc :</h1>';
        $co=connexionBD();
        ShowGroup($co,$etudiant_id);
        deconnexionBD($co);
        echo'
    </div>
</main>

<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';

require 'inc/end.php';