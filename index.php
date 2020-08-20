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
            require_once 'Fonctions.php';
            
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" id="tout" class="btn btn-secondary btn-sm" name="tout">Tout</button>');
                echo ('<button type="radio" id="pro" class="btn btn-secondary btn-sm" name="pro" value="Pro">Pro</button>');   
                echo ('<button type="radio" id="perso" class="btn btn-secondary btn-sm" name="perso" value="Perso">Perso</button>');               
                echo ('</div>');
            } 
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
        require_once('slide.html.php');
        ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="container" id="besoins">
            <h1 id="titre1"><a href="Besoin.php" class="badge badge-light">Besoins</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motB" placeholder="Fitness/Excel/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_besoin(); 
                    $query = "UPDATE besoins SET VisibiliteB = 0 WHERE CURDATE() > DateButoireB";
                    mysqli_query ($session, $query);
                ?>
            </div>
                       
            <div id="cartesB" class="flex-parent d-flex flex-wrap justify-content-around mt-3">     
            <?php
            require_once('Fonctions.php');

            if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = '{$_SESSION['type']}' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
            } elseif (empty ($_SESSION['email']) and isset($_GET['pro'])){    
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = 'Pro' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
            } elseif (empty ($_SESSION['email']) and isset($_GET['perso'])){
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC and (b.TypeB = 'Perso' OR b.TypeB ='Pro et Perso') order by CodeB DESC";
            } else {
                $query = "select  b.CodeB, b.VisibiliteB, b.TitreB, c.PhotoC, b.DateButoireB, b.TypeB from besoins b, categories c where b.CodeC = c.CodeC order by CodeB DESC";
            }

            if(isset($_GET['motB']) AND !empty($_GET['motB'])) {     /*Recherche par mot clé*/
                $mot = htmlspecialchars($_GET['motB']);
                if(isset($_SESSION['email']) and $_SESSION['type'] != NULL) {
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
                        echo ('<p class="card-text">Délais souhaité: <br> '.date("d/m/yy", strtotime($ligne["DateButoireB"])).'</p>');
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
            if(isset($_SESSION['email']) and ($_SESSION['type']) != NULL) {  
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = '{$_SESSION['type']}' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
            } elseif (empty ($_SESSION['email']) and isset($_GET['pro'])) {
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = 'Pro' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
            } elseif (empty ($_SESSION['email']) and isset($_GET['perso'])){
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and (t.TypeT = 'Perso' or t.TypeT = 'Pro et Perso') order by t.CodeT DESC";
            } else {
                $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC order by t.CodeT DESC";
            }


            if(isset($_GET['motT']) AND !empty($_GET['motT'])) {     /*Recherche par mot clé*/
                $mot = htmlspecialchars($_GET['motT']);
                if(isset($_SESSION['email']) and $_SESSION['type'] != NULL) {
                   $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.TitreT LIKE '%$mot%' and t.TypeT = '{$_SESSION['type']}' order by t.CodeT DESC";
                } else {
                   $query = "select t.CodeT, t.VisibiliteT, t.TitreT, c.PhotoC, t.TypeT from talents t, categories c where t.CodeC = c.CodeC and t.TitreT LIKE '%$mot%' order by t.CodeT DESC";
                }
            }

            $result = mysqli_query ($session, $query);

            if (mysqli_num_rows($result)>0) {       
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                  if ($ligne["VisibiliteT"] == 1){
                        if ($ligne["TypeT"] == 'Pro et Perso') {
                            echo ('<div><h5><span class="badge badge-info">'.$ligne["TypeT"].'</span></h5>');
                        } elseif ($ligne["TypeT"] == 'Pro') {
                            echo ('<div><h5><span class="badge badge-success">'.$ligne["TypeT"].'</span></h5>');
                        } elseif ($ligne["TypeT"] == 'Perso') {
                            echo ('<div><h5><span class="badge badge-warning">'.$ligne["TypeT"].'</span></h5>');
                        }                                  
                    echo ('<div class="card" style="width: 12rem;">');                              
                    echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                    echo ('<div class="card-body card text-center">');
                    echo ('<h5 class="card-title">'.$ligne["TitreT"].'</h5>');
                    echo ('<a href="TalentX.php?t='.$ligne["CodeT"].'" class="btn btn-outline-dark">Voir le détail</a>'); 
                    echo ('</div>');  
                    echo ('</div></div>');             
                  }
                }
            } else {
              echo('<h5> Aucun résultat</h5>');
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
                
                function set_display3(first, last) {
                    $('#cartesA').children().css('display', 'none');
                    $('#cartesA').children().slice(first, last).css('display', 'block');
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
                
                 function previous3(){
                    if($('.active').prev('.page_link').length) go_to_page3(current_page - 1);
                }

                function next3(){
                    if($('.active').next('.page_link').length) go_to_page3(current_page + 1);
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
                
                function go_to_page3(page_num){
                    current_page = page_num;
                    start_from = current_page * show_per_page;
                    end_on = start_from + show_per_page;
                    set_display3(start_from, end_on);
                    $('.active').removeClass('active');
                    $('#id3' + page_num).addClass('active');
                }
                
                $(document).ready(function() {

                    var number_of_pages = Math.ceil($('#cartesB').children().length / show_per_page);
                    var number_of_pages2 = Math.ceil($('#cartesT').children().length / show_per_page);
                    var number_of_pages3 = Math.ceil($('#cartesA').children().length / show_per_page);
                    
                    var nav = '<nav aria-label="Page navigation example" class="page"><ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="javascript:previous();">Précédent</a>';
                    var nav2 = '<nav aria-label="Page navigation example" class="page"><ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="javascript:previous2();">Précédent</a>';
                    var nav3 = '<nav aria-label="Page navigation example" class="page"><ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="javascript:previous3();">Précédent</a>';
                    
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
                    
                    var i = -1;
                    while(number_of_pages3 > ++i){
                        nav3 += '<li class="page_link'
                        if(!i) nav += ' active';
                        nav3 += '" id="id3' + i +'">';
                        nav3 += '<a class="page-link" href="javascript:go_to_page3(' + i +')">'+ (i + 1) +'</a>';
                    }
                    nav3 += '<li class="page-item"><a class="page-link" href="javascript:next3();">Suivant</a></ul></nav>';

                    $('#page_navigation3').html(nav3);
                    set_display3(0, show_per_page);

                });

            </script>
<!--------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="container" id="ateliers">
            <h1 id="titre1"><a href="Atelier.php" class="badge badge-light">Ateliers</a></h1><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <form method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search"  name="motA" placeholder="Fitness/Excel/..." aria-label="Search">
                    <button type="submit" class="btn btn-outline-dark">Recherche</button>
              </form> 
              <?php is_login_new_atelier(); ?>
            </div>
                       
            <div id="cartesA" class="flex-parent d-flex flex-wrap justify-content-around mt-3">     
            <?php
            
              
                if(isset($_SESSION['email'])) {
                    if(isset($st)) {                                            // Utilisateur connecté, sélectionné les catégories
                        if ($_SESSION['type'] != NULL) {                        // Utilisateur connecté, sélectionné les catégories, son type est Pro ou Perso
                            $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and (a.TypeA = '{$_SESSION['type']}' OR a.TypeA ='Pro et Perso') and a.CodeC in $st order by CodeA DESC";
                        } else {                                                // Utilisateur connecté, sélectionné les catégories, son type est Pro et Perso
                            $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.CodeC in $st order by CodeA DESC";
                        }
                    } else {                                                    // Utilisateur connecté, n'a pas sélectionner les catégories
                        if ($_SESSION['type'] != NULL) {                        // Utilisateur connecté, n'a pas sélectionner les catégories, son type est Pro ou Perso
                            $query = "select  a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and (a.TypeA = '{$_SESSION['type']}' OR a.TypeA ='Pro et Perso') order by CodeA DESC";
                        } else {                                                // Utilisateur connecté, n'a pas sélectionner les catégories, son type est Pro et Perso
                            $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC order by CodeA DESC";
                        }
                    } 
                } else {
                    if (isset($_POST['type']) && isset($_POST['categorie'])) { // V-si un visiteur choisit les deux filtres
                        $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and (a.TypeA = '{$_POST['type']}' OR a.TypeA ='Pro et Perso') and a.CodeC in $st order by CodeA DESC";
                    } elseif (isset($_POST['type'])) {  // V-si un visiteur choisit filtre type
                        $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and (a.TypeA = '{$_POST['type']}' OR a.TypeA ='Pro et Perso') order by CodeA DESC";
                    } elseif (isset($_POST['categorie'])) { // V-si un visiteur choisit filtre categorie
                        $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.CodeC in $st order by CodeA DESC";
                    }  else {  // V-si un visiteur rien choisit 
                        $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC order by CodeA DESC";
                    }
                }
                        
                if(isset($_GET['motA']) AND !empty($_GET['motA'])) {     /*Recherche par mot clé*/
                    $mot = htmlspecialchars($_GET['mot']);
                    if(isset($_SESSION['email']) and $_SESSION['type'] != NULL) {
                        $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.TitreA LIKE '%$mot%' and a.TypeA = '{$_SESSION['type']}' order by a.CodeA DESC";
                    } else {
                       $query = "select a.CodeA, a.TitreA, a.DescriptionA, a.DateA, a.LieuA, a.NombreA, a.DatePublicationA, a.URL, a.PlusA, a.TypeA, a.VisibiliteA, c.PhotoC from ateliers a, categories c where a.CodeC = c.CodeC and a.TitreA LIKE '%$mot%' order by a.CodeA DESC";
                    }
                }

            $result = mysqli_query ($session, $query);
            
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher tous les besoins par l'ordre chronologique en format carte */
                         if ($ligne["VisibiliteA"] == 1) {   
                            if ($ligne["TypeA"] == 'Pro et Perso') {
                                echo ('<div><h5><span class="badge badge-info">'.$ligne["TypeA"].'</span></h5>');
                            } elseif ($ligne["TypeA"] == 'Pro') {
                                echo ('<div><h5><span class="badge badge-success">'.$ligne["TypeA"].'</span></h5>');
                            } elseif ($ligne["TypeA"] == 'Perso') {
                                echo ('<div><h5><span class="badge badge-warning">'.$ligne["TypeA"].'</span></h5>');
                            }                                     
                            echo ('<div class="card" style="width: 12rem;">');                                 
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$ligne["TitreA"].'</h5>');
                            echo ('<p class="card-text">Date de publication: <br>'.date("d/m/yy", strtotime($ligne["DatePublicationA"])).'</p>');
                            echo ('<p class="card-text">Date & Créneau : '.$ligne["DateA"].'</p>');
                            echo ('<a href="AtelierX.php?t='.$ligne["CodeA"].'" class="btn btn-outline-dark">Voir le détail</a><br>'); 
                            echo ('<a href="'.$ligne["URL"].'" class="btn btn-outline-dark">Je m\'inscris</a>');  
                            echo ('</div>');   
                            echo ('</div></div>');   
                            } 
                    }
                    } else {
                        echo('<h5> Aucun résultat</h5>');
                    }                 
             ?>
            </div>
           
            <div id="page_navigation3"> </div>
         </div>
   
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

<!------------------------------------------------------------------------------------------------------------------------------------------->
        <hr/>    
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