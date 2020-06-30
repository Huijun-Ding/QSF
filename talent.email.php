<script>
contenu_talent.on('instanceReady', function() {
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
      this.setMode('source');
    });
</script>

<?php 
        //requête prendre l'email destinataire
        $query2 = "select b.TitreB, u.Email from utilisateurs u, saisir s, besoins b where u.CodeU = s.CodeU and s.CodeB = b.CodeB and b.CodeB = {$_GET['c']}";
        $result = mysqli_query ($session, $query2);

if (mysqli_num_rows($result)>0) {       
    while ($mail = mysqli_fetch_array($result)) {
        $destinataire = $mail["Email"]; // adresse mail du destinataire
        $sujet = "[Quai des savoir-faire] Répondre à votre besoin {$besoin["TitreB"]} "; // sujet du mail
        $message = ''; // message qui dira que le destinataire a bien lu votre mail
        //l'en-tête du mail
        $header = "From: [Quai des savoir-faire]\r\n"; 
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
        mail ($destinataire, $sujet, $message, $header); // on envois le mail 
    }
}
?>