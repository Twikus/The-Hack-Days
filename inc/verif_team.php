<?php
require 'lib_crud.inc.php';

$prev='team';
$next='end_inscription';
$id=$_SESSION['groupe_etudiant_session'];
$team_name=$_POST['team_name'];
$imageType=$_FILES["image"]["type"];

if (empty($team_name) && empty($imageType)){
    $_SESSION['erreur_file']='<p style="color: red;">Tu dois choisir une image pour ton équipe !</p> <br/>';
    $_SESSION['erreur_name']='<p style="color: red;">Tu dois choisir un nom pour ton équipe !</p> <br/>';
    header('Location: ../'.$prev.'.php');
}elseif(empty($team_name)){
    $_SESSION['erreur_name']='<p style="color: red;">Tu dois choisir un nom pour ton équipe !</p> <br/>';
    header('Location: ../'.$prev.'.php');
}elseif(empty($imageType)){
    $_SESSION['erreur_file']='<p style="color: red;">Tu dois choisir une image pour ton équipe !</p> <br/>';
    header('Location: ../'.$prev.'.php');
}else{
    if ( ($imageType != "image/png") &&
    ($imageType != "image/jpg") &&
    ($imageType != "image/jpeg") ) {
        $_SESSION['erreur_file']='<p style="color: red;">Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p> <br/>';
        header('Location: ../'.$prev.'.php');
        die();
    }
    $nouvelleImage = $_SESSION['prenom_etudiant_session']."_".$_SESSION['nom_etudiant_session']."_send_".$_FILES["image"]["name"];

    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["image"]["tmp_name"],"../medias/uploaded_images/".$nouvelleImage)) {
            $_SESSION['erreur_file']='<p style="color: red;">Problème avec la sauvegarde de l\'image, désolé...</p> <br/>';
            header('Location: ../'.$prev.'.php');
            die();
        }
    } else {
        $_SESSION['erreur_file']='<p style="color: red;">Problème : image non chargée...</p> <br/>';
        header('Location: ../'.$prev.'.php');
        die();
    }
        $co=connexionBD();
        ChangeGroup($co,$id,$team_name,$nouvelleImage);
        deconnexionBD($co);
        header('Location: ../'.$next.'.php');
}