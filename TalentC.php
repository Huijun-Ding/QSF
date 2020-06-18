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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Accueil.php">Quai des savoir-faire</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Accueil.php">Accueil<span class="sr-only">(current)</span></a>
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
          
          <form action="TalentC.php" method="post">
          <?php
            require_once 'Fonctions.php';
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group btn-group-toggle" data-toggle="buttons">');
                echo ('<label class="btn btn-sm active">');
                echo ('<button type="radio" class="list-group-item list-group-item-action" name="typepartout" value="">Pro et Perso</button>');
                echo ('</label>');
                echo ('<label class="btn btn-sm">');
                echo ('<button type="radio" class="list-group-item list-group-item-action" name="typeV" value="Pro">Pro</button>');
                echo ('</label>');
                echo ('<label class="btn btn-sm">');
                echo ('<button type="radio" class="list-group-item list-group-item-action" name="typeV" value="Perso">Perso</button>');
                echo ('</label>');
                echo ('</div>');
            } 
          ?>
         </form>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">   
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
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1>LES TALENTS PAR CATEGORIE </h1>
              <?php is_login_new_talent(); ?>
            </div>
            <hr>
            
            <div class="row">
                <div class="col-2">
                <form action="TalentC.php" method="post">
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="1">Sport</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="2">Animation</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="3">Outil métiers</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="4">Développement personnel</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="5">Associatif</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="6">Covoiturage</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="7">Bureautique</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="8">Informatique</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="9">Loisir</button>
              <button type="radio" class="list-group-item list-group-item-action" name="categorie" value="10">Autres</button>           
            </form>  
                </div> 
            <div class="col-10">
              <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
              <?php
              require_once('Fonctions.php');
                
              if (isset($_POST['categorie'])) {
               
                
                   if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                        $query = " select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$_POST['categorie']} and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                    } elseif (isset($_POST['typeV'])) {
                         $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$_POST['categorie']} and (t.TypeT = '{$_POST['typeV']}' OR b.TypeT ='Pro et Perso') order by CodeT DESC";
                    } else {
                         $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.CodeC = {$_POST['categorie']} order by CodeT DESC";
                    }
               
                
                $result = mysqli_query ($session, $query);

                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher les talents par catégorie*/
                   if ($ligne["VisibiliteT"] == 1) {
                    echo ('<div class="card" style="width: 12rem;">');
                    echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                    echo ('<div class="card-body card text-center">');
                    echo ('<h5 class="card-title">'.$ligne["TitreT"].'</h5>');
                    echo ('<a href="TalentX.php?t='.$ligne["CodeT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                    echo ('</div>');  
                    echo ('</div>');      
                    }
                } 
              }
              ?>             
              </div>
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