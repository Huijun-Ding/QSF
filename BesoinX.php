<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Besoin X</title>

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

            <?php
            require_once('Fonctions.php');
            $T = $_GET['t'];
            $req = "select b.TitreB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeB = '$T' ";
            $resultat = mysqli_query ($session, $req);
            while ($ligne = mysqli_fetch_array($resultat)) {  
                echo ('<h1 class="text-center">'.$ligne["TitreB"]. '</h1>');
            }
            ?>

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
                    if (strtotime($ligne["DateButoireB"]) >= strtotime(date("yy/m/d")) && $ligne["VisibiliteB"] == 1) {   
                        echo ('<p> Date Butoire: '.date("d-m-yy", strtotime($ligne["DateButoireB"])).'</p>');
                        echo ('<p> Date Publication: '.date("d-m-yy", strtotime($ligne["DatePublicationB"])).'</p>');
                        echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..."  style="width: 35rem;"</p>');
                        echo ('<p><strong>Type: </strong>'.$ligne["TypeB"].'</p>');                        
                        echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionB"].'</p>'); 
                        echo ('<hr>'); 
                    if(isset($_SESSION['email'])){
                       echo ('<a href="MailBesoin.php?c='.$ligne["CodeB"].'"><button type="button" class="btn btn-primary btn-light">Contacter</button></a>');
                       echo ('<a href="besoinx.fonction.php?c='.$ligne["CodeB"].'">
                                <input type="submit" class="btn btn-primary btn-light" name="rejoint" value="Rejoindre à ce besoin"></input>
                              </a>');
                       echo ('<a href="Besoin.php"><button type="button" class="btn btn-dark btn-light">Retour</button></a>');
                    } else {
                       echo ('<a href="Login.php"><button type="button" class="btn btn-primary btn-light">Contacter</button></a>');
                       echo ('<a href="Besoin.php" ><button type="button" class="btn btn-dark btn-light">Retour</button></a>');
                    }   
                }
                }
                 ?>
            </div>
        </div>
          
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>
