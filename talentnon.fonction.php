<?php
require_once 'Fonctions.php';
$raisonT = $_GET['raison_non_talent'];

if (isset($raisonB)) {
    $sql = "insert into compteurt (NumOuiT, NumNonT, RaisonT) VALUES(0, 1, '{$raisonT}')";
    $result = mysqli_query ($session, $sql);  
    header("Location: Accueil.php");
}
?>