<?php

require_once('Fonctions.php');

if(isset($_POST['email'])){
    $Email = $_POST['email'];
    $Password = $_POST["password"];

    $stmt = mysqli_prepare($session, "SELECT MotDePasse FROM utilisateurs WHERE Email=?");   // Connecter et vérification de mot de passe
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $good_password);
    mysqli_stmt_fetch($stmt);

    if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session

        /*$stmt2 = mysqli_prepare($session, "SELECT * FROM utilisateurs WHERE Email= ?");   // Connecter et vérification de mot de passe
        mysqli_stmt_bind_param($stmt2, "s", $Email);
        mysqli_stmt_execute($stmt2);*/

        //mysqli_stmt_bind_result($stmt2, $role);
        //$role = mysqli_fetch_assoc($stmt2);
        
        /*$stmt2 = mysqli_query($session, "SELECT * FROM utilisateurs WHERE Email= '$Email'");
        while ($role = mysqli_fetch_array($stmt2)) {
           if ($role['Role'] == 'Admin') {         //Comment accéder la page Admin ?
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                header("Location: Admin.php");
           } else { */
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                header("Location: Accueil.php");
                /*
           }
        }
       */
             
      
     

        
        // Envoyer un mail, mais on ne peut pas tester en utilisant un serveur local

        $destinataire = "$Email"; // adresse mail du destinataire
        $sujet = "Confirmation de la création de compte"; // sujet du mail
        $message = "Bienvenue dans la communauté du « Quai des Savoirs Faires », vous pouvez dès à présent accéder à toutes les offres (services) aussi bien professionnelles que personnelles.\n 
                    Merci de respecter la charte d’utilisation, bon partage d’expérience à vous."; // message qui dira que le destinataire a bien lu votre mail
        // maintenant, l'en-tête du mail
        $header = 'From: '. "[Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail($destinataire, $sujet, $message, $header); // on envois le mail  
        
      
        
        } else {
              ?>
        <script type="text/javascript">
            alert("Mauvais Email / mot de passe ! \n Veuillez réessayer. ");
            document.location.href = 'Login.php';
        </script>
        <?php
        }       
        }
          ?>