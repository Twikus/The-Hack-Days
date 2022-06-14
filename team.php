<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='name';
$next='end_inscription';

/*A SUPP
echo $_SESSION['prenom_etudiant_session'];
echo '<br>';
echo $_SESSION['nom_etudiant_session'];
A SUPP*/

/*-----Données-----*/
prevpage($prev);
/*-----Données-----*/

echo '
<form method="POST" action="inc/verif_team.php" name="form" enctype="multipart/form-data">
<main>
    <section>
        <h1>Entre ton nom d\'équipe:</h1>
        <input type="text" name="team_name" placeholder="Nom de l\'équipe" id="team">';
        if (!empty($_SESSION['erreur_name'])) {
            echo $_SESSION['erreur_name'];
            unset ($_SESSION['erreur_name']);
        }
        echo'
        <p class="error" id="name_error"></p>
    </section>

    <section>
        <h1>Votre photo d\'équipe :</h1>
        <div class="file">
            <input type="file" name="image" accept="image/png, image/jpg, image/jpeg">
        </div>';
        if (!empty($_SESSION['erreur_file'])) {
            echo $_SESSION['erreur_file'];
            unset ($_SESSION['erreur_file']);
        }
        echo'
    </section>
</main>';

nextpage_form($next);
echo '</form>';

require 'inc/end.php';