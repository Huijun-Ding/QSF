<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>S'abonner à des catégories</title>

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
                <h1 class="text-center">S'abonner à des catégories</h1>

</div>
          <div class="container">
            <form  action="ReabonnerCategories.php" method="post">			  
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
                    require_once('Fonctions.php');

                    $query = "select VisibiliteC, NomC, PhotoC, CodeC, DescriptionC from categories";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */  
                      if ($ligne["VisibiliteC"] == 1){
                           if ($ligne["NomC"] == 'Autres') {
                                echo ('<div class="card" style="width: 12rem;">');
                                echo ('<div class="card-header">');
                                echo ('<center><input class="card-text" type="checkbox" id="inlineCheckbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                                 echo ('<center><h6 title="Si vous voulez proposer une nouvelle catégorie, veuillez remplir le nom et la description de votre proposition, un mail sera envoyé à l\'admin.">Demande d\'une nouvelle catégorie</h6></center>');
                                echo ('<div class="input-group-prepend">');
                                  echo ('<span class="input-group-text" id="basic-addon1">Nom</span>');
                                echo ('</div>');
                                  echo ('<input name="nomcp" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                  echo ('<div class="input-group-prepend">');
                                    echo ('<span class="input-group-text" id="basic-addon1">Description</span>');
                                  echo ('</div>');
                                  echo ('<input name="descriptioncp" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                echo ('</div>');
                                echo ('<div class="card-body text-center">');
                                echo('<h6 class="card-title" title="Si vous voulez proposer une nouvelle catégorie, veuillez remplir le nom et la description de votre proposition, un mail sera envoyé à l\'admin.">'.$ligne["NomC"].' <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/OOjs_UI_icon_info_big_progressive.svg/1200px-OOjs_UI_icon_info_big_progressive.svg.png" width="20" height="20" alt="info-bulle" title="Si vous voulez proposer une nouvelle catégorie, veuillez remplir le nom et la description de votre proposition, un mail sera envoyé à l\'admin."></h6>');
                                echo ('</div>');
                                echo ('</div>');      
                        } else {
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input class="card-text" type="checkbox" id="inlineCheckbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                            echo ('</div>');
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="'.$ligne["NomC"].'" title="'.$ligne["DescriptionC"].'">');    
                            echo ('<div class="card-body text-center">');
                            echo('<h6 class="card-title" title="'.$ligne["DescriptionC"].'">'.$ligne["NomC"].'</h6>');
                            echo ('</div>');
                            echo ('</div>'); 
                        }
                      }
                    }          
                    } 
                    ?>      
                    </div>
            <div>           
                <button type="submit" class="btn btn-dark" title="Tous les 15 jours, vous recevrez un Newsletter à propos des cartes créées dans les catégories que vous vous êtes abonnées. ">S'abonner</button>
            </div>
            </form>
          </div>
        </div>
  
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>
