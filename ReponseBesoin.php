<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Réponses pour mes besoins</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
  </head>
  <body>

    
<!-- Menu -->
 <?php require "menu.php"; ?>
<!-- Fin Menu -->


        <div class="jumbotron">
          
          <div class="section-title section-title-haut-page" >
                <h1 class="text-center">Réponses pour mes besoins</h1>

</div>
          <div class="container">
                <?php
                require_once('Fonctions.php');

                $query = "SELECT e.CodeCarte, e.Sujet, e.Contenu, u.Email, b.DateButoireB, b.VisibiliteB, e.Provenance FROM emails AS e, utilisateurs AS u, besoins AS b WHERE e.TypeCarte = 'besoin' AND e.Destinataire = {$_SESSION['codeu']} AND e.VisibiliteE = 1 AND e.CodeCarte = {$_GET['code']}  AND e.Provenance = u.CodeU AND b.CodeB = e.CodeCarte"; 

                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher la liste des réponses sur ce besoin */
                    if (strtotime($ligne["DateButoireB"]) >= strtotime(date("yy/m/d")) && $ligne["VisibiliteB"] == 1) {   
                        echo ('<h6>'.$ligne["Sujet"]. '</h6>');                                             
                        echo ('<p>'.$ligne["Contenu"]. '</p><br>'); 
                        echo ('<a href="mailto:'.$ligne['Email'].'"><button type="button" onclick="javascript: sendmail();" class="btn btn-primary">Super, je réponds</button></a> '); // envoyer un mail pour les mettre en contact
                        echo ('<a href="besoinnon.html.php?p='.$ligne['Provenance'].'&c='.$ligne['CodeCarte'].'"><button type="button" class="btn btn-secondary">Dommage, car...</button></a><hr>');
                        //$mail = $ligne["Email"];
                    }
                }
                ?>   
                <!-- href="mailto:'.$ligne["Email"].'"  -->
          </div>
        </div>
  <hr> 
   <!-- <script>
      var mail="<?php //echo $mail;?>";
      function sendmail() {
          window.location.href = "mailto:" + mail + "";   
      }
    </script> -->

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>
