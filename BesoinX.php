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
          
            <?php
            require_once('Fonctions.php');
            
            if(isset($_SESSION['email'])){
                echo ('<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon espace</a>');
                echo ('<div class="dropdown-menu">');
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
                <div class="row">
                    <div class="col-8">

               <?php
                require_once('Fonctions.php');
                $T = $_GET['t'];
                $query = "select  b.VisibiliteB, b.TitreB, c.PhotoC, b.DatePublicationB, b.DescriptionB, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC and b.TitreB = '$T' ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if (strtotime($ligne["DateButoireB"]) >= strtotime(date("yy/m/d")) && $ligne["VisibiliteB"] == 1) {   
                        echo ('<h1>'.$ligne["TitreB"]. '</h1>');
                        echo ('<h3> Date Butoire: '.$ligne["DateButoireB"].'</h3>');
                        echo ('<p> Date Publication: '.$ligne["DatePublicationB"].'</p>');
                        echo ('<p><img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="..." height="200" style="width: 20rem;"</p>');
                        echo ('<p><strong>Description</strong></p><p>'.$ligne["DescriptionB"].'</p>');   
                    
                    echo ('<hr>');
                    if(isset($_SESSION['email'])){
                       echo ('<a href="MailBesoin.php?t='.$ligne["TitreB"].'"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    } else {
                       echo ('<a href="Login.php"><button type="button" class="btn btn-dark btn-lg">Contacter</button></a>');
                    }   
                }
                }
                 ?>
                    </div>    
                    <div class="col-4">
                        <h3><a href="Besoin.php" class="badge badge-dark">Tous les besoins</a></h3>
                    </div>
                     
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

