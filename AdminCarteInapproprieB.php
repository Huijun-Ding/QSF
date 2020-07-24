<?php 
require_once('Fonctions.php');

//Désactiver une carte qui contient des contenus inappropriés
$CodeB = $_POST['desactiverb'];

if (isset($_POST['desactiverb'])) {
    $stmt1 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
    mysqli_stmt_bind_param($stmt1, 'i', $CodeB);
    mysqli_stmt_execute($stmt1);
}

   



$CodeBC = $_POST['activerb'];

if (isset($_POST['activerb'])) {
    $stmt2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 1 WHERE CodeB = ?");
    mysqli_stmt_bind_param($stmt2, 'i', $CodeBC);
    mysqli_stmt_execute($stmt2);
}



header("Location: Admin.php");

//Envoyer un mail pour informer cette personne
/*
        $Email = mysqli_prepare($session, "SELECT u.Email FROM utilisateurs u, saisir s WHERE u.CodeU = s.CodeU and CodeB = ?");   
        mysqli_stmt_bind_param($Email, 'i', $CodeB);
        mysqli_stmt_execute($Email);  
        
        $destinataire = "$Email"; // adresse mail du destinataire
        $sujet = "Votre besoin a été supprimé par l'administrateur"; // sujet du mail
        $message = "Votre besoin a été supprimé par l'administrateur à cause des contenus inappropriés"; // message qui dira que le destinataire a bien lu votre mail
        // maintenant, l'en-tête du mail
        $header = "From: [Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail ($destinataire, $sujet, $message, $header); // on envois le mail 
*/
?>