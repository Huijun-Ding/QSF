<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Mon profil</title>

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
                <h1 class="text-center">Mon profil</h1>

</div>
          <div class="container">

    <?php 
        
        
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
                        echo ('<p class="card-text">Date de publication: '.date("d-m-yy", strtotime($besoin["DatePublicationB"])).'</p>');
                        echo ('<p class="card-text">Délais souhaité: '.date("d-m-yy", strtotime($besoin["DateButoireB"])).'</p>');
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
            ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="container" id="MesTalents">
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                <h1> Mes talents </h1>             
                <?php is_login_new_talent(); ?>
            </div>
            
            <hr>
           
            <form method="POST" action="Desactiver1CarteT.php">
              <div class="row">
              <div class="col-10">
              <ul class="list-inline">
                  
<?php
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
                            echo ('<p class="card-text">Date de publication: '.date("d-m-yy", strtotime($talent["DatePublicationT"])).'</p>');        
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
        ?>
<!--------------------------------------------------------------------------------------------------------------------------------------------->     
        <div class="container" id="MesAteliers">
           
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <h1> Mes ateliers </h1>
              <?php is_login_new_atelier(); ?>
            </div>
            <hr>
  
            <form method="POST" action="Desactiver1Atelier.php">
                <div class="row">
                <div class="col-10">
                <ul class="list-inline">

        <?php
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
                        echo ('<p class="card-text">Date de publication: '.date("d-m-yy", strtotime($atelier["DatePublicationA"])).'</p>');
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
        echo ('<center><p><br><br>Veuillez d\'abord <a href="Login.php">se connecter</a></p></center>');
    }?>
    </div>
 </div>                 
       
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>
