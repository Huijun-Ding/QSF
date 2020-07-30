<?php

require_once('Fonctions.php');

if(isset($_POST['email'])){
    $Email = $_POST['email'];
    $Password = $_POST["password"];

    $sql = "SELECT RoleU from utilisateurs where Email = '{$Email}'";
    $result = mysqli_query ($session, $sql);
    if ($ligne = mysqli_fetch_array($result)) {   
        if ($ligne['RoleU'] = 'admin') {
            $stmt = mysqli_prepare($session, "SELECT MotDePasse FROM utilisateurs WHERE Email=?");   // Connecter et vérification de mot de passe
            mysqli_stmt_bind_param($stmt, "s", $Email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $good_password);
            mysqli_stmt_fetch($stmt);

            if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session 
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                $_SESSION['role'] = 'admin';
                header("Location: Admin.php"); 
            } else {
                ?>
           <script type="text/javascript">
               alert("Mauvais Email / mot de passe ! \n Veuillez réessayer. ");
               document.location.href = 'Login.php';
           </script>
           <?php
           }                  
        } else {
            $stmt = mysqli_prepare($session, "SELECT MotDePasse FROM utilisateurs WHERE Email=?");   // Connecter et vérification de mot de passe
            mysqli_stmt_bind_param($stmt, "s", $Email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $good_password);
            mysqli_stmt_fetch($stmt);

            if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session 
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                header("Location: Accueil.php"); 
            } else {
                ?>
            <script type="text/javascript">
                alert("Mauvais Email / mot de passe ! \n Veuillez réessayer. ");
                document.location.href = 'Login.php';
            </script>
            <?php
            }   
        }
    }
        
        // Envoyer un mail, mais on ne peut pas tester en utilisant un serveur local

     /*   $destinataire = "$Email"; // adresse mail du destinataire
        $sujet = "Confirmation de la création de compte"; // sujet du mail
        $message = "Bienvenue dans la communauté du « Quai des Savoirs Faires », vous pouvez dès à présent accéder à toutes les offres (services) aussi bien professionnelles que personnelles.\n 
                    Merci de respecter la charte d’utilisation, bon partage d’expérience à vous."; // message qui dira que le destinataire a bien lu votre mail
        // maintenant, l'en-tête du mail
        $header = 'From: '. "[Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail($destinataire, $sujet, $message, $header); // on envois le mail  */
        
      
        
    
        }
          ?>