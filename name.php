<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$prev='index';
$next='team';
/*-----Données-----*/

prevpage($prev);

echo'
<form method="GET" action="inc/verif_name.php" name="form">
<main>
    <div>
        <h1>Entre ton nom :</h1>
        <input type="text" list="names" name="name" placeholder="Prénom / Nom" id="name">
            <datalist id="names">';
            $co = connexionBD();
            $req ='SELECT * FROM etudiant';
            $resultat = $co->query($req);
            foreach ($resultat as $value) {
                echo '<option>'.$value['etudiant_prenom'].' '.$value['etudiant_nom'].'</option>';
            }
            deconnexionBD($co);
            echo '
            </datalist>
            <p class="error"></p>';

        if (!empty($_SESSION['erreur'])) {
            echo $_SESSION['erreur'];
            unset ($_SESSION['erreur']);
        }
    echo
    '</div>';

    echo
    '<div>
        <h2 id="group_response"></h2>
    </div>
</main>';

nextpage_form($next);
echo '</form>';

require 'inc/end.php';