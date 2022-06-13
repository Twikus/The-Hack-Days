<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

$prev='name';
$next='team';
echo '
<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>
<main>';


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
    header('Location: '.$next.'.php');
} else {
    $_SESSION['erreur']='<p style="color: red;">L\'utilisateur n\'existe pas !</p> <br/>';
    header('Location: '.$prev.'.php');
}
deconnexionBD($co);

echo '</main>
<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';

require 'inc/end.php';