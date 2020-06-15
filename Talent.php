<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
​
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​	<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Quai des savoir-faire</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
        <?php require 'BarreNav.php';?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
			
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES TALENTS </h1>
              <a href="Creer1Talent.php"><button type="button" class="btn btn-light">Je veux proposer un nouveau talent</button></a>
            </div>
            <hr>
            
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <a href="TalentC.php"><div class="alert alert-light" role="alert">Filtrer les talents par catégorie</div></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div> 
            
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php
		    require_once('Fonctions.php');
            	    $query = "select t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";
                    
                    if(isset($_SESSION['email'])) {
                        $query = "select t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.TypeT = '{$_SESSION['type']}' order by t.CodeT DESC";
                    }
                        
                    if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
                            $mot = htmlspecialchars($_GET['mot']);
                            $query = "select t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.TitreT LIKE '%$mot%' order by t.CodeT DESC";
                    }

                    $result = mysqli_query ($session, $query);   /*Si le mot clé existe, il va exécute la deuxième requête, sinon la première*/

                    if (mysqli_num_rows($result)>0) {
                        while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les talents par l'ordre chronologique en format carte */
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                        echo ('<div class="card-body card text-center">');
                        echo ('<h5 class="card-title">'.$ligne["TitreT"].'</h5>');
                        echo ('<a href="TalentX.php?t='.$ligne["TitreT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                        echo ('</div>');  
                        echo ('</div>');             
                        }
                     } else {
                        echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
                     }                                         
            ?>
            </div>
          </div>
        </div>

        <footer>
          <p id="copyright"><em><small>copyright &#9400; Quai des savoir-faire, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>