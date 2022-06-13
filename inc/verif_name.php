<?php
require 'lib_crud.inc.php';

$prev='name';
$next='team';

$name=$_GET['name'];
$co = connexionBD();

$alias = "SELECT * FROM (SELECT *, CONCAT_WS (' ', etudiant_prenom, etudiant_nom) AS etudiant_nomcomplet FROM etudiant) AS alltable WHERE etudiant_nomcomplet";
$resultat = $co->query($alias.' LIKE "'.$name.'"');

$lignes_resultat=$resultat->rowCount();
if ($lignes_resultat>0) { 
    $ligne=$resultat->fetch(PDO::FETCH_ASSOC);
    $_SESSION['prenom_etudiant_session']=$ligne['etudiant_prenom'];
    $_SESSION['nom_etudiant_session']=$ligne['etudiant_nom'];
    $_SESSION['groupe_etudiant_session']=$ligne['_groupe_id'];
    header('Location: ../'.$next.'.php');
} else {
    $_SESSION['erreur']='<p style="color: red;">L\'utilisateur n\'existe pas !</p> <br/>';
    header('Location: ../'.$prev.'.php');
}
deconnexionBD($co);