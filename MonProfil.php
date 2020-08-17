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
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>COUP DE MAIN, COUP DE POUCE</title>
    <style>
        .navbar-nav li:hover>.dropdown-menu {
            display: block;
        }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<link rel="stylesheet" type="text/css" href="evaluation.css">-->
    <script src="jquery.js"></script>
    <!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">COUP DE MAIN, COUP DE POUCE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a> 
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
                
                $query = "select SUM(b.ReponseB) + SUM(t.ReponseT) as Reponse from besoins b, saisir s, talents t, proposer p where s.CodeB = b.CodeB and t.CodeT = p.CodeT and p.CodeU = {$usercode} and s.CodeU = {$usercode} and b.VisibiliteB = 1 and t.VisibiliteT = 1";
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
                        $req = "select SUM(b.ReponseB) + SUM(t.ReponseT) as Reponse from besoins b, saisir s, talents t, proposer p where s.CodeB = b.CodeB and t.CodeT = p.CodeT and p.CodeU = {$usercode} and s.CodeU = {$usercode} and b.VisibiliteB = 1 and t.VisibiliteT = 1";
                        $resultat = mysqli_query ($session, $req);

                        if ($reponse = mysqli_fetch_array($resultat)) { 
                            if ($reponse["Reponse"] > 0) {
                                echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil <span class="badge badge-danger">ici</span></a>');                           
                            } else {
                                echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                            }
                        }
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
    <?php 
        echo '<div class="jumbotron">';
        echo '<div classe="container">';
        
if (isset($_SESSION['email'])) { 
          echo '<div class="container" id="MesInfos">';
                   
            echo '<h1>Mes informations personnelles</h1>';
            echo '<hr>';

            echo '<div class="row">';
                echo '<div class="col-8">';
            
            if(isset($_SESSION['email'])) {
                
                    $query = " select NomU, PrenomU, Email, TypeU from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($info = mysqli_fetch_array($result)) {                     
                        echo ('<p>Nom : '.$info["NomU"].'</p>');          
                        echo ('<p>Prénom : '.$info["PrenomU"].'</p>');  
                        echo ('<p>Adresse mail : '.$info["Email"].'</p>');  
                        echo ('<p><a href="changemdp.html.php">Changer mon mot de passe</a></p>');
                    } 
            }
                echo '</div>';
                echo '<div class="col-4">';
                    echo '<form name="Supprimer" action="Supprimer1Compte.php" method="post"><br>';
                        
                    echo('<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#supprimer">Supprimer mon compte</button>');
                    
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
                              echo('<p>Êtes-Vous sûr de supprimer votre compte ? <br>');
                              echo('Attention : toutes vos cartes associées seront supprimées.<br>');
                              echo('Pour tout problème, veuillez contacter l\'administrateur. </p>');
                            echo('</div>');
                            echo('<div class="modal-footer">');
                              echo('<button type="submit" class="btn btn-primary">Supprimer</button>');
                              echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>');
                            echo('</div>');
                          echo('</div>');
                        echo('</div>');
                      echo('</div>');                
        
                    echo '</form>';
                    echo '<br>';
                    echo '<p>Si vous voulez modifier votre adresse mail, veuillez recréer un nouveau compte. </p>';
                echo '</div>';
            echo '</div>';

                echo '<form method="POST" action="monespace.fonction.php">';

                    echo ('<p>Type d\'information affichée : </p>'); 
                    if ($_SESSION['type'] == ''){
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" checked/>');
                        echo ('<label for="radio-three">Tout</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');
                    } elseif ($_SESSION['type'] == 'Pro') {
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" />');
                        echo ('<label for="radio-three">Tout</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" checked />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');
                    } elseif ($_SESSION['type'] == 'Perso') {
                        echo ('<div class="switch-field">');
                        echo ('<input type="radio" id="radio-three" name="switch-two" value="" />');
                        echo ('<label for="radio-three">Tout</label>');
                        echo ('<input type="radio" id="radio-four" name="switch-two" value="Pro" />');
                        echo ('<label for="radio-four">Pro</label>');
                        echo ('<input type="radio" id="radio-five" name="switch-two" value="Perso" checked />');
                        echo ('<label for="radio-five">Perso</label>');
                        echo ('</div>');                 
                    }
                    echo '<br>';
                    echo '<button type="submit" onclick="Modifier()" class="btn btn-outline-dark">Modifier le type d\'information affichée</button>';
                    ?>
                    <script>
                        function Modifier() {
                            alert("Modification réussite !");
                            }
                    </script>   
                    <?php
                echo '</form>';
            echo '</div>';
            echo '<br><br>';
         
