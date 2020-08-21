<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Admin Talent X</title>

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
                <h1 class="text-center">Admin Talent X</h1>

</div>
          <div class="container">
               <?php
                require_once('Fonctions.php');
                $T = $_GET['t'];
                $query = "select t.CodeT, t.TypeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.DatePublicationT, t.DescriptionT from talents t, categories c where t.CodeC = c.CodeC and t.CodeT = '$T' ";
                $result = mysqli_query ($session, $query);

                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détaille de chaque talent */
                    
                    echo ('<h1>'.$ligne["TitreT"]. '</h1><br>');
                    echo ('<p> Date Publication: '.date("d-m-yy", strtotime($ligne["DatePublicationT"])).'</p>');
                    echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." height="200" style="width: 20rem;"</p>');
                    echo ('<p><strong>Type: </strong>'.$ligne["TypeT"].'</p>');                    
                    echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionT"].'</p>');  
 
                }  
                ?>            
            </div>
        </div>
        
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>

