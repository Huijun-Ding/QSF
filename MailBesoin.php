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
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  </head>
  <body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Accueil.php">Quai des savoir-faire</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Accueil.php">Accueil</a>
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
                echo ('<button type="radio" class="btn btn-info">Pro et Perso</button>');
                echo ('<button type="radio" class="btn btn-success" name="typeV" value="Pro">Pro</button>');
                echo ('<button type="radio" class="btn btn-warning" name="typeV" value="Perso">Perso</button>');
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
              <h1>Rédiger votre e-mail</h1>      
              <hr>
              <form action="" method="POST">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>De</strong></label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php require_once('Fonctions.php'); echo $_SESSION['email']; ?>" disabled >
                  </div>
                </div>
                 
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sujet</strong></label>
                    <div class="col-sm-10">
                        <?php 
                        //requête prendre titre de besoin
                         $query1 = "select TitreB from besoins where CodeB = {$_GET['c']} ";
                         $result = mysqli_query ($session, $query1);
                         
                         if (mysqli_num_rows($result)>0) {       
                              while ($besoin = mysqli_fetch_array($result)) {         
                                  echo ('<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="[Quai des savoir-faire] Répondre à votre besoin « '.$besoin["TitreB"].' »" disabled >');                         
                    echo('</div>');
                 echo('</div>');

                 echo('<div class="form-group">');
                    echo('<label for="inputEmail4"><strong>Contenu du message</strong></label>');
          
                    echo('<textarea name="contenu">');
                        echo 'Bonjour,';
                        echo '                                                                                                                                                       ';
                        echo 'Je vous contacte pour répondre à votre besoin « '.$besoin["TitreB"].' ».';  
                    echo('</textarea>');     
                
                        }
                         }
                    ?>

                <script>
                        CKEDITOR.replace( 'contenu' );
                </script>
                
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>

                <?php 
                        //requête prendre l'email destinataire
                        $query2 = "select u.Email from utilisateurs u, saisir s, besoins b where u.CodeU = s.CodeU and s.CodeB = b.CodeB and b.CodeB = {$_GET['c']}";
                        $result = mysqli_query ($session, $query2);
                
                //if (mysqli_num_rows($result)>0) {       
                    //while ($mail = mysqli_fetch_array($result)) {
                        //$destinataire = $mail["Email"]; // adresse mail du destinataire
                        //$sujet = "Réponse à votre besoin"; // sujet du mail
                        //$message = $_POST['contenu']; // message qui dira que le destinataire a bien lu votre mail
                        // maintenant, l'en-tête du mail
                        //$header = "From: [Quai des savoir-faire]\r\n"; 
                        //$headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
                        //$header .= "Disposition-Notification-To:l'email d'un administrateur"; // c'est ici que l'on ajoute la directive
                        //mail ($destinataire, $sujet, $message, $header); // on envois le mail 
                    //}
                //}
                ?>
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