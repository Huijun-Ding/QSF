<?php
require_once 'Fonctions.php';
$talentoui = $_GET['email_oui_talent'];
$sujet = $_GET['sujet'];

$sql = "insert into compteurt (NumOuiT, NumNonT) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  
header("Location: Accueil.php");

?>