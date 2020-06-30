<!doctype html>
<html lang="en">
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
          
          <form  method="get">
          <?php
            require_once 'Fonctions.php';
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" class="btn btn-secondary btn-sm">Pro et Perso</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Pro">Pro</button>');
                echo ('<button type="radio" class="btn btn-secondary btn-sm" name="typeV" value="Perso">Perso</button>');
                echo ('</div>');
            }  
          ?>
          </form>

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
			
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES BESOINS </h1>         
              <?php is_login_new_besoin(); ?>
            </div>
            <hr>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                三 Filtre
                </button>
                
            <form action="Besoin.php" method="post">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter les besoins</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <h3> Par catégorie </h3>
                      
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="1"><strong>Sport</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="2"><strong>Animation</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="3"><strong>Outil métiers</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="4"><strong>Développement personnel</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="5"><strong>Associatif</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="6"><strong>Covoiturage</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="7"><strong>Bureautique</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="8"><strong>Informatique</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="9"><strong>Loisir</strong></label>
                            <label class="radio-inline"><input type="checkbox" name="categorie[]" value="10"><strong>Autres</strong></label>
                        
                        <?php     
                        if (empty($_SESSION['email'])) {
                            echo ('<h3> Par type </h3><p>(Ne pas choisir si vous voulez tous affiché)</p>');
                            echo ('<label class="radio-inline"><input type="radio" name="type" value="Pro"><em><strong>Pro</strong></em></label>');
                            echo ('<label class="radio-inline"><input type="radio" name="type" value="Perso"><em><strong>Perso</strong></em></label>');
                        }
                           
                      ?>
                      </div>
                        
                      <div class="modal-footer">
                        <button type="reset" value="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                                
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" name="mot" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
            
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                
       
            <?php
                require_once('Fonctions.php');
                

                if (isset($_POST['categorie'])) {
                    $st = "(";
                    foreach ($_POST["categorie"] as $categories) {                        
                        $st = $st.$categories;
                        $st = $st.",";
                    }
                    $st = rtrim($st, ',');
                    $st = $st.")";
                }
                
                if(isset($_SESSION['email'])) {
                    if(isset($_POST['categorie'])) {
                        $query = "select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') and b.CodeC in $st order by CodeB DESC";
                    } else {
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                    }
                } else {
                    if (isset($_POST['type']) && isset($_POST['categorie'])) { // V-si un visiteur choisit les deux filtres
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_POST['type']}' OR b.TypeB ='Pro et Perso') and b.CodeC in $st order by CodeB DESC";
                    } elseif (isset($_POST['type'])) {  // V-si un visiteur choisit filtre type
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_POST['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                    } elseif (isset($_POST['categorie'])) { // V-si un visiteur choisit filtre categorie
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.CodeC in $st order by CodeB DESC";
                    }  else {  // V-si un visiteur rien choisit 
                        $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
                    }
                }
                        
                if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
                    $mot = htmlspecialchars($_GET['mot']);
                    if(isset($_SESSION['email'])) {
                        $query = "select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.TitreB LIKE '%$mot%' and b.TypeB = '{$_SESSION['type']}' order by b.CodeB DESC";
                    } else {
                       $query = "select b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and b.TitreB LIKE '%$mot%' order by b.CodeB DESC";
                    }
                }

                $result = mysqli_query ($session, $query);

                if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                         if ($ligne["VisibiliteB"] == 1) {   
                            if ($ligne["TypeB"] == 'Pro et Perso') {
                                echo ('<div><h5><span class="badge badge-info">'.$ligne["TypeB"].'</span></h5>');
                            } elseif ($ligne["TypeB"] == 'Pro') {
                                echo ('<div><h5><span class="badge badge-success">'.$ligne["TypeB"].'</span></h5>');
                            } elseif ($ligne["TypeB"] == 'Perso') {
                                echo ('<div><h5><span class="badge badge-warning">'.$ligne["TypeB"].'</span></h5>');
                            }                                     
                            echo ('<div class="card" style="width: 12rem;">');                                 
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$ligne["TitreB"].'</h5>');
                            echo ('<p class="card-text">Délais souhaité: '.$ligne["DateButoireB"].'</p>');
                            echo ('<a href="BesoinX.php?t='.$ligne["CodeB"].'" class="btn btn-outline-dark">Voir la demande</a>'); 
                            echo ('</div>');  
                            echo ('</div></div>');   
                            } 
                    }
                    } else {
                        echo('<h5> Aucun résultat</h5>');
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