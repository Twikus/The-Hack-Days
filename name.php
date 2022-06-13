<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='index';
prev_page($prev);

echo '
<main>
    <div>
        <h1>Entre ton nom :</h1>
        <form method="POST">
            <input type="search" list="names" name="name" id="name" placeholder="Prénom / Nom">
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
        </form>
    </div>';

    echo'
    <div class="test">
        <h1>Tu fais parti :</h1>
        <h2 id="group_response"></h2>
    </div>
</main>';

$next='team';
next_page($next);

require 'inc/end.php';