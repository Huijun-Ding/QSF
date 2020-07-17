<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
​
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Plateforme</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Accueil.php">Plateforme</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span> </a> 
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
        </ul>

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
                            
                         $('.navbar-nav mr-auto').find('a').each(function () {
                            if (this.href == document.location.href || document.location.href.search(this.href) >= 0) {
                                $(this).parent().addClass('active'); // this.className = 'active';
                            }
                        });
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
               <h1>Admin</h1>
                <button class="tablink" onclick="openPage('Catégories', this, 'orange')" id="defaultOpen">Catégories</button>
                <button class="tablink" onclick="openPage('Cartes', this, 'orange')" >Cartes</button>
                <button class="tablink" onclick="openPage('Utilisateurs', this, 'orange')">Utilisateurs</button>
                <button class="tablink" onclick="openPage('Stats', this, 'orange')">Stats</button>
                <button class="tablink" onclick="openPage('Bandeau', this, 'orange')">Bandeau</button>
                <button class="tablink" onclick="openPage('Paramètres', this, 'orange')">Paramètres</button>

                <div id="Catégories" class="tabcontent">
                  <h3>Catégories</h3>
                  <p>Gérer les catégories (ajouter : la page catégories, autres, envoyer un mail aux admins, modifier, désactiver, modifier l’image associée)</p>
                  <button type="button" class="btn btn-primary"> ⊕ Créer</button> <br><br>       
                   <?php
                    require_once('Fonctions.php');

                    $query = "select CodeC, NomC, DescriptionC, PhotoC from categories";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">PhotoC</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeC"].'</th>');
                            echo ('<td>'.$ligne["NomC"].'</td>');
                            echo ('<td>'.$ligne["DescriptionC"].'</td>');                       
                            echo ('<td><img src="'.$ligne["PhotoC"].'" alt="PhotoC" width="100" height="90"></td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://png.pngtree.com/png-vector/20190927/ourlarge/pngtree-pencil-icon-png-image_1753753.jpg" alt="Modifier" width="30" height="30"></button>');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Supprimer" width="30" height="30"></button>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>                        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Cartes" class="tabcontent">
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Cartes</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                      <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Titre/Description" aria-label="Recherche">
                      <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                  <p>Supprimer les contenus des cartes inappropriés avec un mail d’info à celui qui l’a posté. Moteur de recherche dans le titre & description. Affichage du plus récent au plus ancien</p>
                  <?php
                    require_once('Fonctions.php');

                    $query = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 1 order by CodeB DESC";

                    if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
                        $mot = htmlspecialchars($_GET['mot']);
                        //$query = "select CodeB, TitreB, DescriptionB from besoins where  VisibiliteB = 1 and ( b.TitreB LIKE '%$mot%' or b.DescriptionB LIKE '%$mot%' ) order by b.CodeB DESC";
                    }
                    
                    
                    
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeB"].'</th>');
                            echo ('<td>'.$ligne["TitreB"].'</td>');
                            echo ('<td>'.$ligne["DescriptionB"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button>');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Utilisateurs" class="tabcontent">
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Utilisateurs</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                        <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Nom/Prénom/Email" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                  <p>Accéder au profil d’utilisateur. Bloquer un compte avec un mail de prévenance (modal : êtes-vous sûr ? comme ne pouvoir pas réactiver un compte). Moteur de recherche dans nom, prénom, email</p>
                   <?php
                    require_once('Fonctions.php');

                    $query = "select CodeU, NomU, PrenomU, Email from utilisateurs where NomU <> 'XXXXX'";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Prénom</th>');
                            echo ('<th scope="col">Email</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeU"].'</th>');
                            echo ('<td>'.$ligne["NomU"].'</td>');
                            echo ('<td>'.$ligne["PrenomU"].'</td>');
                            echo ('<td>'.$ligne["Email"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button>');
                             echo ('<button type="button" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Stats" class="tabcontent">
                  <h3>Stats</h3>
                  <p>Affichage des chiffres statistiques (le nombre de mise en relation, note(étoiles) et commentaire : lier aux cartes correspondantes)</p>
                </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------->                  
                <div id="Bandeau" class="tabcontent">
                  <h3>Bandeau</h3>
                  <p>Remplacer Jumbotron par Carrousel avec des annonces d’administrateur (1ère page : Bienvenu). Zone de modification des texts et des photos dans la page d’accueil (Carousel) sans faire du code</p>
                  
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img class="d-block w-100" src="../img/Carrousel_1.png" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Page bienvenu</h5>
                            <p>Bienvenu à la PF</p>
                          </div>                          
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="https://st4.depositphotos.com/17075580/24554/v/600/depositphotos_245544496-stock-video-pink-comment-icon-black-background.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Page commentaires</h5>
                            <p>Voici des commentaires pour notre PF</p>
                          </div>  
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.vhm.fr/themes/custom/vhmgroupe/public/images/actualites.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Page info</h5>
                            <p>Voilà quelques infos</p>
                          </div>  
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>     
                </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------->                  
                <div id="Paramètres" class="tabcontent">
                  <h3>Paramètres</h3>
                  <p>Paramètre délais d’évaluation</p>
                  <h5>Délai pour envoyer l'email d'évaluation : <input type='text' placeholder="15"  > jours </h5>
                </div>
           
                <style>
                /* Set height of body and the document to 100% to enable "full page tabs" */
                body, html {
                  height: 100%;
                  margin: 0;
                  font-family: Arial;
                }

                /* Style tab links */
                .tablink {
                  background-color: #555;
                  color: white;
                  float: left;
                  border: none;
                  outline: none;
                  cursor: pointer;
                  padding: 14px 16px;
                  font-size: 17px;
                  width: 15%;
                }

                .tablink:hover {
                  background-color: #777;
                }

                /* Style the tab content (and add height:100% for full page content) */
                .tabcontent {
                  color: black;
                  display: none;
                  padding: 100px 20px;
                  height: 100%;
                }

                </style>
                
                <script>
                function openPage(pageName, elmnt, color) {
                // Hide all elements with class="tabcontent" by default */
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }

                // Remove the background color of all tablinks/buttons
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].style.backgroundColor = "";
                }

                // Show the specific tab content
                document.getElementById(pageName).style.display = "block";

                // Add the specific color to the button used to open the tab content
                elmnt.style.backgroundColor = color;
              }

              // Get the element with id="defaultOpen" and click on it
              document.getElementById("defaultOpen").click();
            </script>
           
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
