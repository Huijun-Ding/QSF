<?php
require_once 'Fonctions.php';

$raisonT = $_GET['raison_non_talent'].$_GET['autre_raison'].$_GET['datedispo'];

if (isset($raisonT)) {

    $sql = mysqli_prepare($session, "insert into compteurt (NumOuiT, NumNonT, RaisonT) VALUES(0, 1, ?)");   
    mysqli_stmt_bind_param($sql, 's', $raisonT);
    mysqli_stmt_execute($sql); 
    
    header("Location: index.php");
}





?>