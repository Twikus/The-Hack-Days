<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-------------------- Verif --------------------*/
if (!isset($_SESSION['groupe_etudiant_session'])){
    header('Location: index.php');
}
/*-------------------- Verif --------------------*/

/*-------------------- Data --------------------*/
$prev='name';
$next='verif_team';
/*-------------------- Data --------------------*/

prevpage($prev);

echo '
<form method="POST" action="inc/'.$next.'.php" name="form" enctype="multipart/form-data">
<main>
    <section>
        <h1>Entre ton nom d\'équipe:</h1>
        <input type="text" name="team_name" id="team" placeholder="Nom de l\'équipe">
        <p class="error" id="name_error"></p>';
        if (!empty($_SESSION['first_error'])) {
            echo $_SESSION['first_error'];
            unset ($_SESSION['first_error']);
        }
        echo'
    </section>

    <section>
        <h1>Votre image d\'équipe :</h1>
        <div class="file">
            <input type="file" name="image" id="file" accept="image/png, image/jpg, image/jpeg">
        </div>
        <p class="error" id="file_error"></p>';
        if (!empty($_SESSION['second_error'])) {
            echo $_SESSION['second_error'];
            unset ($_SESSION['second_error']);
        }
        echo'
    </section>
</main>';

nextpage($next);

require 'inc/end.php';