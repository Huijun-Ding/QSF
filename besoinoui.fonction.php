<?php
require_once 'Fonctions.php';

$sql = "insert into compteurb (NumOuiB, NumNonB) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  

$req = "UPDATE besoins SET ReponseB = ReponseB - 1 WHERE CodeB = {$_GET['c']}";
mysqli_query($session, $req);

$query = "UPDATE emails SET VisibiliteE = 0 WHERE CodeCarte = {$_GET['c']} AND TypeCarte = 'besoin' AND Provenance = {$_GET['p']}";
mysqli_query ($session, $query); 

header("Location: MonProfil.php");

?>