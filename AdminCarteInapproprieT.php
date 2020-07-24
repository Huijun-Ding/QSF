<?php 
require_once('Fonctions.php');

$CodeT = $_POST['desactivert'];

if (isset($_POST['desactivert'])) {
    $stmt3 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 0 WHERE CodeT = ?");
    mysqli_stmt_bind_param($stmt3, 'i', $CodeT);
    mysqli_stmt_execute($stmt3);
}
     



$CodeTC = $_POST['activert'];

if (isset($_POST['activert'])) {
    $stmt4 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 1 WHERE CodeT = ?");
    mysqli_stmt_bind_param($stmt4, 'i', $CodeTC);
    mysqli_stmt_execute($stmt4);
}


header("Location: Admin.php");


//Envoyer un mail pour informer cette personne
/*
        $Email = mysqli_prepare($session, "SELECT u.Email FROM utilisateurs u, proposer p WHERE u.CodeU = p.CodeU and CodeT = ?");   
        mysqli_stmt_bind_param($Email, 'i', $CodeT);
        mysqli_stmt_execute($Email);  
        
        $destinataire = "$Email"; // adresse mail du destinataire
        $sujet = "Votre talent a été supprimé par l'administrateur"; // sujet du mail
        $message = "Votre talent a été supprimé par l'administrateur à cause des contenus inappropriés"; // message qui dira que le destinataire a bien lu votre mail
        // maintenant, l'en-tête du mail
        $header = "From: [Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail ($destinataire, $sujet, $message, $header); // on envois le mail    

 */
?>