<?php 
require_once('Fonctions.php');

    $CodeT = $_POST['codeT'];
    
    /*$S3 = mysqli_prepare($session, "DELETE FROM `proposer` WHERE `CodeT` = ? and `CodeU` = ?");
    mysqli_stmt_bind_param($S3, 'ii', $CodeT, $usercode);
    mysqli_stmt_execute($S3); */

    $S4 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 0 WHERE CodeT = ?");
    mysqli_stmt_bind_param($S4, 'i', $CodeT);
    mysqli_stmt_execute($S4);

    
    header("Location: MonProfil.php");

?>