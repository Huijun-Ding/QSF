<?php 
    //requête prendre l'email destinataire
    $query2 = "select b.TitreT, u.Email from utilisateurs u, talents t, proposer p where u.CodeU = p.CodeU and t.CodeT = p.CodeT and t.CodeT = {$_GET['t']}";
    $result = mysqli_query ($session, $query2);

    if (mysqli_num_rows($result)>0) {       
        while ($email = mysqli_fetch_array($result)) {
            // email pour répondre un besoin
            $destinataire = $mail["Email"]; // adresse mail du destinataire
            $sujet = "Demande de partage votre talent {$email["TitreT"]}"; // sujet du mail
            $message = ''; // Contenue du mail 
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= 'From: <Admin@plateforme.com>' . "\r\n"; // En-têtes additionnels  
            mail ($destinataire, $sujet, $message, $headers); // on envois le mail  

            //email pour evaluation de l'expérience
            $to = "{$email['Email']}"; // adresse mail du destinataire
            $to .= "{$_SESSION['email']}";
            $subject = "Evaluation sur votre expérience {$email["TitreB"]}"; // sujet du mail
            $content = ''; // Contenue du mail 
            $from = 'MIME-Version: 1.0' . "\r\n";
            $from .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $from .= 'From: <Admin@plateforme.com>' . "\r\n"; // En-têtes additionnels  
            mail ($to, $subject, $content, $from); // on envois le mail 
        }
    }
    
    header("Location: Accueil.php");
?>