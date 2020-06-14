<?php 
require_once('Fonctions.php');

  /* Rendre l'utilisateur et tous ses cartes, catégories en anonyme */
  /* tous ses cartes */
 
    $S2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
    mysqli_stmt_bind_param($S2, 'i', $CodeB);
    mysqli_stmt_execute($S2);
    
    $S2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
    mysqli_stmt_bind_param($S2, 'i', $CodeB);
    mysqli_stmt_execute($S2);

    /* tous ses categories */

    $S3 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeU` = ? ");
    mysqli_stmt_bind_param($S3, 'i', $usercode);
    mysqli_stmt_execute($S3);

     /* le compte */
    
    $S4 = mysqli_prepare($session, "UPDATE utilisateurs SET Anonyme = 0 WHERE CodeU = ?");
    mysqli_stmt_bind_param($S4, 'i', $usercode);
    mysqli_stmt_execute($S4);
    
    $S2 = mysqli_prepare($session, "UPDATE utilisateurs SET Email = 'XXXXX' WHERE CodeU = ?");
    mysqli_stmt_bind_param($S2, 'i', $usercode);
    mysqli_stmt_execute($S2);
    
    $S2 = mysqli_prepare($session, "UPDATE utilisateurs SET NomU = 'XXXXX' WHERE CodeU = ?");
    mysqli_stmt_bind_param($S2, 'i', $usercode);
    mysqli_stmt_execute($S2);
    
    $S2 = mysqli_prepare($session, "UPDATE utilisateurs SET PrenomU = 'XXXXX' WHERE CodeU = ?");
    mysqli_stmt_bind_param($S2, 'i', $usercode);
    mysqli_stmt_execute($S2);
    

session_destroy();
header("Location: Accueil.php");

?>