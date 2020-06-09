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
            // require_once('Fonctions.php');
            
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
           
            <h1>Mes informations personnelles</h1>
            <hr>
            <div class="row">
                <div class="col-8">   
                    <?php
                    require_once('Fonctions.php');

                    $query = " select NomU, PrenomU, Email from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($info = mysqli_fetch_array($result)) {                     
                        echo ('<p>Nom : '.$info["NomU"].'</p>');          
                        echo ('<p>Prénom : '.$info["PrenomU"].'</p>');  
                        echo ('<p>Adresse mail : '.$info["Email"].'</p>');  
                    }   
                    ?>
                </div>
                <div class="col-4">
                    <form name="Supprimer" action="Supprimer1Compte.php" method="post">
                    <?php

                    /*
                    $query = " select NomU, PrenomU, Email from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($info = mysqli_fetch_array($result)) {                     
                        echo ('<p>Nom : '.$info["NomU"].'</p>');          
                        echo ('<p>Prénom : '.$info["PrenomU"].'</p>');  
                        echo ('<p>Adresse mail : '.$info["Email"].'</p>');  
                    }   
                   */
                    
                    echo('<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#supprimer">Supprimer mon compte</button>');
                    
                    echo('<div class="modal" tabindex="-1" id="supprimer" role="dialog">');
                        echo('<div class="modal-dialog" role="document">');
                          echo('<div class="modal-content">');
                            echo('<div class="modal-header">');
                              echo('<h5 class="modal-title">Vérification</h5>');
                              echo('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');
                                echo('<span aria-hidden="true">&times;</span>');
                              echo('</button>');
                            echo('</div>');
                            echo('<div class="modal-body">');
                              echo('<p>Êtes-Vous sûr de supprimer votre compte ? </p>');
                            echo('</div>');
                            echo('<div class="modal-footer">');
                              echo('<button type="submit" class="btn btn-primary">Supprimer</button>');
                              echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>');
                            echo('</div>');
                          echo('</div>');
                        echo('</div>');
                      echo('</div>');                
                    ?>         
                    </form>
                </div>
            </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->           
           
            <h1> Mes besoins </h1>
            <hr>
         <ul class="list-inline">
                <form method="POST" action="Desactiver1CarteB.php">
            <?php
            require_once('Fonctions.php');

            $query = " select b.CodeB, b.TitreB, b.DescriptionB, b.DatePublicationB, b.DateButoireB, c.PhotoC from categories c, besoins b, saisir s where s.CodeB = b.CodeB and c.CodeC = b.CodeC and s.CodeU = {$usercode} ";
            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
        
            
            if (mysqli_num_rows($result)>0) {
                    while ($besoin = mysqli_fetch_array($result)) {                     
                    echo ('<li class="list-inline-item"><div class="card" style="width: 12rem;">');
                    echo ('<img src="'.$besoin["PhotoC"].'" class="card-img-top" alt="...">');   
                    echo ('<div class="card-body card text-center">');
                    echo ('<h5 class="card-title">'.$besoin["TitreB"].'</h5>');
                    echo ('<p class="card-text">Date de publication: '.$besoin["DatePublicationB"].'</p>');
                    echo ('<p class="card-text">Délais souhaité: '.$besoin["DateButoireB"].'</p>');
                    echo ('<input type="checkbox" name="codeB" checked value="'.$besoin["CodeB"].'"/>');
     

                    
                    /* Button trigger modal */
                    echo ('<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">Désactiver la carte</button>');
                    /* Modal */
                    echo ('<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');  
                      echo ('<div class="modal-dialog">');  
                        echo ('<div class="modal-content">');  
                          echo ('<div class="modal-header">');  
                            echo ('<h5 class="modal-title" id="exampleModalLabel">Vérification</h5>');  
                            echo ('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');  
                              echo ('<span aria-hidden="true">&times;</span>');  
                            echo ('</button>');  
                          echo ('</div>');  
                          echo ('<div class="modal-body">');  
                            echo ('<p>Êtes-Vous sûr de supprimer cette carte ?</p>');  
                          echo ('</div>');  
                          echo ('<div class="modal-footer">');  
                            echo ('<button type="submit" class="btn btn-primary">Supprimer</button>');  
                          echo ('</div>');  
                        echo ('</div>');  
                      echo ('</div>');  
                    echo ('</div>');  
                   

                    echo ('</div>');  
                    echo ('</div></li>');                
                } 
            } else {
                    echo ("Vous n'avez pas encore saisi un besoin");
                    echo('<br><br>');
                    echo ('<a href="Creer1Besoin.php"><button type="button" class="btn btn-light">Je veux saisir un nouveau besoin</button></a>');
            }             
  
            ?>
                </form>
            </ul>
           
<!--------------------------------------------------------------------------------------------------------------------------------------------->           
            <h1> Mes talents </h1>
            <hr>
            <ul class="list-inline">
                <form method="POST" action="Desactiver1CarteT.php">
            <?php
            require_once('Fonctions.php');

            $query = " select t.CodeT, t.TitreT, t.DatePublicationT, c.PhotoC from categories c, talents t, proposer p where p.CodeT = t.CodeT and c.CodeC = t.CodeC and p.CodeU = {$usercode} ";
            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
             
            
            if (mysqli_num_rows($result)>0) {
                    while ($talent = mysqli_fetch_array($result)) {                     
                    echo ('<li class="list-inline-item"><div class="card" style="width: 12rem;">');
                    echo ('<img src="'.$talent["PhotoC"].'" class="card-img-top" alt="...">');   
                    echo ('<div class="card-body card text-center">');
                    echo ('<h5 class="card-title">'.$talent["TitreT"].'</h5>');
                    echo ('<p class="card-text">Date de publication: '.$talent["DatePublicationT"].'</p>');
                    echo ('<input type="checkbox" name="codeT" checked value="'.$talent["CodeT"].'"/>');

                   
                    /* Button trigger modal */
                    echo ('<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#carteT">Désactiver la carte</button>');
                    /* Modal */
                    echo ('<div class="modal fade" id="carteT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">');  
                      echo ('<div class="modal-dialog">');  
                        echo ('<div class="modal-content">');  
                          echo ('<div class="modal-header">');  
                            echo ('<h5 class="modal-title" id="LabelT">Vérification</h5>');  
                            echo ('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');  
                              echo ('<span aria-hidden="true">&times;</span>');  
                            echo ('</button>');  
                          echo ('</div>');  
                          echo ('<div class="modal-body">');  
                            echo ('<p> Êtes-Vous sûr de supprimer cette carte ? </p>');  
                          echo ('</div>');  
                          echo ('<div class="modal-footer">');  
                            echo ('<button type="submit" class="btn btn-primary">Supprimer</button>');  
                          echo ('</div>');  
                        echo ('</div>');  
                      echo ('</div>');  
                    echo ('</div>');  
                   

                    echo ('</div>');  
                    echo ('</div></li>');                
                } 
            } else {
                    echo ("Vous n'avez pas encore saisi un talent");
                    echo('<br><br>');
                    echo ('<a href="Creer1Talent.php"><button type="button" class="btn btn-light">Je veux proposer un nouveau talent</button></a>');
            }             
  
            ?>
                    </form>
            </ul>
          </div>
        </div>
  <hr> 
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