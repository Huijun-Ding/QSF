<?php
require_once 'Fonctions.php';
$raisonB = $_GET['raison_non_besoin']. $_GET['autre_raison'];

if (isset($raisonB)) {
    $sql = "insert into compteurb (NumOuiB, NumNonB, RaisonB) VALUES(0, 1, '{$raisonB}')";
    $result = mysqli_query ($session, $sql);  
    header("Location: Accueil.php");
}
?>
