<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Atelier X</title>

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
                <h1 class="text-center">Atelier X</h1>

</div>
          <div class="container">
               <?php
                require_once('Fonctions.php');
                $T = $_GET['t'];
                $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.CodeA = '$T' ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if ($ligne["VisibiliteA"] == 1) {   
                        echo ('<h1>'.$ligne["TitreA"]. '</h1>');                        
                        echo ('<h3> Date  & Créneau horaire : '.$ligne["DateA"].'</h3>');
                        echo ('<p> Date Publication : '.$ligne["DatePublicationA"].'</p>');
                        echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." style="width: 35rem;"</p>');
                        echo ('<p><strong>Type d\'atelier : </strong>'.$ligne["TypeA"].'</p>');                        
                        echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionA"].'</p>'); 
                        echo ('<p><strong>Lieu d\'atelier : </strong>'.$ligne["LieuA"].'</p>');             
                        echo ('<p><strong>Nombre de personnes maximum : </strong>'.$ligne["NombreA"].'</p>');  
                        echo ('<strong>En savoir plus : </strong><a href="'.$ligne["PlusA"].'" target="_blank">'.$ligne["PlusA"].'</a>');  
                    if(isset($_SESSION['email'])){
                       echo ('<a href="'.$ligne["URL"].'" target="_blank"><button type="button" class="btn btn-primary btn-light">Je m\'inscris</button></a> ');    
                       echo ('<a href="Atelier.php"><button type="button" class="btn btn-dark btn-light>Retour</button></a>');
                    } else {
                       echo ('<a href="Login.php"><button type="button" class="btn btn-primary btn-light">Contacter</button></a> ');
                       echo ('<a href="Atelier.php"><button type="button" class="btn btn-dark btn-light">Retour</button>/a>');
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

