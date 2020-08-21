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
                    <label for="staticEmail" class="col-sm-2 col-form-label" name="sujet"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <form action="besoin.email.php" method="POST">
                        <?php 
                        //requête prendre titre de besoin
                         $query1 = "select CodeB, TitreB from besoins where CodeB = {$_GET['c']}";
                         $result = mysqli_query ($session, $query1);
                         
                         if (mysqli_num_rows($result)>0) {       
                              if ($besoin = mysqli_fetch_array($result)) {         
                                echo ('<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="sujet" value="[COUP DE MAIN, COUP DE POUCE] Répondre à votre besoin '.$besoin["TitreB"].' " disabled >');                         
                                echo('</div>');
                                echo('</div>');
                                echo('<div class="form-group">');
                                echo('<label for="inputEmail4"><strong>Contenu du message</strong></label>');
                                echo('<textarea name="contenu_besoin">');
                                echo ('Bonjour,');
                                echo('</textarea>');     
                                echo ('</div>');
                                echo ('<input type="hidden" name="codecarte" value="'.$besoin['CodeB'].'">');
                                echo ('<input type="hidden" name="titrecarte" value="'.$besoin['TitreB'].'">');     
                                echo ('<button type="submit" class="btn btn-primary">Envoyer</button> ');  
                            }
                        }  

                        ?> 
                        </form>
                        <a href="Besoin.php"> <button type="button" class="btn btn-secondary">Annuler</button></a>
                </div>    
            </div>
 
        </div>
            
        <script>
            var editor1 = CKEDITOR.replace('contenu_besoin', {
                extraAllowedContent: 'div',
                height: 250
              });
        </script>
                
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>