<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Modifier une catégorie</title>

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
                <h1 class="text-center">Modifier une catégorie</h1>

</div>
          <div class="container">
            <br>
              <form action="AdminCategorieFonction.php" method="POST">
                  
               <?php
                $T = $_GET['t'];
                $query = "select CodeC, NomC, DescriptionC, PhotoC from categories where CodeC = $T ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
    
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Nom de catégorie</label>');
                        echo ('<input type="text" name="nomc" class="form-control col-md-4" id="inputEmail4" maxlength="20" value="'.$ligne["NomC"].'" required>');
                        echo ('</div>');
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">Description de catégorie</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="descriptionc" required>'.$ligne["DescriptionC"].'</textarea>') ;
                        echo('</div>') ;
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">URL de photo</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="photoc" required>'.$ligne["PhotoC"].'</textarea>') ;
                        echo('</div>') ;
       
                     echo('<div class="form-group">');
                        echo('<button name="modifier" type="submit" value="'.$ligne["CodeC"].'" class="btn btn-light">MODIFIER</button>');
                     echo('</div>');
                }

                 ?> 
              </form>

          </div>
        </div>

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>