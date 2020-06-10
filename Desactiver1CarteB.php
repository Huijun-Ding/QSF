<?php 
require_once('Fonctions.php');
    
    $CodeB = $_POST['codeB'];


    /* $S1 = mysqli_prepare($session, "DELETE FROM `saisir` WHERE `CodeB` = ? and `CodeU` = ?");  // Est-ce qu'on supprimer la relation entre les cartes et utilisatuers ? 
    mysqli_stmt_bind_param($S1, 'ii', $CodeB, $usercode);     // ou ils peuvent réactiver les cartes ?
    mysqli_stmt_execute($S1); */

    $S2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
    mysqli_stmt_bind_param($S2, 'i', $CodeB);
    mysqli_stmt_execute($S2);
  
    
    header("Location: MonProfil.php");

?>