//<!--------------------------------------------------------------------------------------------------------------------------------------------->           
           echo '<div class="container" id="MesBesoins">';
           
            echo '<div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">';
              echo '<h1> Mes besoins </h1>';
              is_login_new_besoin();
            echo '</div>';
            echo '<hr>';
  
            echo '<form method="POST" action="Desactiver1CarteB.php">';
                echo '<div class="row">';
                echo '<div class="col-10">';
                echo '<ul class="list-inline">';

            $query = "select b.ReponseB, b.VisibiliteB, b.CodeB, b.TitreB, b.DescriptionB, b.DatePublicationB, b.DateButoireB, c.PhotoC from categories c, besoins b, saisir s where s.CodeB = b.CodeB and c.CodeC = b.CodeC and s.CodeU = {$usercode} order by b.CodeB DESC ";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
         
            if (mysqli_num_rows($result)>0) {
                 while ($besoin = mysqli_fetch_array($result)) {            
                    if (strtotime($besoin["DateButoireB"]) > strtotime(date("yy/m/d")) && $besoin["VisibiliteB"] == 1) {  
                        echo('<li class="list-inline-item">');
                        if ($besoin["ReponseB"] > 0) {
                            echo ('<span class="badge badge-danger">Nouvelle réponse</span>');                           
                        }
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');    
                        echo ('<center><input type="radio" name="codeB" value="'.$besoin["CodeB"].'"/><center>');
                        echo ('</div>');
                        echo ('<img src="'.$besoin["PhotoC"].'" class="card-img-top" alt="...">');   
                        echo ('<div class="card-body card text-center">');
                        echo ('<h5 class="card-title">'.$besoin["TitreB"].'</h5>');
                        echo ('<p class="card-text">Date de publication: '.$besoin["DatePublicationB"].'</p>');
                        echo ('<p class="card-text">Délais souhaité: '.$besoin["DateButoireB"].'</p>');
                        echo ('<a href="BesoinX.php?t='.$besoin["CodeB"].'" class="btn btn-outline-dark">Voir la demande</a>'); 
                        echo ('<br>');
                        echo ('<a href="BesoinModification.php?t='.$besoin["CodeB"].'" class="btn btn-outline-dark">Modifier</a>');
                        if ($besoin["ReponseB"] > 0) {
                            echo ('<br>');                     
                            echo ('<a href="ReponseBesoin.php?code='.$besoin["CodeB"].'" class="btn btn-outline-dark">Voir la réponse</a>');    //prendre les titres pour les besoins pour regrouper les réponses d'un besoin 
                        }
                        echo ('</div>');  
                        echo ('</div></li>');       
                       }
                } 
            } else {
                    echo ("Vous n'avez pas encore saisi un besoin");
            }             
  
            echo'    </ul>
                     </div>
                <div class="col-2">
                     <!-- Button trigger modal -->
                     <button  title="Veuillez sélectionner une carte" type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#MyModal">Désactiver carte</button>

                     <!-- Modal -->
                    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vérification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                              <span aria-hidden="true">&times;</span> 
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Êtes-Vous sûr de désactiver cette carte ?</p>
                          </div>
                          <div class="modal-footer">
                            <button name="desactiverB" type="submit" class="btn btn-primary">Désactiver</button>  
                          </div>
                        </div>
                      </div>
                    </div>

                </div>          
            </div>
            </form>   
          </div>  
       
        <br><br>';
