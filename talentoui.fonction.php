<?php
require_once 'Fonctions.php';

$sql = "insert into compteurt (NumOuiT, NumNonT) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  

$req = "UPDATE talents SET ReponseT = ReponseT - 1 WHERE CodeT = {$_GET['c']}";
mysqli_query($session, $req);

$query = "UPDATE emails SET VisibiliteE = 0 WHERE CodeCarte = {$_GET['c']} AND TypeCarte = 'talent' AND Provenance = {$_GET['p']}";
mysqli_query ($session, $query); 

header("Location: MonProfil.php");

?>