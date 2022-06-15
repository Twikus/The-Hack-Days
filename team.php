<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$prev='name';
$next='verif_team';
/*-----Données-----*/

/*A SUPP
echo $_SESSION['prenom_etudiant_session'];
echo '<br>';
echo $_SESSION['nom_etudiant_session'];
A SUPP*/
prevpage($prev);

echo '
<form method="POST" action="inc/'.$next.'.php" name="form" enctype="multipart/form-data">
<main>
    <section>
        <h1>Entre ton nom d\'équipe:</h1>
        <input type="text" name="team_name" placeholder="Nom de l\'équipe" id="team">';
        if (!empty($_SESSION['first_error'])) {
            echo $_SESSION['first_error'];
            unset ($_SESSION['first_error']);
        }
        echo'
        <p class="error" id="name_error"></p>
    </section>

    <section>
        <h1>Votre photo d\'équipe :</h1>
        <div class="file">
            <input type="file" name="image" accept="image/png, image/jpg, image/jpeg">
        </div>';
        if (!empty($_SESSION['second_error'])) {
            echo $_SESSION['second_error'];
            unset ($_SESSION['second_error']);
        }
        echo'
    </section>
</main>';

nextpage_form();
echo '</form>';

require 'inc/end.php';