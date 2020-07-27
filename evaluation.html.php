<!DOCTYPE html>
<html>
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
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
    
<title></title>
<style type="text/css">
/* make the current radio visually hidden */
input[type=radio]{ 
  -webkit-appearance: none;
  margin: 0;
  box-shadow: none; /* remove shadow on invalid submit */
}

/* generated content is now supported on input. supporting older browsers? change button above to {position: absolute; opacity: 0;} and add a label, then style that, and change all selectors to reflect that change */
input[type=radio]::after {
  content: '\2605';
  font-size: 32px;
}

/* by default, if no value is selected, all stars are grey */
input[type=radio]:invalid::after {
  color: #ddd;
}

/* if the rating has focus or is hovered, make all stars darker */
rating:hover input[type=radio]:invalid::after,
rating:focus-within input[type=radio]:invalid::after
{color: #888;}

/* make all the stars after the focused one back to ligh grey, until a value is selected */
rating:hover input[type=radio]:hover ~ input[type=radio]:invalid::after,
rating input[type=radio]:focus ~ input[type=radio]:invalid::after  {color: #ddd;}


/* if a value is selected, make them all selected */
rating input[type=radio]:valid {
  color: orange;
}
/* then make the ones coming after the selected value look inactive */
rating input[type=radio]:checked ~ input[type=radio]:not(:checked)::after{
  color: #ccc;
  content: '\2606'; /* optional. hollow star */
}
</style>
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
      <form method="POST" action="evaluation.fonction.php">
        <h1>Evaluer votre expérience</h1><hr>
        <fieldset>
          <legend>Notation :</legend>
           <rating>
             <input type="radio" name="rating" value="1" aria-label="1 star" required/>
             <input type="radio" name="rating" value="2" aria-label="2 stars"/>
             <input type="radio" name="rating" value="3" aria-label="3 stars"/>
             <input type="radio" name="rating" value="4" aria-label="4 stars"/>
             <input type="radio" name="rating" value="5" aria-label="5 stars"/>
           </rating>
        </fieldset>
          <br>
        <fieldset>
          <legend>Votre avis nous intéresse :</legend>
           <rating>
               <textarea name="avis" placeholder=""></textarea>
                <script>
                    var editor1 = CKEDITOR.replace('avis', {
                        extraAllowedContent: 'div',
                        height: 200
                      });
                </script>
           </rating>
        </fieldset>
          <br><p>Si votre besoin a été résolu, n'oubliez pas d'désactiver votre carte</p>
        <input type="reset" class="btn btn-dark">
        <input type="submit" class="btn btn-dark">
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