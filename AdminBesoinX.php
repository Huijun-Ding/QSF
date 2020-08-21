<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Admin Besoin X</title>

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
                <h1 class="text-center">Admin Besoin X</h1>

</div>
          <div class="container">
               <?php
                require_once('Fonctions.php');
                $T = $_GET['t'];
                $query = "select b.CodeB, b.TypeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DatePublicationB, b.DescriptionB, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeB = '$T' ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */

                        echo ('<h1>'.$ligne["TitreB"]. '</h1>');                        
                        echo ('<h3> Date Butoire: '.date("d-m-yy", strtotime($ligne["DateButoireB"])).'</h3>');
                        echo ('<p> Date Publication: '.date("d-m-yy", strtotime($ligne["DatePublicationB"])).'</p>');
                        echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." height="200" style="width: 20rem;"</p>');
                        echo ('<p><strong>Type: </strong>'.$ligne["TypeB"].'</p>');                        
                        echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionB"].'</p>'); 

                }
                 ?>
            </div>
        </div>
            
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>

