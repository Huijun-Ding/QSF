<?php
require_once 'Fonctions.php';

//Compter comme une mise en relation réussit
$sql = "insert into compteurb (NumOuiB, NumNonB) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  

//Réponse - 1, une réponse a été traité
$req = "UPDATE besoins SET ReponseB = ReponseB - 1 WHERE CodeB = {$_GET['c']}";
mysqli_query($session, $req);

//Cette réponse ne sera plus visible
$query = "UPDATE emails SET VisibiliteE = 0 WHERE CodeCarte = {$_GET['c']} AND TypeCarte = 'besoin' AND Provenance = {$_GET['p']}";
mysqli_query ($session, $query); 

header("Location: MonProfil.php");

?>