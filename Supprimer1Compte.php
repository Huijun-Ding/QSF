<?php 
require_once('Fonctions.php');
    /*$S1 = mysqli_prepare($session, "DELETE FROM saisir, besoins USING saisir, besoins WHERE saisir.CodeU = ? AND saisir.CodeB=besoins.CodeB ;");
    mysqli_stmt_bind_param($S1, 'i', $usercode);
    mysqli_stmt_execute($S1);*/


    $S1 = mysqli_prepare($session, "DELETE FROM saisir s, besoins b WHERE `CodeU` = ? and s.CodeB = b.CodeB");
    mysqli_stmt_bind_param($S1, 'i', $usercode);
    mysqli_stmt_execute($S1);


    $S2 = mysqli_prepare($session, "DELETE FROM proposer p, talents t WHERE `CodeU` = ? and s.CodeT = b.CodeT");
    mysqli_stmt_bind_param($S2, 'i', $usercode);
    mysqli_stmt_execute($S2);


    $S3 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeU` = ? ");
    mysqli_stmt_bind_param($S3, 'i', $usercode);
    mysqli_stmt_execute($S3);


    $S4 = mysqli_prepare($session, "DELETE FROM `utilisateurs` WHERE `CodeU` = ? ");
    mysqli_stmt_bind_param($S4, 'i', $usercode);
    mysqli_stmt_execute($S4);
    

session_destroy();
header("Location: Accueil.php");

?>