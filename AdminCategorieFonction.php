<?php 
    require_once('Fonctions.php');

    if (isset($_POST['creer'])) {
        $NomC = $_POST['nomc'];   // récupéré les valeurs selon la méthode POST
        $DescriptionC = $_POST['descriptionc'];
        $PhotoC = $_POST['photoc'];

        $stmt1 = mysqli_prepare($session, "INSERT INTO categories(NomC,DescriptionC,PhotoC) VALUES(?,?,?)");
        mysqli_stmt_bind_param($stmt1, 'sss', $NomC, $DescriptionC, $PhotoC);
        mysqli_stmt_execute($stmt1);
    }   
    
    if (isset($_POST['modifier'])) {
        $NomC = $_POST['nomc'];   // récupéré les valeurs selon la méthode POST
        $DescriptionC = $_POST['descriptionc'];
        $PhotoC = $_POST['photoc'];
        $CodeC = $_POST['modifier'];

        $stmt2 = mysqli_prepare($session, "UPDATE categories SET NomC = ? WHERE CodeC = ?");
        mysqli_stmt_bind_param($stmt2, 'si', $NomC ,$CodeC);
        mysqli_stmt_execute($stmt2);

        $stmt3 = mysqli_prepare($session, "UPDATE categories SET DescriptionC = ? WHERE CodeC = ?");
        mysqli_stmt_bind_param($stmt3, 'si',$DescriptionC ,$CodeC);
        mysqli_stmt_execute($stmt3);

        $stmt4 = mysqli_prepare($session, "UPDATE categories SET PhotoC = ? WHERE CodeC = ?");
        mysqli_stmt_bind_param($stmt4, 'si',$PhotoC ,$CodeC);
        mysqli_stmt_execute($stmt4);
    }   
    
    if (isset($_POST['desactiver'])) {
        $CodeC = $_POST['desactiver'];

        $stmt4 = mysqli_prepare($session, "UPDATE categories SET VisibiliteC = 0 WHERE CodeC = ?");
        mysqli_stmt_bind_param($stmt4, 'i', $CodeC);
        mysqli_stmt_execute($stmt4);
    }   
   
    
    header("Location: Admin.php");
   
?>