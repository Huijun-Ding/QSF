<?php
require_once 'Fonctions.php';

$sql = "insert into compteurb (NumOuiB, NumNonB) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  
header("Location: Accueil.php");

?>