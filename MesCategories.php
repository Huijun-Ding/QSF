<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Quai des savoir-faire</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  
        <nav class="navbar sticky-top navbar-dark bg-dark">
          <a class="navbar-brand" href="Accueil.php">Quai des savoir-faire</a>

        <div class="dropdown">
          <?php
            require_once('Fonctions.php');
          ?>
          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Login.php">Se connecter</a>
            <a class="dropdown-item" href="Inscription.php">S'inscrire</a>
            <a class="dropdown-item" href="Deconnecter.php">Déconnecter</a>
            <?php
            require_once('Fonctions.php');
            
            if(isset($_SESSION['email'])){
                echo ('<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon espace</a>');
                echo ('<div class="dropdown-menu">');
                echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                echo ('</div>');
            }
            ?>
          </div>
        </div>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item">
	            <a class="nav-link" href="Besoin.php">Besoins</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="Talent.php">Talents</a>
	          </li>
                  <li class="nav-item">
                      <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
	          </li>
	          <!--<li class="nav-item">
	            <a class="nav-link" href="#">Cours et Forum</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Projet Associatif</a>
	          </li
	          <li class="nav-item">
	            <a class="nav-link" href="#">Contacts</a>
	          </li>-->
                  <li class="nav-item">
                      <a class="nav-link" href="ConditionGeneraleUtilisation.php">Mentions Légales</a>
	          </li>
	        </ul>
	      </div>
        </nav>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="jumbotron">
          <div class="container">
            <hr>
            <center><h1>Mes Abonnements</h1></center>
            <hr>
            <form  action="DesabonnerCategories.php" method="post">
            <div class="row">
                <div class="col-10">
                    <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
                    require_once('Fonctions.php');

                    $query = " select c.NomC,c.PhotoC,c.CodeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */  
                      
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('<input class="form-check-input" type="checkbox" id="inlineCheckbox" name="'.$ligne["CodeC"].'" value="'.$ligne["CodeC"].'">');
                        echo ('</div>');
                        echo ('</div>'); 
                    }          
                    } else {
                                echo("<h5> Vous n'avez pas encore abonné des catégories </h5>");
                            } 
                          ?>      
                    </div>
            
                </div>
                <div class="col-2">
                   <button type="submit" class="btn btn-dark">Désabonner</button> 
                </div>
                
            </div>
               </form>
          </div>
              
            

          <div class="container">
            <hr>
            <center><h1> Abonnements Disponibles </h1> </center> <!--Tous les catégories qui restent-->
            <hr>
            <form  action="ReabonnerCategories.php" method="post">	
            <div class="row">
                <div class="col-10">
            
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
                    require_once('Fonctions.php');

                    $query = "select NomC, PhotoC, CodeC from categories c where codeC not in ( select c.codeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = $usercode )";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */  
                      
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('<input class="form-check-input" type="checkbox" id="inlineCheckbox" name="'.$ligne["CodeC"].'" value="'.$ligne["CodeC"].'">');
                        echo ('</div>');
                        echo ('</div>'); 
                    }          
                    } else {
                                echo("<h5> Vous avez abonné toutes les catégories </h5>");
                            } 
                          ?>      
                    </div>
 
                </div>
                <div class="col-2">
            <div>           
                <button type="submit" class="btn btn-dark">Abonner</button>
            </div>
                    </div>
                    </div>
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