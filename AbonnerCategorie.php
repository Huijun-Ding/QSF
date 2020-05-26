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
        <nav class="navbar sticky-top navbar-dark bg-dark">
          <a class="navbar-brand" href="Accueil.php">Quai des savoir-faire</a>

        <div class="dropdown">
          <?php
            require_once('Fonctions.php');
          ?>
             
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Login.php">Se connecter</a>
            <a class="dropdown-item" href="Inscription.php">S'inscrire</a>
          <!--  <a class="dropdown-item" href="#">Mes demandes</a>
            <a class="dropdown-item" href="#">Mes offres</a>  -->
            <a class="dropdown-item" href="Deconnecter.php">Déconnecter</a>
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
			
            <h1> ABONNER DES CATEGORIES </h1>
            <hr>
 
            <form  action="SaisirCategorie.php" method="post">			  
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="inlineCheckbox1" value="1">
              <label class="form-check-label" for="inlineCheckbox1">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 1 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Sport : Football, Course à pied, Baseketball...</p>
                  </div>
                </div>
              </label>
            </div>                                                      

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="inlineCheckbox2" value="2">
              <label class="form-check-label" for="inlineCheckbox2">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 2 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Animation</p>
                  </div>
                </div>
              </label>
            </div>                              

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="inlineCheckbox3" value="3">
              <label class="form-check-label" for="inlineCheckbox3">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 3 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Outils métiers</p>
                  </div>
                </div>
              </label>
            </div>                               

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="inlineCheckbox4" value="4">
              <label class="form-check-label" for="inlineCheckbox4">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 4 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Développement personnel</p>
                  </div>
                </div>
              </label>
            </div> 

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="inlineCheckbox5" value="5">
              <label class="form-check-label" for="inlineCheckbox5">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 5 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Associatif</p>
                  </div>
                </div>
              </label>
            </div>                             

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="inlineCheckbox6" value="6">
              <label class="form-check-label" for="inlineCheckbox6">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 6 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Covoiturage</p>
                  </div>
                </div>
              </label>
            </div>                                    

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option1" name="7">
              <label class="form-check-label" for="inlineCheckbox7">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 7 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Bureautique</p>
                  </div>
                </div>
              </label>
            </div>  

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox8" name="inlineCheckbox8" value="8">
              <label class="form-check-label" for="inlineCheckbox8">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 8 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Informatique</p>
                  </div>
                </div>
              </label>
            </div>    

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox9" name="inlineCheckbox9" value="9">
              <label class="form-check-label" for="inlineCheckbox9">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 9 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Loisir</p>
                  </div>
                </div>
              </label>
            </div>   

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox10" name="inlineCheckbox10" value="10">
              <label class="form-check-label" for="inlineCheckbox10">
                <div class="card" style="width: 11rem;">
                    <?php
                    require_once('Fonctions.php');

                    $query = " select PhotoC from categories where CodeC = 10 ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher l'image de chaque categorie */
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');                        
                    }                
                    ?>
                  <div class="card-body">
                    <p class="card-text">Autres (notifier à l'administrateur)</p>
                  </div>
                </div>
              </label>
            </div><hr>   
                
            <div>           
                <button type="submit" class="btn btn-dark">Abonner</button>
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

