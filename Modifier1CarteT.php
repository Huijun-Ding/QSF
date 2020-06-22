<?php 
require_once('Fonctions.php');
    
    $Titre = $_POST['titre'];   // récupéré les valeurs selon la méthode POST
    $Description = $_POST['description'];
    $Type = $_POST['type'];  
    $DatePublicationT = date("yy/m/d");
    $Categorie = $_POST['categorie'];
    $CodeT = $_POST['codeT'];

    $S1 = mysqli_prepare($session, "UPDATE talents SET TitreT = ? WHERE CodeT = ?");
    mysqli_stmt_bind_param($S1, 'si',$Titre ,$CodeT);
    mysqli_stmt_execute($S1);
    
    $S2 = mysqli_prepare($session, "UPDATE talents SET DescriptionT = ? WHERE CodeT = ?");
    mysqli_stmt_bind_param($S2, 'si',$Description ,$CodeT);
    mysqli_stmt_execute($S2);
    
    
     $S4 = mysqli_prepare($session, "UPDATE talents SET DatePublicationT = ? WHERE CodeT = ?");
    mysqli_stmt_bind_param($S4, 'si',$DatePublicationT ,$CodeT);
    mysqli_stmt_execute($S4);
    
       
   $S5 = mysqli_prepare($session, "UPDATE talents SET TypeT = ? WHERE CodeT = ?");
    mysqli_stmt_bind_param($S5, 'si',$Type ,$CodeT);
    mysqli_stmt_execute($S5);
    
  
      $S6 = mysqli_prepare($session, "UPDATE talents SET CodeC = ? WHERE CodeT = ?");
    mysqli_stmt_bind_param($S6, 'si',$Categorie ,$CodeT);
    mysqli_stmt_execute($S6);
    
    header("Location: MonProfil.php");
?>