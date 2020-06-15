<?php
require_once('Fonctions.php');
       
if(isset($_POST['email'])){                                 //Ajouter le nouveau utilisateur dans la base de donnée
    
       $Email = $_POST['email'];
       
        if(is_unique_login($session, $Email)){
            if($_POST["password"] == $_POST["passwordcf"]){
                $Password = password_hash($_POST["password"],PASSWORD_DEFAULT);
                $Nom = $_POST['nom'];
                $Prenom = $_POST['prenom'];
                $Type = $_POST['typeu'];

                $stmt = mysqli_prepare($session, "INSERT INTO utilisateurs(NomU,PrenomU,Email,MotDePasse,TypeU) VALUES(?,?,?,?,?)");   

                mysqli_stmt_bind_param($stmt, 'sssss', $Nom,$Prenom,$Email,$Password,$Type);
                mysqli_stmt_execute($stmt);

                session_start();                                 //Après l'inscription, l'utilisateur se connecter automatiquement

                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;

                header("Location: Accueil.php");                 // Vers la page Accueil

                // Envoyer un mail, mais on ne peut pas tester en utilisant un serveur local, on va aussi essayer avec "SendGrid"

                 $destinataire = "$Email"; // adresse mail du destinataire
                 $sujet = "Confirmation de la création de compte"; // sujet du mail
                 $message = "Vous venez de créer un compte"; // message qui dira que le destinataire a bien lu votre mail
                 // maintenant, l'en-tête du mail
                 $header = "From: l'email d'un administrateur\r\n"; 
                 $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                 mail ($destinataire, $sujet, $message, $header); // on envois le mail
            }  else {
                echo "Veuillez entrez le même mot de passe dans les deux champs";
            }
             
        } else {
               echo ("<h2> L'email $Email est déjà utilisé </h2>"); 
               echo "<a href=\"Inscription.php\">Essayer avec un autre mail</a>";
        }
       
 } else {     
     echo "<b>Veuillez réessayer ! Cette adresse mail a été utilisée </b></br>";
    }

?>


