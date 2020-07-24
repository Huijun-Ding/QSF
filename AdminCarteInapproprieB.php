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




header("Location: Admin.php");

?>