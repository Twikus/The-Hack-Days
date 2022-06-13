<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='index';
$next='team';

echo '
<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>

<form method="GET" action="verif_name.php" name="form">
<main>
    <div>
        <h1>Entre ton nom :</h1>
        <input type="text" list="names" name="name" id="name" placeholder="Prénom / Nom">
            <datalist id="names">';
            $co = connexionBD();
            $req ='SELECT * FROM etudiant';
            $resultat = $co->query($req);
            foreach ($resultat as $value) {
                echo '<option>'.$value['etudiant_prenom'].' '.$value['etudiant_nom'].'</option>';
            }
            deconnexionBD($co);
            echo '
            </datalist>';

        if (!empty($_SESSION['erreur'])) {
            echo $_SESSION['erreur'];
            unset ($_SESSION['erreur']);
        }
    echo
    '</div>';

    echo
    '<div class="test">
        <h1>Tu fais parti :</h1>
        <h2 id="group_response"></h2>
    </div>
</main>

<footer onclick="form.submit()"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></footer>
</form>';

require 'inc/end.php';