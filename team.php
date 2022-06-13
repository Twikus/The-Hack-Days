<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='name';
$next='end_inscription';

echo $_SESSION['prenom_etudiant_session'];
echo '<br>';
echo $_SESSION['nom_etudiant_session'];

/*-----Données-----*/
prevpage($prev);
/*-----Données-----*/

echo '
<form method="POST" action="inc/verif_team.php" name="form" enctype="multipart/form-data">
<main>
    <div>
        <h1>Entre ton nom d\'équipe:</h1>
        <input type="text" name="team_name">';
        if (!empty($_SESSION['erreur_name'])) {
            echo $_SESSION['erreur_name'];
            unset ($_SESSION['erreur_name']);
        }
        echo'
    </div>

    <div>
        <h1>Votre photo d\'équipe :</h1>
        <input type="file" name="image">';
        if (!empty($_SESSION['erreur_file'])) {
            echo $_SESSION['erreur_file'];
            unset ($_SESSION['erreur_file']);
        }
        echo'
    </div>
</main>';

nextpage_form($next);
echo '</form>';

require 'inc/end.php';