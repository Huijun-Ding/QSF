<?php 
    require_once('Fonctions.php');

    $NomC = $_POST['nomc'];   // récupéré les valeurs selon la méthode POST
    $DescriptionC = $_POST['descriptionc'];
    $PhotoC = $_POST['photoc'];

        
    $stmt1 = mysqli_prepare($session, "INSERT INTO categories(NomC,DescriptionC,PhotoC) VALUES(?,?,?)");
    mysqli_stmt_bind_param($stmt1, 'sss', $NomC, $DescriptionC, $PhotoC);
    mysqli_stmt_execute($stmt1);
    
    
     header("Location: Admin.php");
   
?>