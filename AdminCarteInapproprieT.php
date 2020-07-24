<?php 
require_once('Fonctions.php');

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