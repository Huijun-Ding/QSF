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
    <title>Quai des savoir-faire</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
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
          
          <?php
            require_once 'Fonctions.php';
            if (empty($_SESSION['email'])){
                echo ('<div class="switch-field">');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro et Perso" checked/>');
                echo ('<label for="radio-three">Pro et Perso</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Pro" />');
                echo ('<label for="radio-four">Pro</label>');
                echo ('<input type="radio" id="" name="affichagevisiteur" value="Perso" />');
                echo ('<label for="radio-five">Perso</label>');
                echo ('</div>');
            } 
          ?>

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
            <h1 class="display-4">Bienvenue au Quai des savoir-faire !</h1>
            <p class="lead">Quai des savoir-faire est une plateforme qui permet de partager les compétences entre collaborateurs.</p>
            <hr class="my-4">
            <p>Partageons nos talents, la solitarité c'est aussi entre nous.</p>
             <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">  
                <p class="lead">
                    <a href="https://notmoebius.github.io/quaidessavoirfaire/" target="_blank"><button type="button" class="btn btn-outline-dark">En savoir plus</button></a>
                </p>
             <?php
            require_once('Fonctions.php');
            
            if(isset($_SESSION['email'])){
                echo('<a href="https://eva.beta.gouv.fr/"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            } else {
                echo ('<a href="Login.php"><img src="https://i.pinimg.com/474x/81/c4/39/81c43990273687ad0218db03ed667d26.jpg" class="rounded-circle" alt="Bonhomme talent"></a>');
            }
            ?>
             </div>
            </div>
        </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="besoins">
            <h1 id="titre1"><a href="Besoin.php" class="badge badge-light">Besoins</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motB" placeholder="Fitness/Excel/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_besoin(); ?>
            </div>
   
            <div id="cartesB" class="flex-parent d-flex flex-wrap justify-content-around mt-3">     
            	<?php
            		require_once('Fonctions.php');
                        $query = "select b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
                        
                        if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                            $query = "select b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
                        } else {
                            $query = "select b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
                        }

                        if(isset($_GET['motB']) AND !empty($_GET['motB'])) {     /*Recherche par mot clé*/
                            $mot = htmlspecialchars($_GET['motB']);
                            $query = "select b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB from besoins b, categories c where b.CodeC = c.CodeC and b.TitreB LIKE '%$mot%' order by b.CodeB DESC";
                        }

                        $result = mysqli_query ($session, $query);

                        if (mysqli_num_rows($result)>0) {
                            while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                                 if (strtotime($ligne["DateButoireB"]) >= strtotime(date("yy/m/d")) && $ligne["VisibiliteB"] == 1) {   
                                    echo ('<div class="card" style="width: 12rem;">');
                                    echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                                    echo ('<div class="card-body card text-center">');
                                    echo ('<h5 class="card-title">'.$ligne["TitreB"].'</h5>');
                                    echo ('<p class="card-text">Délais souhaité: '.$ligne["DateButoireB"].'</p>');
                                    echo ('<a href="BesoinX.php?t='.$ligne["TitreB"].'" class="btn btn-outline-dark">Voir la demande</a>'); 
                                    echo ('</div>');  
                                    echo ('</div>');   
                                    } 
                            }
                            } else {
                                echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
                            } 
           	 ?>
            </div>
           
            <div id="page_navigation"> </div>
         </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
          <div class="container" id="talents">
              <h1 id="titre2"><a href="Talent.php" class="badge badge-light">Talents</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">

              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motT" placeholder="Animation/BI/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_talent(); ?>
            </div>

            <div id="cartesT" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            	<?php
                        $query = "select t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";

                        if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                            $query = "select t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_SESSION['type']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
                        } else {
                            $query = "select t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";
                        }
                        
                        if(isset($_GET['motT']) AND !empty($_GET['motT'])) {     /*Recherche par mot clé*/
                            $mot = htmlspecialchars($_GET['motT']);
                            $query = "select t.VisibiliteT, t.TitreT, c.PhotoC from talents t, categories c where t.CodeC = c.CodeC and t.TitreT LIKE '%$mot%' order by t.CodeT DESC";
                        }

                        $result = mysqli_query ($session, $query);

                        if (mysqli_num_rows($result)>0) {       
                            while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                              if ($ligne["VisibiliteT"] == 1){
                                echo ('<div class="card" style="width: 12rem;">');
                                echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                                echo ('<div class="card-body card text-center">');
                                echo ('<h5 class="card-title">'.$ligne["TitreT"].'</h5>');
                                echo ('<a href="TalentX.php?t='.$ligne["TitreT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                                echo ('</div>');  
                                echo ('</div>');             
                              }
                            }
                        } else {
                          echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
                        }  
            	?>
            </div>            

            <div id="page_navigation2"> </div>
          </div>      
            
            <script>

                var show_per_page = 5;
                var current_page = 0;

                function set_display(first, last) {
                    $('#cartesB').children().css('display', 'none');
                    $('#cartesB').children().slice(first, last).css('display', 'block');
                }
                function set_display2(first, last) {
                    $('#cartesT').children().css('display', 'none');
                    $('#cartesT').children().slice(first, last).css('display', 'block');
                }

                function previous(){
                    if($('.active').prev('.page_link').length) go_to_page(current_page - 1);
                }

                function next(){
                    if($('.active').next('.page_link').length) go_to_page(current_page + 1);
                }
                function previous2(){
                    if($('.active').prev('.page_link').length) go_to_page2(current_page - 1);
                }

                function next2(){
                    if($('.active').next('.page_link').length) go_to_page2(current_page + 1);
                }
                function go_to_page(page_num){
                    current_page = page_num;
                    start_from = current_page * show_per_page;
                    end_on = start_from + show_per_page;
                    set_display(start_from, end_on);
                    $('.active').removeClass('active');
                    $('#id' + page_num).addClass('active');
                }
                function go_to_page2(page_num){
                    current_page = page_num;
                    start_from = current_page * show_per_page;
                    end_on = start_from + show_per_page;
                    set_display2(start_from, end_on);
                    $('.active').removeClass('active');
                    $('#sid' + page_num).addClass('active');
                }
                $(document).ready(function() {

                    var number_of_pages = Math.ceil($('#cartesB').children().length / show_per_page);
                    var number_of_pages2 = Math.ceil($('#cartesT').children().length / show_per_page);
                    var nav = '<nav aria-label="Page navigation example" class="page"><ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="javascript:previous();">Précédent</a>';
                    var nav2 = '<nav aria-label="Page navigation example" class="page"><ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="javascript:previous2();">Précédent</a>';
                    var i = -1;
                    while(number_of_pages > ++i){
                        nav += '<li class="page_link'
                        if(!i) nav += ' active';
                        nav += '" id="id' + i +'">';
                        nav += '<a class="page-link" href="javascript:go_to_page(' + i +')">'+ (i + 1) +'</a>';
                    }
                    nav += '<li class="page-item"><a class="page-link" href="javascript:next();">Suivant</a></ul></nav>';

                    $('#page_navigation').html(nav);
                    set_display(0, show_per_page);

                    var i = -1;
                    while(number_of_pages2 > ++i){
                        nav2 += '<li class="page_link'
                        if(!i) nav2 += ' active';
                        nav2 += '" id="sid' + i +'">';
                        nav2 += '<a class="page-link" href="javascript:go_to_page2(' + i +')">'+ (i + 1) +'</a>';
                    }
                    nav2 += '<li class="page-item"><a class="page-link" href="javascript:next2();">Suivant</a></ul></nav>';

                    $('#page_navigation2').html(nav2);
                    set_display2(0, show_per_page);

                });

            </script>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
     <!--    <div class="container" id="cours">
            <div class="flex-parent d-flex flex-wrap justify-between-around mt-3">
            <h1 id="titre3"><a href="#" class="badge badge-light">Ateliers</a></h1>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Course à pied ..." aria-label="Search">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
              <div class="card" style="width: 12rem;">
                <img src="https://www.lecoindesentrepreneurs.fr/wp-content/uploads/2015/03/Logiciel-pour-la-gestion-de-projet.png" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier AI et emploi</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://lte.ma/wp-content/uploads/2016/09/Big-Data-et-marketing.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier Big data and marketing</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://www.dynamique-mag.com/wp-content/uploads/6d3e1d04a6540332e1247436547e3d49-737x405.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier Finance d'entreprise</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="https://resize.prod.docfr.doc-media.fr/r/720,480,center-middle,ffffff,smartcrop/img/var/doctissimo/storage/images/fr/www/medecines-douces/meditation/meditation-pleine-conscience/653552-1-fre-FR/meditation-pleine-conscience.jpg" class="card-img-top" alt="...">
                <div class="card-body card text-center">
                  <h5 class="card-title">Atelier découverte de la méditation en pleine conscience</h5>
                  <p class="card-text">Description</p>
                  <a href="" class="btn btn-outline-dark">Je participe</a>
                </div>
              </div>
            </div>
            <nav aria-label="Page navigation example" class="page">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Suivant</a>
                </li>
              </ul>
            </nav>
          </div>  -->
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <!--  <div class="container" id="projets">
            <h1 id="titre4"><a href="Projet.php" class="badge badge-light">Projet</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <a href="Creer1Projet.php"><button type="button" class="btn btn-light">Ajouter un nouveau projet</button></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
           
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
            <?php /*
            require_once('Fonctions.php');
            $query = "select p.TitreP, c.PhotoC from projet p, categories c where p.CodeC = c.CodeC order by CodeP DESC limit 5";
            $result = mysqli_query ($session, $query);
            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
            while ($ligne = mysqli_fetch_array($result)) {                        /* Afficher les 5 talents les plus récents */
            /*
                echo ('<div class="card" style="width: 12rem;">');
                echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                echo ('<div class="card-body card text-center">');
                echo ('<h5 class="card-title">'.$ligne["TitreP"].'</h5>');
                echo ('<a href="" class="btn btn-outline-dark">Je participe</a>'); 
                echo ('</div>');  
                echo ('</div>');               
            }                */
            ?>
            </div>
              
            <nav aria-label="Page navigation example" class="page">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Suivant</a>
                </li>
              </ul>
            </nav>
            </div>  ---->
<!--------------------------------------------------------------------------------------------------------------------------------------------
            <div class="container">
              <div class="flex-parent d-flex flex-wrap justify-between-around mt-3">
                <h1 id="titre5"><a href="#" class="badge badge-light">Vie ma vie</a></h1>
                <form class="form-inline my-2 my-lg-0" class="recherche">
                  <input class="form-control mr-sm-2" type="search" placeholder="Chargé(e) de projet ..." aria-label="Search">
                  <button type="button" class="btn btn-outline-dark">Recherche</button>
                </form>
              </div>
            	<div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Chargé(e) de recrutement <-> Responsable administratif adjoint
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Date : 23/02/2020 <br><br>
                    Lieu : Toulouse <br><br>
                    Mission du post 1 : Rédiger et publier des offres d’emplois attractives, via notre ATS « Jobaffinity » ;
                    Suivre les annonces, tri des CV, présélections téléphoniques ;
                    Conduire les entretiens de recrutement individuels ou collectifs, selon les profils, avec les opérationnels ;
                    Gérer l’intégralité du processus de recrutement et participer à la prise de décision ; <br><br>
                    Mission du post 2 : Contribue à la réalisation et au suivi des objectifs stratégiques de l’organisme en assistant la direction locale; Participe à la mise en œuvre opérationnelle de la politique impulsée par la direction régionale; Mobilise les collaborateurs autour des missions, ambitions et objectifs de l’échelon et les accompagne dans les changements engagés, les nouvelles organisations.<br>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Chargé de documentation <-> Responsable adjoint(e) service administration du personnel
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Date : <br>
                    Lieu : <br>
                    Mission du post 1 : <br>
                    Mission du post 2 : <br>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Développeur <-> Chargé(e) de projet
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    Date : <br>
                    Lieu : <br>
                    Mission du post 1 : <br>
                    Mission du post 2 : <br>
                  </div>
                </div>
              </div>
              </div>
            </div>
------------------------------------------------------------------------------------------------------------------------------------------->
        <hr/>    
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