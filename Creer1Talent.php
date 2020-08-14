<!doctype html>
<html lang="fr">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173955301-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-173955301-1');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>COUP DE MAIN, COUP DE POUCE</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">COUP DE MAIN, COUP DE POUCE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil<!--<span class="sr-only">(current)</span>--></a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Besoin.php">Besoins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Talent.php">Talents</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="Atelier.php">Ateliers</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="Projet.php">Projets</a>
          </li>                
          <li class="nav-item">
            <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
          </li> 
        </ul>
          
          <form  method="get">
          <?php
            /*require_once 'Fonctions.php';
            
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" id="tout" class="btn btn-secondary btn-sm" name="tout">Tout</button>');
                echo ('<button type="radio" id="pro" class="btn btn-secondary btn-sm" name="pro" value="Pro">Pro</button>');   
                echo ('<button type="radio" id="perso" class="btn btn-secondary btn-sm" name="perso" value="Perso">Perso</button>');               
                echo ('</div>');
            } */
          ?>
          </form>      
                   
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft">   
            <?php
            require_once 'Fonctions.php';
    
            if(isset($_SESSION['email'])){    
                
                $query = "select SUM(b.ReponseB) + SUM(t.ReponseT) as Reponse from besoins b, saisir s, talents t, proposer p where s.CodeB = b.CodeB and t.CodeT = p.CodeT and p.CodeU = {$usercode} and s.CodeU = {$usercode}";
                $result = mysqli_query ($session, $query);
                
                while ($ligne = mysqli_fetch_array($result)) { 
                    if ($ligne["Reponse"] > 0) {
                        echo ('<span class="badge badge-danger">Nouveau message</span>');                           
                    } 
                }    
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    $prenom = "select PrenomU from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $prenom);
                    while ($prenom = mysqli_fetch_array($result)) {      
                        echo $prenom['PrenomU'];       // Afficher le prénom d'un utilisateur
                    }
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
                    if(isset($_SESSION['role'])) {
                        echo ('<a class="dropdown-item" href="Admin.php">Espace admin</a>');
                        echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');                       
                    } else {
                        echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                        echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                        echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');
                    }
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
            <h1> Ajouter un talent </h1>
            <form action="Saisir1Talent.php" method="post">
            <?php
            require_once('Fonctions.php');
            date_default_timezone_set('Europe/Paris');
            echo "Date de création : " . date("d/m/yy"); 
            ?>
            <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                      <select class="custom-select mr-sm-2" name="categorieT" id="inlineFormCustomSelect" required>
                            <option value="" selected>Choisir une catégorie</option>
                             <?php
                             require_once('Fonctions.php');
                             $query = "select DescriptionC, CodeC, NomC from categories where VisibiliteC = 1";
                             $result = mysqli_query ($session, $query);
                             if (mysqli_num_rows($result)>0) {       
                                while ($ligne = mysqli_fetch_array($result)) { 
                                 
                                    echo ('<option value="'.$ligne["CodeC"].'" name="categorie" title="'.$ligne["DescriptionC"].'">'.$ligne["NomC"].'</option>');                                         
                                }     
                             }
                             ?>                     
                      </select>
              
                    </div> <p>(<span style="color:red">*</span>)</p>
            </div>
            <div class="form-group">
              <label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>
              <input type="text" name="titreT" class="form-control col-md-4" id="inputEmail4" required>
            </div>
            <div class="form-group">
                    <label for="inputEmail4">Description du talent(<span style="color:red">*</span>)</label><br/>
                    <textarea rows="4" cols="50" name="descriptionT" placeholder=" Veuillez préciser votre talent" required></textarea>
            </div>
            <div class="form-group">
                    <label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>				
            </div>
                
            <div class="form-group">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="typeT" id="inlineRadio1" required value="Pro">
                <label class="form-check-label" for="inlineRadio1">Pro</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio2" value="Perso">
                <label class="form-check-label" for="inlineRadio2">Perso</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeT" id="inlineRadio3" value="Pro et Perso">
                <label class="form-check-label" for="inlineRadio3">Pro&Perso</label>
              </div>               
            </div>

              <div class="form-group">
              <button type="submit" class="btn btn-dark">Créer</button>
              </div>
            </form>
          </div>
        </div>
        
        <footer>
          <p id="copyright"><em><small>copyright &#9400; COUP DE MAIN, COUP DE POUCE, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
