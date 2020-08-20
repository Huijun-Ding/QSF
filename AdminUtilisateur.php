<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>les informations sur cet utilisateur</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
  </head>
  <body>

    
<!-- Menu -->
 <?php require "menu.php"; ?>
<!-- Fin Menu -->


        <div class="jumbotron">
          
          <div class="section-title section-title-haut-page" >
                <h1 class="text-center">les informations sur cet utilisateur</h1>

</div>
          <div class="container">
           <?php
                    require_once('Fonctions.php');

                    $query = " select NomU, PrenomU, Email, TypeU from utilisateurs where CodeU = {$_GET['t']}";
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    while ($info = mysqli_fetch_array($result)) {                     
                        echo ('<p>Nom : '.$info["NomU"].'</p>');          
                        echo ('<p>Prénom : '.$info["PrenomU"].'</p>');  
                        echo ('<p>Adresse mail : '.$info["Email"].'</p>');  
                        if ($info["TypeU"] == NULL) {
                            echo ('<p>Type d\'information affichée : Pro et Perso </p>');
                        } else {
                            echo ('<p>Type d\'information affichée : '.$info["TypeU"].'</p>'); 
                        }
                    }
                    ?>
                    <br>
            </div>
          </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->           
           <div class="container" id="MesBesoins">
           
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1> Ses besoins </h1>    
            </div>
            <hr>
            
                <ul class="list-inline">
            <?php
            require_once('Fonctions.php');

            $query = "select b.ReponseB, b.VisibiliteB, b.CodeB, b.TitreB, b.DescriptionB, b.DatePublicationB, b.DateButoireB, c.PhotoC from categories c, besoins b, saisir s where s.CodeB = b.CodeB and c.CodeC = b.CodeC and s.CodeU = {$_GET['t']} order by b.CodeB DESC ";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
         
            if (mysqli_num_rows($result)>0) {
                 while ($besoin = mysqli_fetch_array($result)) {            
                    if (strtotime($besoin["DateButoireB"]) > strtotime(date("yy/m/d")) && $besoin["VisibiliteB"] == 1) {  
                        echo('<li class="list-inline-item">');
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');    
                        echo ('</div>');
                        echo ('<img src="'.$besoin["PhotoC"].'" class="card-img-top" alt="...">');   
                        echo ('<div class="card-body card text-center">');
                        echo ('<h5 class="card-title">'.$besoin["TitreB"].'</h5>');
                        echo ('<p class="card-text">Date de publication: '.$besoin["DatePublicationB"].'</p>');
                        echo ('<p class="card-text">Délais souhaité: '.$besoin["DateButoireB"].'</p>');                    
                        echo ('</div>');  
                        echo ('</div></li>');       
                       }
                } 
            } else {
                    echo ("Cet utilisateur n'a pas encore saisi un besoin");
            }             
  
            ?>
                </ul>

          </div>  
       
        <br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="container" id="MesTalents">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Ses talents </h1>
            </div>           
            <hr>  
              <ul class="list-inline">
            <?php
            require_once('Fonctions.php');

            $query = " select t.ReponseT, t.VisibiliteT, t.CodeT, t.TitreT, t.DatePublicationT, c.PhotoC from categories c, talents t, proposer p where p.CodeT = t.CodeT and c.CodeC = t.CodeC and p.CodeU = {$_GET['t']} order by t.CodeT DESC";

            $result = mysqli_query ($session, $query);

            if ($result == false) {
                die("ereur requête : ". mysqli_error($session) );
            }
    
            if (mysqli_num_rows($result)>0) {
                    while ($talent = mysqli_fetch_array($result)) {                     
                         if ($talent["VisibiliteT"] == 1) {  
                            echo('<li class="list-inline-item">');                  
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('</div>');
                            echo ('<img src="'.$talent["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$talent["TitreT"].'</h5>');
                            echo ('<p class="card-text">Date de publication: '.$talent["DatePublicationT"].'</p>');                                                                               
                            echo ('</div>');  
                            echo ('</div></li>');                
                          } 
                    }
            } else {
                    echo ("Cet utilisateur n'a pas encore saisi un talent");
            }             
            ?>
             </ul>     
       </div> 
         <br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
   <div class="container" id="MesAteliers">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Ses ateliers </h1>
            </div>           
            <hr>  
              <ul class="list-inline">
            <?php
            require_once('Fonctions.php');

            $query = " select a.TitreA, a.DateA, a.DatePublicationA, a.VisibiliteA, c.PhotoC from categories c, ateliers a, participera p where p.CodeA = a.CodeA and c.CodeC = a.CodeC and p.CodeU = {$_GET['t']} order by a.CodeA DESC";

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
                            echo ('</div>');
                            echo ('<img src="'.$atelier["PhotoC"].'" class="card-img-top" alt="...">');   
                            echo ('<div class="card-body card text-center">');
                            echo ('<h5 class="card-title">'.$atelier["TitreA"].'</h5>');
                            echo ('<p class="card-text">Date de publication: '.$atelier["DatePublicationA"].'</p>');    
                            echo ('<p class="card-text">Date & Créneau : '.$atelier["DateA"].'</p>');
                            echo ('</div>');  
                            echo ('</div></li>');                
                          } 
                    }
            } else {
                    echo ("Cet utilisateur n'a pas encore saisi un atelier");
            }             
            ?>
             </ul>     
       </div> 
         <br><br>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
         <div class="container" id="MesCatégories">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Abonné à ces catégories </h1>
            </div>           
            <hr>  
             <ul class="list-inline">

                  <?php
                    require_once('Fonctions.php');

                    $query = " select c.NomC,c.PhotoC,c.CodeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = {$_GET['t']} ";
                    $result = mysqli_query ($session, $query);
                        
                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher */       
                        echo('<li class="list-inline-item">');
                        echo ('<div class="card" style="width: 12rem;">');
                        echo ('<div class="card-header">');
                        echo ('</div>');
                        echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');    
                        echo ('<div class="card-body text-center">');
                        echo('<h6 class="card-title">'.$ligne["NomC"].'</h6>');
                        echo ('</div>');
                        echo ('</div></li>'); 
                    }          
                    } else {
                                echo("Cet utilisateur n'a pas encore s'abonner à des catégories");
                            } 
                  ?>      
                  </ul>  
                    </div>
  

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>