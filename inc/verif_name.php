<?php
require 'lib_crud.inc.php';

/*-------------------- Data --------------------*/
$prev='name';
$next='team';
$name=$_POST['name'];
/*-------------------- Data --------------------*/

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
    header('Location: ../'.$prev.'.php');
}

deconnexionBD($co);