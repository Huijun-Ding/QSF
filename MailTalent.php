<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Rédiger votre e-mail</title>

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
                <h1 class="text-center">Rédiger votre e-mail</h1>

</div>
          <div class="container">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <form action="talent.email.php" method="POST">
                        <?php 
                        //requête prendre titre de besoin
                         $query = "select t.CodeT, p.CodeU, t.TitreT from talents as t, proposer as p where t.CodeT = {$_GET['t']} and t.CodeT = p.CodeT";
                         $result = mysqli_query ($session, $query);
                         
                         if (mysqli_num_rows($result)>0) {       
                              while ($talent = mysqli_fetch_array($result)) {         
                                echo ('<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="sujet" value="[COUP DE MAIN, COUP DE POUCE] Demande de partager votre talent '.$talent["TitreT"].' " disabled >');                         
                                echo('</div>');
                                echo('</div>');
                                echo('<div class="form-group">');
                                echo('<label for="inputEmail4"><strong>Contenu du message</strong></label>');
                                echo('<textarea name="contenu_talent">');
                                echo ('Bonjour,');
                                echo('</textarea>');     
                                echo ('</div>');
                                echo ('<input type="hidden" name="codecarte" value="'.$talent['CodeT'].'">');
                                echo ('<input type="hidden" name="destinataire" value="'.$talent['CodeU'].'">');
                                echo ('<input type="hidden" name="titrecarte" value="'.$talent['TitreT'].'">');
                                echo ('<button type="submit" class="btn btn-primary">Envoyer</button>');                               
                            }
                        }
                        ?>
                        </form>
                        <a href="Talent.php"> <button type="button" class="btn btn-secondary">Annuler</button></a>
                    </div>
                </div>
              
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>