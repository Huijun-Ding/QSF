<?php 
require_once('Fonctions.php');

$CodeUS = $_POST['CodeUS'];

if (isset($EmailS)) {
     $S1 = mysqli_prepare($session, "DELETE * FROM `saisir` WHERE CodeU = ? ");
    mysqli_stmt_bind_param($S1, 's', $CodeUS);
    mysqli_stmt_execute($S1);
    
     $S2 = mysqli_prepare($session, "DELETE * FROM `proposer` WHERE CodeU = ? ");
    mysqli_stmt_bind_param($S2, 's', $CodeUS);
    mysqli_stmt_execute($S2);
    
    $S3 = mysqli_prepare($session, "DELETE * FROM `abonner` WHERE CodeU = ? ");
    mysqli_stmt_bind_param($S3, 's', $CodeUS);
    mysqli_stmt_execute($S3);
    
    $S4 = mysqli_prepare($session, "DELETE * FROM `utilisateurs` WHERE CodeU = ? ");
    mysqli_stmt_bind_param($S4, 's', $CodeUS);
    mysqli_stmt_execute($S4);
}

session_destroy();
header("Location: Accueil.php");

?>