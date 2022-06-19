<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-------------------- Data --------------------*/
$prev='index';
$next='verif_name';
if (isset($_SESSION['groupe_etudiant_session'])){
    $student_name = $_SESSION['prenom_etudiant_session'].' '.$_SESSION['nom_etudiant_session'];
}else{
    $student_name = '';
}
/*-------------------- Data --------------------*/

prevpage($prev);

echo'
<form method="POST" action="inc/'.$next.'.php" name="form">
<main>
    <section>
        <h1>Entre ton nom :</h1>
        <input type="text" list="names" name="name" placeholder="Prénom / Nom" id="name" value="'.$student_name.'">
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
    echo
    '</section>';

    echo
    '<section>
        <h2 id="group_response"></h2>
    </section>
</main>';

nextpage($next);

require 'inc/end.php';