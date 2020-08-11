<!doctype html>
<html lang="fr">
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
       <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Quai des savoir-faire</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Besoin.php">Besoins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Talent.php">Talents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
          </li>  
          <li class="nav-item">
              <a class="nav-link" href="Atelier.php">Ateliers</a>
          </li> 
        </ul>
          
          <?php
            require_once 'Fonctions.php';
            if (empty($_SESSION['email'])){
                echo ('<div class="switch-field">');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro et Perso" checked/>');
                echo ('<label for="radio-three">Pro et Perso</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro" />');
                echo ('<label for="radio-four">Pro</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Perso" />');
                echo ('<label for="radio-five">Perso</label>');
                echo ('</div>');
            } 
          ?>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft">   
            <?php
            require_once 'Fonctions.php';
            
            if(isset($_SESSION['email'])){
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</a>');
            } else {
                echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur";                   //Utilisateur qui n'a pas conncté
                echo('</a>');
            } 
            ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if(isset($_SESSION['email'])){
                    echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                    echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                    echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');
                ?>
                    <script>
                        function Deconnexion() {
                            alert("Déconnexion réussite !");
                            }
                    </script>
                <?php
                } else {
                    echo ('<a class="dropdown-item" href="Login.php">Se connecter</a>');
                    echo ('<a class="dropdown-item" href="Inscription.php">S\'inscrire</a>');
                }
                ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
      
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
              <h1>Modifiez votre atelier</h1>      
              <hr>
              <form action="Modifier1Atelier.php" method="POST">
               <?php
                require_once('Fonctions.php');
                date_default_timezone_set('Europe/Paris');
                echo "Date de modification :   " . date("d/m/yy"); 
               ?>         
               <?php
                $T = $_GET['t'];
                $query = "select c.NomC, a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.CodeA = $T ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if ($ligne["VisibiliteA"] == 1) {   
                        
                            echo('<div class="form-row align-items-center">');
                            echo('<div class="col-auto my-1">');
                            echo('<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>');
                            echo('<select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect" required>');
                            echo('<option name="categorie" value="'.$ligne["CodeC"].'" selected>'.$ligne["NomC"].'</option>');
                             $query2 = "select CodeC, NomC, DescriptionC from categories where VisibiliteC = 1";
                             $result = mysqli_query ($session, $query2);
                             if (mysqli_num_rows($result)>0) {       
                                while ($c = mysqli_fetch_array($result)) {                                  
                                    echo ('<option value="'.$c["CodeC"].'" name="categorie" title="'.$c["DescriptionC"].'">'.$c["NomC"].'</option>');                                         
                                }     
                             }                         
                            echo('</select>');
                            echo('</div>');
                            echo('</div>');
                        
                   
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="titre" class="form-control col-md-4" id="inputEmail4" maxlength="20" value="'.$ligne["TitreA"].'" required>');
                        echo ('</div>');
                        
                         echo('<div class="form-group">');
                        echo('<label for="inputEmail4">Date & Créneau horaire (<span style="color:red">*</span>)</label>');
                        echo('<input type="text" name="date" value="'.$ligne["DateA"].'" class="form-control col-md-4" id="inputEmail4" maxlength="100" required>');
                        echo('</div>');
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">Description(<span style="color:red">*</span>)</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="description" required>'.$ligne["DescriptionA"].'</textarea>') ;
                        echo('</div>') ;
                        
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Lieu d\'atelier(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="lieu" class="form-control col-md-4" id="inputEmail4" maxlength="50" value="'.$ligne["LieuA"].'" required>');
                        echo ('</div>');
                        
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Nombre de personnes maximum(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="nb" class="form-control col-md-4" id="inputEmail4" maxlength="50" value="'.$ligne["NombreA"].'" required>');
                        echo ('</div>');
                        
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">URL de l\'inscription(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="url" class="form-control col-md-4" id="inputEmail4" maxlength="100" value="'.$ligne["URL"].'" required>');
                        echo ('</div>');
                        
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">En savoir plus</label>');
                        echo ('<input type="text" name="plus" class="form-control col-md-4" id="inputEmail4" maxlength="100" value="'.$ligne["PlusA"].'">');
                        echo ('</div>');
                       
                        
                        if ($ligne["TypeA"] == "Pro") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de besoin(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" checked type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
                        
                         if ($ligne["TypeA"] == "Perso") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de besoin(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input"  checked type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
 
                        
                        if ($ligne["TypeA"] == "Pro et Perso") {
                          echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de besoin(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" checked name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                           }
           
                     echo('<hr>');
            echo('<div class="form-group">');
                echo('<button name="codeA" type="submit" value="'.$ligne["CodeA"].'" class="btn btn-dark btn-lg">MODIFIER </button>');
           echo('</div>');
                              }
                }
                 ?> 
              </form>

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