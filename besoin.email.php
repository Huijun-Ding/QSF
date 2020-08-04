<!-- 
<script>
contenu_besoin.on('instanceReady', function() {
      // Output self-closing tags the HTML4 way, like <br>.
      this.dataProcessor.writer.selfClosingEnd = '>';

      // Use line breaks for block elements, tables, and lists.
      var dtd = CKEDITOR.dtd;
      for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
        this.dataProcessor.writer.setRules(e, {
          indent: true,
          breakBeforeOpen: true,
          breakAfterOpen: true,
          breakBeforeClose: true,
          breakAfterClose: true
        });
      }
      // Start in source mode.
      Var mailbesoin = this.setMode('source');
    });
</script>
-->
<?php 

    header("Location: Accueil.php");
        //requête prendre l'email destinataire
        $query2 = "select b.TitreB, u.Email from utilisateurs u, saisir s, besoins b where u.CodeU = s.CodeU and s.CodeB = b.CodeB and b.CodeB = {$_GET['c']}";
        $result = mysqli_query ($session, $query2);
        
    if (mysqli_num_rows($result)>0) { 
        if ($email = mysqli_fetch_array($result)) {   
            // email pour répondre un besoin
            $destinataire = "{$email['Email']}"; // adresse mail du destinataire  
            $sujet = "Répondre à votre besoin {$email["TitreB"]}"; // sujet du mail
            $message = '<p>red</p>'; // Contenue du mail 
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
?>