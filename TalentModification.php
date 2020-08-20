<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Modifier votre talent</title>

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
                <h1 class="text-center">Modifier votre talent</h1>

</div>
          <div class="container">
              <form action="Modifier1CarteT.php" method="POST">
               <?php
                require_once('Fonctions.php');
                date_default_timezone_set('Europe/Paris');
                echo "Date de modification :   " . date("d/m/yy"); 
               ?>         
               <?php

                $T = $_GET['t'];
                $query = "select t.TypeT, t.CodeT, t.VisibiliteT, t.TitreT, c.CodeC, c.NomC, t.DatePublicationT, t.DescriptionT from talents t, categories c where t.CodeC = c.CodeC and t.CodeT = $T ";
                $result = mysqli_query ($session, $query);
                
                if ($result == false) {
                    die("ereur requête : ". mysqli_error($session) );
                }
                while ($ligne = mysqli_fetch_array($result)) {                      /* Afficher le détail de chaque besoin */
                    if ($ligne["VisibiliteT"] == 1) {   
          
                        
                        echo('<div class="form-row align-items-center">');
                    echo('<div class="col-auto my-1">');
                      echo('<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>');
                      echo('<select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect" required>');
                            echo('<option value="'.$ligne["CodeC"].'" name="categorie" selected>'.$ligne["NomC"].'</option>');
                             $query2 = "select CodeC, NomC, DescriptionC from categories where VisibiliteC = 1";
                             $result = mysqli_query ($session, $query2);
                             if (mysqli_num_rows($result)>0) {       
                                while ($c = mysqli_fetch_array($result)) {                                  
                                    echo ('<option value="'.$c["CodeC"].'" name="categorie" title="'.$c["DescriptionC"].'">'.$c["NomC"].'</option>');                                         
                                }     
                             }                          
                      echo('</select>');
                    echo('</div>');
                    echo('</div>');
               
                        echo ('<div class="form-group">');
                        echo ('<label for="inputEmail4">Titre(<span style="color:red">*</span>)</label>');
                        echo ('<input type="text" name="titre" class="form-control col-md-4" id="inputEmail4" maxlength="20" value="'.$ligne["TitreT"].'" required>');
                        echo ('</div>');
                        
                        echo('<div class="form-group">') ;
                        echo('<label for="inputEmail4">Description du besoin(<span style="color:red">*</span>)</label><br/>') ;
                        echo('<textarea rows="4" cols="50" name="description" required>'.$ligne["DescriptionT"].'</textarea>') ;
                        echo('</div>') ;
            
                          if ($ligne["TypeT"] == "Pro") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" checked type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
                        
                         if ($ligne["TypeT"] == "Perso") {
                            echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input"  checked type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                        }
 
                        
                        if ($ligne["TypeT"] == "Pro et Perso") {
                          echo('<div class="form-group">');
                                echo('<label for="inputAddress">Type de talent(<span style="color:red">*</span>)</label>');			
                          echo('</div>');
                          echo('<div class="form-group">');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Pro">');
                              echo('<label class="form-check-label" for="inlineRadio1">Pro</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Perso">');
                              echo('<label class="form-check-label" for="inlineRadio2">Perso</label>');
                            echo('</div>');
                            echo('<div class="form-check form-check-inline">');
                              echo('<input class="form-check-input" type="radio" checked name="type" id="inlineRadio3" value="Pro et Perso">');
                              echo('<label class="form-check-label" for="inlineRadio3">Pro&Perso</label>');
                            echo('</div>');
                          echo('</div>');
                           }

                        echo('<hr>');
                        echo('<div class="form-group">');
                        echo('<button name="codeT" type="submit" value="'.$ligne["CodeT"].'" class="btn btn-primary">Modifier</button>');
                        echo (' <input type="reset" class="btn btn-dark" value="Annuler">');
                        echo('</div>');
                              }
                }
                 ?> 
              </form>

          </div>
        </div>

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>