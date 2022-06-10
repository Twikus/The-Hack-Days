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
            <input type="search" list="names" name="nom_prénom">
            <datalist id="names">';
            $co = connexionBD();
            $req ='SELECT * FROM etudiant';
            $resultat = $co->query($req);
            foreach ($resultat as $value) {
                echo '<option>'.$value['etudiant_nom'].' '.$value['etudiant_prenom'].'</option>';
            }
            deconnexionBD($co);
            echo '
            </datalist>
        </form>
    </div>

    <div>
        <h1>Ton groupe est :</h1>
        <h2>Conard</h2>
    </div>
</main>';

$next='team';
next_page($next);

require 'inc/end.php';