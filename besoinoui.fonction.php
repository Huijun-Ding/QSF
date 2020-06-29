<?php
require_once 'Fonctions.php';
$besoinoui = $_GET['email_oui_besoin'];
$sujet = $_GET['sujet'];

$sql = "insert into compteurb (NumOuiB, NumNonB) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  
header("Location: Accueil.php");

?>