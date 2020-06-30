<?php
require_once 'Fonctions.php';

 
$raisonT = $_GET['raison_non_talent'].$_GET['autre_raison'].$_GET['datedispo'];


if (isset($raisonT)) {
    $sql = "insert into compteurt (NumOuiT, NumNonT, RaisonT) VALUES(0, 1, '$raisonT')";
    $result = mysqli_query ($session, $sql);  
    header("Location: Accueil.php");
    echo $raisonT;
}
?>