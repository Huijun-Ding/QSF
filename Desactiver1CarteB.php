<?php 
require_once('Fonctions.php');
    
    $CodeB = $_POST['codeB'];


    $S1 = mysqli_prepare($session, "DELETE FROM `saisir` WHERE `CodeB` = ? and `CodeU` = ?");
    mysqli_stmt_bind_param($S1, 'ii', $CodeB, $usercode);
    mysqli_stmt_execute($S1);

    $S2 = mysqli_prepare($session, "DELETE FROM `besoins` WHERE `CodeB` = ? ");
    mysqli_stmt_bind_param($S2, 'i', $CodeB);
    mysqli_stmt_execute($S2);
  
    
    
    header("Location: MonProfil.php");

?>