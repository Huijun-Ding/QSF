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

    if ($email = mysqli_fetch_array($result)) {   
        $Email = $email['Email'];
       

        $destinataire = "mllexuanwei@gmail.com";// adresse mail du destinataire
        $sujet = "Répondre à votre besoin"; // sujet du mail
        //$message="<script>document.write(mailbesoin);</script>"; // message qui dira que le destinataire a bien lu votre mail
        $message='<p>test</p>';      
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
    
        $headers[] = 'From: [Plateforme]';

        mail ($destinataire, $sujet, $message, implode("\r\n", $headers)); // on envois le mail  
        

}
?>