<?php 
require_once('Fonctions.php');
    
    $Titre = $_POST['titre'];   // récupéré les valeurs selon la méthode POST
    $Description = $_POST['description'];
    $Date = $_POST['date'];
    $Type = $_POST['type'];  
    $Lieu = $_POST['lieu'];
    $Nombre = $_POST['nb'];
    $URL = $_POST['url'];
    $Plus = $_POST['plus'];
    $DatePublicationA = date("yy/m/d");
    $Categorie = $_POST['categorie'];
    $CodeA = $_POST['codeA'];

    $S1 = mysqli_prepare($session, "UPDATE ateliers SET TitreA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S1, 'si',$Titre ,$CodeA);
    mysqli_stmt_execute($S1);
    
    $S2 = mysqli_prepare($session, "UPDATE ateliers SET DescriptionA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S2, 'si',$Description ,$CodeA);
    mysqli_stmt_execute($S2);
    
    $S3 = mysqli_prepare($session, "UPDATE ateliers SET DateA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S3, 'si',$Date,$CodeA);
    mysqli_stmt_execute($S3);
    
    $S4 = mysqli_prepare($session, "UPDATE ateliers SET DatePublicationA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S4, 'si',$DatePublicationA ,$CodeA);
    mysqli_stmt_execute($S4);
    
    $S5 = mysqli_prepare($session, "UPDATE ateliers SET TypeA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S5, 'si',$Type ,$CodeA);
    mysqli_stmt_execute($S5);
    
    $S6 = mysqli_prepare($session, "UPDATE ateliers SET CodeC = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S6, 'si',$Categorie ,$CodeA);
    mysqli_stmt_execute($S6);
    
    $S7 = mysqli_prepare($session, "UPDATE ateliers SET LieuA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S7, 'si',$Lieu ,$CodeA);
    mysqli_stmt_execute($S7);
    
    $S8 = mysqli_prepare($session, "UPDATE ateliers SET NombreA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S8, 'ii',$Nombre ,$CodeA);
    mysqli_stmt_execute($S8);
    
    $S9 = mysqli_prepare($session, "UPDATE ateliers SET URL = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S9, 'si',$URL ,$CodeA);
    mysqli_stmt_execute($S9);
    
    $S10 = mysqli_prepare($session, "UPDATE ateliers SET PlusA = ? WHERE CodeA = ?");
    mysqli_stmt_bind_param($S10, 'si',$Plus ,$CodeA);
    mysqli_stmt_execute($S10);
    
    header("Location: MonProfil.php");
?>