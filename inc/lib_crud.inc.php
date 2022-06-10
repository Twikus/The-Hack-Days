<?php
require 'config.inc.php';

function connexionBD(){
    $co = null;
    try {
    $co = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.BASE.';charset=UTF8;',UTIL,PASS);
    $co->query('SET NAMES utf8;');

    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    return $co;
}

function AfficherTest($co){
    $req ='SELECT * FROM etudiant INNER JOIN groupe ON etudiant._groupe_id = groupe.groupe_id';
    $resultat = $co->query($req);

    echo'<section>'; 
    foreach ($resultat as $value) {
    echo'
'.$value['etudiant_nom'].'<br>
'.$value['etudiant_prenom'].'<br>
'.$value['etudiant_td'].'<br>
'.$value['groupe_nom'].'<br>
'.$value['groupe_photo'].'<br>
'.$value['groupe_temps'].'
';
    }
    echo'</section>';
}

function deconnexionBD($co) {
    $co=null;
}

function prev_page($prev){
    echo '<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>';
}

function next_page($next){
    echo '<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';
}
?>
