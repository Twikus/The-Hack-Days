<?php
session_start();
require 'config.inc.php';

/*--------------------Connexion de la DB--------------------*/
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

/*--------------------Deconnexion de la DB--------------------*/
function deconnexionBD($co) {
    $co=null;
}

/*--------------------Mettre a jour le groupe une fois connecté--------------------*/
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

/*--------------------Montré à quoi ressemble son groupe--------------------*/
function ShowGroup($co,$etudiant_id){
    $req ='SELECT * FROM groupe WHERE groupe_id="'.$etudiant_id.'"';
    $resultat = $co->query($req);

    foreach ($resultat as $value) {
    echo'
    <div>
        <h2>'.$value['groupe_nom'].'</h2>
        <img src="medias/uploaded_images/'.$value['groupe_photo'].'">
    </div>
';
    }
}

/*--------------------Bouton retour--------------------*/
function prevpage($prev){
    echo '<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>';
}

/*--------------------Bouton retour--------------------*/
function nextpage($next){
    echo '<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';
}

/*--------------------Bouton retour pour les pages avec un form--------------------*/
function nextpage_form($next){
    echo '<footer onclick="form.submit()"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></footer>';
}