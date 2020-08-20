<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Mes catégories</title>

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
                <h1 class="text-center">Mes catégories</h1>

</div>
          <div class="container">
            <center><h1 title="Tous les 15 jours, vous recevrez un Newsletter à propos des cartes créées dans les catégories que vous vous êtes abonnées. ">Mes Abonnements</h1></center>
            <hr> <input class="card-text" type="checkbox" onclick="ToutDesabonner()" id="parent1" name="selectall" value="">  <strong> <span id="label1">Se désabonner à tout</span></strong>
            <form  action="DesabonnerCategories.php" method="post">
            <div class="row">
                <div class="col-10">
                    <div id="carteb" class="flex-parent d-flex flex-wrap justify-content-around mt-3">
                  <?php
            if(isset($_SESSION['email'])) {
                      
                    $query = " select c.VisibiliteC, c.NomC,c.PhotoC,c.CodeC, c.DescriptionC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = {$usercode} ";
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
                                echo ('<center><input class="card-text" type="checkbox" id="Child_Checkbox1" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
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
                                echo('<h6 class="card-title" title="Si vous voulez proposer une nouvelle catégorie, veuillez remplir le nom et la description de votre proposition, un mail sera envoyé à l\'admin.">'.$ligne["NomC"].'</h6>');
                                echo ('</div>');
                                echo ('</div>');      
                        } else {
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input class="card-text" type="checkbox" id="Child_Checkbox1" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                            echo ('</div>');
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="'.$ligne["NomC"].'" title="'.$ligne["DescriptionC"].'">');    
                            echo ('<div class="card-body text-center">');
                            echo('<h6 class="card-title" title="'.$ligne["DescriptionC"].'">'.$ligne["NomC"].'</h6>');
                            echo ('</div>');
                            echo ('</div>'); 
                        }
                      }                                    
                    }          
                    } else {
                                echo("<h5> Vous ne vous êtes pas encore abonné à des catégories </h5>");
                            } 
            } else {
                echo ('<p>Veuillez d\'abord <a href="Login.php">se connecter</a></p>');
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
                                   label.innerHTML = "Se désabonner à tout";
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
                                  
                    $query = "select VisibiliteC, NomC, PhotoC, CodeC, DescriptionC from categories where codeC not in ( select c.codeC from categories c, abonner a where c.CodeC = a.CodeC and a.CodeU = $usercode )";
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
                                echo ('<center><input class="card-text" type="checkbox" id="Child_Checkbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
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
                                echo('<h6 class="card-title" title="Si vous voulez proposer une nouvelle catégorie, veuillez remplir le nom et la description de votre proposition, un mail sera envoyé à l\'admin.">'.$ligne["NomC"].'</h6>');
                                echo ('</div>');
                                echo ('</div>');      
                        } else {
                            echo ('<div class="card" style="width: 12rem;">');
                            echo ('<div class="card-header">');
                            echo ('<center><input class="card-text" type="checkbox" id="Child_Checkbox" name="categorie[]" value="'.$ligne["CodeC"].'"></center>');
                            echo ('</div>');
                            echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="'.$ligne["NomC"].'" title="'.$ligne["DescriptionC"].'">');    
                            echo ('<div class="card-body text-center">');
                            echo('<h6 class="card-title" title="'.$ligne["DescriptionC"].'">'.$ligne["NomC"].'</h6>');
                            echo ('</div>');
                            echo ('</div>'); 
                        }
                      }                          
                    }          
                    } else {
                                echo("<h5> Vous vous êtes abonné toutes les catégories </h5>");
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
                                   label.innerHTML = "S'abonner à tout";
                               }
                           }
                        }
                    }
                </script>
                <div class="col-2">
            <div>           
                <button type="submit" class="btn btn-dark" title="Tous les 15 jours, vous recevrez un Newsletter à propos des cartes créées dans les catégories que vous vous êtes abonnées. ">S'abonner</button>
            </div>
                    </div>
                    </div>
                        </form>
          </div>
        </div>
    
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>