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
            <hr>
            <center><h1>Mes Abonnements</h1></center>
            <hr> <input class="card-text" type="checkbox" onclick="ToutDesabonner()" id="parent1" name="selectall" value="">  <strong> <span id="label1">Se désabonner à tout</span></strong>
            <form  action="DesabonnerCategories.php" method="post">
            <div class="row">
                <div class="col-10">
                    <div id="carteb" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
            if(isset($_SESSION['email'])) {
                      
                    $query = " select c.VisibiliteC, c.NomC,c.PhotoC,c.CodeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = {$usercode} ";
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
                                echo ('<div class="input-group-prepend">');
                                  echo ('<span class="input-group-text" id="basic-addon1">Nom</span>');
                                echo ('</div>');
                                  echo ('<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                  echo ('<div class="input-group-prepend">');
                                    echo ('<span class="input-group-text" id="basic-addon1">Description</span>');
                                  echo ('</div>');
                                  echo ('<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                echo ('</div>');
                                echo ('<div class="card-body text-center">');
                                echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                                echo ('</div>');
                                echo ('</div>');      
                        } else {
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input class="card-text" type="checkbox" id="inlineCheckbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                            echo ('</div>');
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                            echo ('<div class="card-body text-center">');
                            echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                            echo ('</div>');
                            echo ('</div>'); 
                        }
                      }                                    
                    }          
                    } else {
                                echo("<h5> Vous n'avez pas encore s'abonné à des catégories </h5>");
                            } 
            } else {
                echo ('<p>Veuillez d\'abord <a href="login.php">se connecter</a></p>');
            }
                  ?>      
                    </div>
                </div>
                <script>
                    function ToutDesabonner() {
                        var parent = document.getElementById("parent1");
                        var label = document.getElementById("label1");
                        var input = document.getElementsByTagName("input");

                        if (parent.checked === true) {
                           for (var i = 0; i < input.length ; i ++) {
                               if (input [i].type == "checkbox" && input[i].id == "Child_Checkbox1" && input[i].checked == false) {
                                   input[i].checked = true ;
                                   label.innerHTML = "Tout désabonnées";
                               }
                           }
                        }
                        else if (parent.checked === false) {
                           for (var i = 0; i < input.length ; i ++) {
                               if (input [i].type == "checkbox" && input[i].id == "Child_Checkbox1" && input[i].checked == true) {
                                   input[i].checked = false ;
                                   label.innerHTML = "Tout désabonner";
                               }
                           }
                        }
                    }
                </script>
                <div class="col-2">
                   <button type="submit" class="btn btn-dark">Se désabonner</button> 
                </div>          
            </div>
            </form>
          </div>             

          <div class="container">
            <hr>
            <center><h1> Abonnements Disponibles </h1> </center>  <!--Tous les catégories qui restent-->
                <hr>  <input class="card-text" type="checkbox" onclick="ToutAbonner()" id="parent" name="selectall" value="">  <strong> <span id="label">S'abonner à tout</span></strong>
           
            
            <form  action="ReabonnerCategories.php" method="post">	
            <div class="row">
                <div class="col-10">
            
                <div id="categories" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
            if(isset($_SESSION['email'])) {
                                  
                    $query = "select VisibiliteC, NomC, PhotoC, CodeC from categories where codeC not in ( select c.codeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = $usercode )";
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
                                echo ('<div class="input-group-prepend">');
                                  echo ('<span class="input-group-text" id="basic-addon1">Nom</span>');
                                echo ('</div>');
                                  echo ('<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                  echo ('<div class="input-group-prepend">');
                                    echo ('<span class="input-group-text" id="basic-addon1">Description</span>');
                                  echo ('</div>');
                                  echo ('<input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">');
                                echo ('</div>');
                                echo ('<div class="card-body text-center">');
                                echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                                echo ('</div>');
                                echo ('</div>');      
                        } else {
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input class="card-text" type="checkbox" id="inlineCheckbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                            echo ('</div>');
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                            echo ('<div class="card-body text-center">');
                            echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                            echo ('</div>');
                            echo ('</div>'); 
                        }
                      }                          
                    }          
                    } else {
                                echo("<h5> Vous avez abonné toutes les catégories </h5>");
                            } 
            } else {
                echo ('    ');
            }                            
                          ?>      
                    </div>
                </div>
                <script>
                    function ToutAbonner() {
                        var parent = document.getElementById("parent");
                        var label = document.getElementById("label");
                        var input = document.getElementsByTagName("input");

                        if (parent.checked === true) {
                           for (var i = 0; i < input.length ; i ++) {
                               if (input [i].type == "checkbox" && input[i].id == "Child_Checkbox" && input[i].checked == false) {
                                   input[i].checked = true ;
                                   label.innerHTML = "Tout abonnées";
                               }
                           }
                        }
                        else if (parent.checked === false) {
                           for (var i = 0; i < input.length ; i ++) {
                               if (input [i].type == "checkbox" && input[i].id == "Child_Checkbox" && input[i].checked == true) {
                                   input[i].checked = false ;
                                   label.innerHTML = "Tout abonner";
                               }
                           }
                        }
                    }
                </script>
                <div class="col-2">
            <div>           
                <button type="submit" class="btn btn-dark">S'abonner</button>
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