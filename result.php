<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='index';
$etudiant_id=$_SESSION['groupe_etudiant_session'];
/*-----Données-----*/

echo '
<main>
    <section>
        <h1>Bravo tu as réussi <span>tous les défis !</span></h1>
    </section>
    <section>
        <h1>Tes résultats sont :</h1>
        <ul>';
            foreach($_SESSION['challenges_temps_inde'] as $key => $value){
                echo '<li>'.$key.' : '.$value.'</li>';
            }
            echo'
            <li> Ton temps global est de : '.$_SESSION['time_overall'].'</li>
        </ul>';
            $co = connexionBD();
            $req = "UPDATE groupe SET groupe_temps='".$_SESSION['time_overall']."' WHERE groupe_id=".$etudiant_id;
            //echo '<p>' . $req . '</p>' . "\n";
            try {
                $resultat = $co->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            deconnexionBD($co);
        echo'
    </section>
</main>';

nextpage($next);

require 'inc/end.php';