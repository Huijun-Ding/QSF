<?php
require_once 'Fonctions.php';
$raisonT = $_GET['raison_non_talent'].$_GET['datedispo'].$_GET['autre'];

if (isset($raisonT)) {
    $sql = "insert into compteurt (NumOuiT, NumNonT, RaisonT) VALUES(0, 1, '{$raisonT}')";
    $result = mysqli_query ($session, $sql);  
    echo $raisonT;
    //header("Location: Accueil.php");
} else {
    echo 'erreur';
}
?>