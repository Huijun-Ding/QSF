<?php
require_once 'Fonctions.php';

//Compter comme une mise en relation réussit
$sql = "insert into compteurt (NumOuiT, NumNonT) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  

//Réponse - 1, une réponse a été traité
$req = "UPDATE talents SET ReponseT = ReponseT - 1 WHERE CodeT = {$_GET['c']}";
mysqli_query($session, $req);

//Cette réponse ne sera plus visible
$query = "UPDATE emails SET VisibiliteE = 0 WHERE CodeCarte = {$_GET['c']} AND TypeCarte = 'talent' AND Provenance = {$_GET['p']}";
mysqli_query ($session, $query); 

header("Location: MonProfil.php");

?>