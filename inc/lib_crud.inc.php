<?php
session_start();
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

function deconnexionBD($co) {
    $co=null;
}

function ChangeGroup($co,$id,$team_name,$nouvelleImage){
    $req = "UPDATE groupe SET groupe_nom='$team_name',groupe_photo='$nouvelleImage' WHERE groupe_id=".$id;
    //echo '<p>' . $req . '</p>' . "\n";
    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

function ShowGroup($co,$etudiant_id){
    $req ='SELECT * FROM groupe WHERE groupe_id="'.$etudiant_id.'"';
    $resultat = $co->query($req);

    echo'<section>'; 
    foreach ($resultat as $value) {
    echo'
'.$value['groupe_nom'].'<br>
<img src="medias/uploaded_images/'.$value['groupe_photo'].'"><br>
';
    }
    echo'</section>';
}

/*-------------------------------------------------------------------------------------------------------*/

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