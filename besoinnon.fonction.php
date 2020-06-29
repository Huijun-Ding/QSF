<?php
require_once 'Fonctions.php';
$raisonB = $_GET['raison_non_besoin'];
$raisonB .= $_GET['autre'];

if (isset($raisonB)) {
    $sql = "insert into compteurb (NumOuiB, NumNonB, RaisonB) VALUES(0, 1, '{$raisonB}')";
    $result = mysqli_query ($session, $sql);  
    header("Location: Accueil.php");
}
?>
