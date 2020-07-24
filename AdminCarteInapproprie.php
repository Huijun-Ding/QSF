<?php 
require_once('Fonctions.php');

$CodeB = $_POST['desactiverb'];

if (isset($_POST['desactiverb'])) {
    $stmt1 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
    mysqli_stmt_bind_param($stmt1, 'i', $CodeB);
    mysqli_stmt_execute($stmt1);
}

//Envoyer un mail pour informer cette personne

$CodeBC = $_POST['activerb'];

if (isset($_POST['activerb'])) {
    $stmt2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 1 WHERE CodeB = ?");
    mysqli_stmt_bind_param($stmt2, 'i', $CodeBC);
    mysqli_stmt_execute($stmt2);
}




$CodeT = $_POST['desactivert'];

if (isset($_POST['desactivert'])) {
    $stmt3 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 0 WHERE CodeT = ?");
    mysqli_stmt_bind_param($stmt3, 'i', $CodeT);
    mysqli_stmt_execute($stmt3);
}
       
//Envoyer un mail pour informer cette personne

$CodeTC = $_POST['activert'];

if (isset($_POST['activert'])) {
    $stmt4 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 1 WHERE CodeT = ?");
    mysqli_stmt_bind_param($stmt4, 'i', $CodeTC);
    mysqli_stmt_execute($stmt4);
}


header("Location: Admin.php");

?>