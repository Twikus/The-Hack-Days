<?php
require 'lib_crud.inc.php';

/*-------------------- Data --------------------*/
$prev='team';
$next='showgroup';
$id=$_SESSION['groupe_etudiant_session'];
$team_name=$_POST['team_name'];
$imageType=$_FILES["image"]["type"];
$name_error = '<p id="name_error_2" class="error">Tu dois choisir un nom pour ton équipe !</p>';
$file_error = '<p id="file_error_2" class="error">Tu dois choisir une image pour ton équipe !</p>';
/*-------------------- Data --------------------*/

if (empty($team_name) && empty($imageType)){
    $_SESSION['first_error']=$name_error;
    $_SESSION['second_error']='<br/>'.$file_error;
    header('Location: ../'.$prev.'.php');
}elseif(empty($team_name)){
    $_SESSION['first_error']=$name_error;
    header('Location: ../'.$prev.'.php');
}elseif(empty($imageType)){
    $_SESSION['second_error']=$file_error;
    header('Location: ../'.$prev.'.php');
}else{
    if ( ($imageType != "image/png") &&
    ($imageType != "image/jpg") &&
    ($imageType != "image/jpeg") ) {
        $_SESSION['second_error']='<p class="error">Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p> <br/>';
        header('Location: ../'.$prev.'.php');
        die();
    }
    $nouvelleImage = $_SESSION['prenom_etudiant_session']."_".$_SESSION['nom_etudiant_session']."_send_".$_FILES["image"]["name"];

    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["image"]["tmp_name"],"../medias/uploaded_images/".$nouvelleImage)) {
            $_SESSION['second_error']='<p class="error">Problème avec la sauvegarde de l\'image, désolé...</p> <br/>';
            header('Location: ../'.$prev.'.php');
            die();
        }
    } else {
        $_SESSION['second_error']='<p class="error">Problème : image non chargée...</p> <br/>';
        header('Location: ../'.$prev.'.php');
        die();
    }
        $co=connexionBD();
        ChangeGroup($co,$id,$team_name,$nouvelleImage);
        deconnexionBD($co);
        header('Location: ../'.$next.'.php');
}