//<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        echo '<div class="container" id="MesTalents">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Mes talents </h1>
                php is_login_new_talent(); 
            </div>
            
            <hr>
           
            <form method="POST" action="Desactiver1CarteT.php">
              <div class="row">
              <div class="col-10">
              <ul class="list-inline">';

            $query = " select t.ReponseT, t.VisibiliteT, t.CodeT, t.TitreT, t.DatePublicationT, c.PhotoC from categories c, talents t, proposer p where p.CodeT = t.CodeT and c.CodeC = t.CodeC and p.CodeU = {$usercode} order by t.CodeT DESC";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
             
            
            if (mysqli_num_rows($result)>0) {
                    while ($talent = mysqli_fetch_array($result)) {                     
                         if ($talent["VisibiliteT"] == 1) {  
                            echo('<li class="list-inline-item">');
                            if ($talent["ReponseT"] > 0) {
                                echo ('<span class="badge badge-danger">Nouvelle réponse</span>');                           
                            }
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input type="radio" name="codeT" value="'.$talent["CodeT"].'"/><center>');
                            echo ('</div>');
                            echo ('<img src="'.$talent["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$talent["TitreT"].'</h5>');
                            echo ('<p class="card-text">Date de publication: '.$talent["DatePublicationT"].'</p>');        
                            echo ('<a href="TalentX.php?t='.$talent["CodeT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                            echo ('<br>');
                            echo ('<a href="TalentModification.php?t='.$talent["CodeT"].'" class="btn btn-outline-dark">Modifier</a>'); 
                            if ($talent["ReponseT"] > 0) {
                                echo ('<br>');
                                echo ('<a href="ReponseTalent.php?code='.$talent["CodeT"].'" class="btn btn-outline-dark">Voir la réponse</a>');    //prendre les titres pour les besoins pour regrouper les réponses d'un besoin 
                            }                            
                            echo ('</div>');  
                            echo ('</div></li>');                
                          } 
                    }
            } else {
                    echo ("Vous n'avez pas encore saisi un talent");
            }    

        echo '</ul>     
                   </div>
                   <div class="col-2">
                     <!-- Button trigger modal -->
                     <button title="Veuillez sélectionner une carte" type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#MyModalT">Désactiver carte</button>
                    
                     <!-- Modal -->
                    <div class="modal fade" id="MyModalT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vérification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                              <span aria-hidden="true">&times;</span> 
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Êtes-Vous sûr de désactiver cette carte ?</p>
                          </div>
                          <div class="modal-footer">
                            <button name="desactiverT" type="submit" class="btn btn-primary">Désactiver</button>  
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
            </div>           
            </form>        
          </div>
        <br><br>';
//<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        echo '<div class="container" id="MesAteliers">
           
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1> Mes ateliers </h1>
              is_login_new_atelier(); 
            </div>
            <hr>
  
            <form method="POST" action="Desactiver1Atelier.php">
                <div class="row">
                <div class="col-10">
                <ul class="list-inline">';

            $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from categories c, ateliers a, participera p where p.CodeA = a.CodeA and c.CodeC = a.CodeC and p.CodeU = {$usercode} order by a.CodeA DESC ";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
         
            if (mysqli_num_rows($result)>0) {
                 while ($atelier = mysqli_fetch_array($result)) {            
                    if ($atelier["VisibiliteA"] == 1) {  
                        echo('<li class="list-inline-item">');
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');    
                        echo ('<center><input type="radio" name="codeA" value="'.$atelier["CodeA"].'"/><center>');
                        echo ('</div>');
                        echo ('<img src="'.$atelier["PhotoC"].'" class="card-img-top" alt="...">');   
                        echo ('<div class="card-body card text-center">');
                        echo ('<h5 class="card-title">'.$atelier["TitreA"].'</h5>');
                        echo ('<p class="card-text">Date de publication: '.$atelier["DatePublicationA"].'</p>');
                        echo ('<p class="card-text">Date & Créneau : '.$atelier["DateA"].'</p>');
                        echo ('<a href="AtelierX.php?t='.$atelier["CodeA"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                        echo ('<br>');
                        echo ('<a href="AtelierModification.php?t='.$atelier["CodeA"].'" class="btn btn-outline-dark">Modifier</a>');               
                        echo ('</div>');  
                        echo ('</div></li>');       
                       }
                } 
            } else {
                    echo ("Vous n'avez pas encore créé un atelier");
            }             

            echo '</ul>
                     </div>
                <div class="col-2">
                     <!-- Button trigger modal -->
                     <button title="Veuillez sélectionner une carte" type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#Myatelier">Désactiver carte</button>

                     <!-- Modal -->
                    <div class="modal fade" id="Myatelier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vérification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                              <span aria-hidden="true">&times;</span> 
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Êtes-Vous sûr de désactiver cette carte ?</p>
                          </div>
                          <div class="modal-footer">
                            <button name="desactiverA" type="submit" class="btn btn-primary">Désactiver</button>  
                          </div>
                        </div>
                      </div>
                    </div>

                </div>          
            </div>
            </form>   
          </div>  
       
        <br><br>';
    } else {
        echo ('<center><p><br><br>Veuillez d\'abord <a href="login.php">se connecter</a></p></center>');
    }?>
    </div>
 </div>                 
       
        <footer>
            <small><center><a href="contact.html.php" class="text-dark">Contact</a></center></small>
          <p id="copyright"><em><small>copyright &#9400; COUP DE MAIN, COUP DE POUCE, CPAM Haute-Garonne, 2020. All rights reserved.</small></em></p>
        </footer>
    
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>