<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Espace administrateur</title>

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
                <h1 class="text-center">Espace administrateur</h1>

</div>
          <div class="container">
              
        <?php
        if (isset($_SESSION['role'])) {
            echo '
               <br><br>        <!-- Bouton pour les onglets --> 
                <button class="tablink btn btn-dark" onclick="openPage(\'Catégories\', this, \'orange\')" id="defaultOpen">Catégories</button>&nbsp;&nbsp;   <!-- moteur de recherche : après changer de page ?????-->   
                <button class="tablink btn btn-dark" onclick="openPage(\'Cartes\', this, \'orange\')" >Cartes</button>&nbsp;&nbsp;
                <button class="tablink btn btn-dark" onclick="openPage(\'Utilisateurs\', this, \'orange\')" >Utilisateurs</button>&nbsp;&nbsp;
                <button class="tablink btn btn-dark" onclick="openPage(\'Stats\', this, \'orange\')">Statistiques</button>&nbsp;&nbsp;
                <button class="tablink btn btn-dark" onclick="openPage(\'Bandeau\', this, \'orange\')" >Bandeau</button>&nbsp;&nbsp;
                <button class="tablink btn btn-dark" onclick="openPage(\'Paramètres\', this, \'orange\')">Paramètres</button><br><br>';            
//<!--------------------------------------------------------------------------------------------------------------------------------------------->  
            echo '<div id="Catégories" class="tabcontent">    <!-- Onglet catégorie --> 
                  <h3>Catégories</h3><hr>
                    
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">⊕ Créer </button><br><br>
                    
                  <form action="AdminCategorieFonction.php" method="POST">  <!--Créer une nouvelle catégorie --> 
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nouvelle catégorie</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">            
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Nom de catégorie :</label>
                              <input name="nomc" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Description de catégorie :</label>
                              <textarea name="descriptionc" class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">URL d\'image :</label>  
                              <textarea name="photoc" class="form-control" id="message-text"></textarea>
                            </div>                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn " data-dismiss="modal">Fermer</button>
                          <button name="creer" type="submit" class="btn btn-primary">Créer</button>
                        </div>                     
                      </div>
                    </div>
                  </div>
                  </form>';

                    $query = "select CodeC, NomC, DescriptionC, PhotoC, VisibiliteC from categories";

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col"><center>Photo</center></th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) { 
                        if ($ligne["VisibiliteC"] == 1){
                            echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeC"].'</th>');
                            echo ('<td>'.$ligne["NomC"].'</td>');
                            echo ('<td>'.$ligne["DescriptionC"].'</td>');                       
                            echo ('<td><img src="'.$ligne["PhotoC"].'" alt="'.$ligne["NomC"].'" width="100" height="90"></td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');  //Modifier une catégorie
                             echo ('<a href="AdminCategorieModification.php?t='.$ligne["CodeC"].'"><button type="button" class="btn "><img src="https://png.pngtree.com/png-vector/20190927/ourlarge/pngtree-pencil-icon-png-image_1753753.jpg" alt="Modifier" width="30" height="30"></button></a>');
                             echo ('<form action="AdminCategorieFonction.php" method="POST">');  //Désactiver une catégorie                            
                             echo ('<button type="button"  class="btn " data-toggle="modal" data-target="#desactiver'.$ligne["CodeC"].'"><img src="img/trash.png" alt="Désactiver" width="30" height="30"></button>');    
                                 
                             echo('<div class="modal" tabindex="-1" id="desactiver'.$ligne["CodeC"].'" role="dialog">');
                                echo('<div class="modal-dialog" role="document">');
                                  echo('<div class="modal-content">');
                                    echo('<div class="modal-header">');
                                      echo('<h5 class="modal-title">Vérification</h5>');
                                      echo('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');
                                        echo('<span aria-hidden="true">&times;</span>');
                                      echo('</button>');
                                    echo('</div>');
                                    echo('<div class="modal-body">');
                                      echo('<p>Êtes-Vous sûr de supprimer cette catégorie ?  </p>');
                                    echo('</div>');
                                    echo('<div class="modal-footer">');                               
                                      echo('<button name="desactiver" value="'.$ligne["CodeC"].'" type="submit" class="btn btn-primary">Supprimer</button>');
                                      echo('<button type="button" class="btn " data-dismiss="modal">Fermer</button>');
                                    echo('</div>');
                                  echo('</div>');
                                echo('</div>');
                              echo('</div>');         
                              
                             echo ('</form>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    }
                    } 
                     echo ('</tbody>');
                    echo ('</table>');                    
                echo ('</div>');
//<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                echo '<div id="Cartes" class="tabcontent">      <!-- Onglet carte --> 
                
                  <h3>Cartes</h3><hr>  
           
                  <!-- Tab links -->
                    <div class="tab">
                      <button class="tablinksc" onclick="openCity(event, \'London\')" id="defaultOpenc">Besoins</button>
                      <button class="tablinksc" onclick="openCity(event, \'Paris\')">Talents</button>
                      <button class="tablinksc" onclick="openCity(event, \'Pekin\')">Ateliers</button>
                    </div>

                    <!-- Tab content -->
                    <div id="London" class="tabcontentc">
                    <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                        <h3>Besoins en cours</h3>
                        <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">     <!-- Moteur de recherche dans titre & description -->
                            <input class="form-control mr-sm-2" type="search" name="carteb" placeholder="Titre/Description" aria-label="Recherche">
                            <button type="submit" class="btn btn-outline-dark">Recherche</button>
                        </form>
                    </div>
                  <form action="AdminCarteInapproprieB.php" method="post">';
                   
                    $query = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 1 order by CodeB DESC";

                    if(isset($_GET['carteb']) AND !empty($_GET['carteb'])) {     /*Recherche par mot clé dans le titre et description*/
                        $carteb = htmlspecialchars($_GET['carteb']);
                        $query = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 1 and ( TitreB LIKE '%$carteb%' or DescriptionB LIKE '%$carteb%' ) order by CodeB DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }     
                 
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les besoins existants*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeB"].'</th>');                         
                            echo ('<td>'.$ligne["TitreB"].'</td>');                           
                            echo ('<td>'.$ligne["DescriptionB"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminBesoinX.php?t='.$ligne["CodeB"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="desactiverb" value="'.$ligne["CodeB"].'" class="btn "><img src="img/trash.png" alt="Désactiver" width="30" height="30"></button>');                            
                             echo ('</div>');
                            echo ('</td>');                        
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                    
                    echo('<br><h3>Besoins cachés</h3><br>');   

                    $query2 = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 0 order by CodeB DESC";

                    if(isset($_GET['carteb']) AND !empty($_GET['carteb'])) {     /*Recherche par mot clé dans le titre et description*/
                        $carteb = htmlspecialchars($_GET['carteb']);
                        $query2 = "select CodeB, TitreB, DescriptionB from besoins where VisibiliteB = 0 and ( TitreB LIKE '%$carteb%' or DescriptionB LIKE '%$carteb%' ) order by CodeB DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query2);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les besoins cachés */       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeB"].'</th>');
                            echo ('<td>'.$ligne["TitreB"].'</td>');
                            echo ('<td>'.$ligne["DescriptionB"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminBesoinX.php?t='.$ligne["CodeB"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activerb" value="'.$ligne["CodeB"].'" class="btn "><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                                                       
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                           
                echo '</form>
                </div>

                <div id="Paris" class="tabcontentc">      
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Talents en cours</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                        <input class="form-control mr-sm-2" type="search" name="cartet" placeholder="Titre/Description" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                </div>
                    
                  <form action="AdminCarteInapproprieT.php" method="post">';

                    $query = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 1 order by CodeT DESC";

                    if(isset($_GET['cartet']) AND !empty($_GET['cartet'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartet']);
                        $query = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 1 and ( TitreT LIKE '%$cartet%' or DescriptionT LIKE '%$cartet%' ) order by CodeT DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeT"].'</th>');
                            echo ('<td>'.$ligne["TitreT"].'</td>');
                            echo ('<td>'.$ligne["DescriptionT"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminTalentX.php?t='.$ligne["CodeT"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                              echo ('<button type="submit" name="desactivert" value="'.$ligne["CodeT"].'" class="btn "><img src="img/trash.png" alt="Désactiver" width="30" height="30"></button>');                 
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    echo('<br><h3>Talents cachés</h3><br>');
                    
                    $query2 = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 0 order by CodeT DESC";

                    if(isset($_GET['cartet']) AND !empty($_GET['cartet'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartet']);
                        $query2 = "select CodeT, TitreT, DescriptionT from talents where VisibiliteT = 0 and ( TitreT LIKE '%$cartet%' or DescriptionT LIKE '%$cartet%' ) order by CodeT DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query2);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents cachés*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeT"].'</th>');
                            echo ('<td>'.$ligne["TitreT"].'</td>');
                            echo ('<td>'.$ligne["DescriptionT"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminTalentX.php?t='.$ligne["CodeT"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activert" value="'.$ligne["CodeT"].'" class="btn "><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                    
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                          
                echo '</form>
            </div>

                    <div id="Pekin" class="tabcontentc">      
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Ateliers en cours</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                        <input class="form-control mr-sm-2" type="search" name="cartea" placeholder="Titre/Description" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                </div>
                    
                  <form action="AdminCarteInapproprieA.php" method="post">';

                    $query = "select CodeA, TitreA, DescriptionA from ateliers where VisibiliteA = 1 order by CodeA DESC";

                    if(isset($_GET['cartea']) AND !empty($_GET['cartea'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartea']);
                        $query = "select CodeA, TitreA, DescriptionA from ateliers where VisibiliteA = 1 and ( TitreA LIKE '%$cartea%' or DescriptionA LIKE '%$cartea%' ) order by CodeA DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeA"].'</th>');
                            echo ('<td>'.$ligne["TitreA"].'</td>');
                            echo ('<td>'.$ligne["DescriptionA"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminAtelierX.php?t='.$ligne["CodeA"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                              echo ('<button type="submit" name="desactivera" value="'.$ligne["CodeA"].'" class="btn "><img src="img/trash.png" alt="Désactiver" width="30" height="30"></button>');                 
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    echo('<br><h3>Ateliers cachés</h3><br>');
                    
                    $query2 = "select CodeA, TitreA, DescriptionA from ateliers where VisibiliteA = 0 order by CodeA DESC";

                    if(isset($_GET['cartea']) AND !empty($_GET['cartea'])) {     /*Recherche par mot clé dans le titre et description*/
                        $cartet = htmlspecialchars($_GET['cartea']);
                        $query2 = "select CodeA, TitreA, DescriptionA from ateliers where VisibiliteA = 0 and ( TitreA LIKE '%$cartea%' or DescriptionA LIKE '%$cartea%' ) order by CodeA DESC";
                    }
                                      
                    $result = mysqli_query ($session, $query2);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les talents cachés*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Titre</th>');
                            echo ('<th scope="col">Description</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                          echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeA"].'</th>');
                            echo ('<td>'.$ligne["TitreA"].'</td>');
                            echo ('<td>'.$ligne["DescriptionA"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminAtelierX.php?t='.$ligne["CodeA"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activera" value="'.$ligne["CodeA"].'" class="btn "><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                    
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                echo ('</form>');
            echo ('</div>');
            
            ?>         
            <!-- CSS pour la tab des cartes-->
            <style>     
            /* Style the tab */
            .tab {
              overflow: hidden;
              border: 1px solid #ccc;
              background-color: #f1f1f1;
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
              background-color: inherit;
              float: left;
              border: none;
              outline: none;
              cursor: pointer;
              padding: 14px 16px;
              transition: 0.3s;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
              background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
              background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontentc {
              display: none;
              padding: 6px 12px;
              border: 1px solid #ccc;
              border-top: none;
            }
            </style>

            <!-- JS pour la tab des cartes-->
            <script>
            function openCity(evt, cityName) {
              // Declare all variables
              var i, tabcontentc, tablinksc;

              // Get all elements with class="tabcontent" and hide them
              tabcontentc = document.getElementsByClassName("tabcontentc");
              for (i = 0; i < tabcontentc.length; i++) {
                tabcontentc[i].style.display = "none";
              }

              // Get all elements with class="tablinks" and remove the class "active"
              tablinksc = document.getElementsByClassName("tablinksc");
              for (i = 0; i < tablinksc.length; i++) {
                tablinksc[i].className = tablinksc[i].className.replace(" active", "");
              }

              // Show the current tab, and add an "active" class to the button that opened the tab
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
              document.getElementById("defaultOpenc").click();
            </script>
            <?php
            echo ('</div>');
//<!--------------------------------------------------------------------------------------------------------------------------------------------->       
            echo '<div id="Utilisateurs" class="tabcontent">      <!-- Onglet utilisateur --> 
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                      <h3>Utilisateurs</h3><hr>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">  <!-- Moteur de recherche --> 
                        <input class="form-control mr-sm-2" type="search" name="user" placeholder="Nom/Prénom/Email" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                  <form name="Supprimer" action="AdminUtilisateurFonction.php" method="post">';

                    $query = "select CodeU, NomU, PrenomU, Email from utilisateurs where NomU <> 'XXXXX' order by CodeU DESC";
                    
                    if(isset($_GET['user']) AND !empty($_GET['user'])) {     /*Recherche par mot clé dans prénom, nom, email des utilisateurs*/
                        $user = htmlspecialchars($_GET['user']);
                        $query = "select CodeU, NomU, PrenomU, Email from utilisateurs where NomU <> 'XXXXX' and ( NomU LIKE '%$user%' or PrenomU LIKE '%$user%' or Email LIKE '%$user%' ) order by CodeU DESC";
                    }

                    $result = mysqli_query ($session, $query);

                    if ($result == false) {
                        die("ereur requête : ". mysqli_error($session) );
                    }
                    
                    echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                    echo ('<thead>');
                          echo ('<tr>');
                            echo ('<th scope="col">#</th>');
                            echo ('<th scope="col">Nom</th>');
                            echo ('<th scope="col">Prénom</th>');
                            echo ('<th scope="col">Email</th>');
                            echo ('<th scope="col">Modification</th>');
                          echo ('</tr>');
                        echo ('</thead>');
                        echo ('<tbody>');
                    if (mysqli_num_rows($result)>0) {
                    while ($ligne = mysqli_fetch_array($result)) {                                               
                            echo ('<tr>');
                            echo ('<th scope="row">'.$ligne["CodeU"].'</th>');
                            echo ('<td>'.$ligne["NomU"].'</td>');
                            echo ('<td>'.$ligne["PrenomU"].'</td>');
                            echo ('<td>'.$ligne["Email"].'</td>');
                            echo ('<td>');
                             echo ('<div class="btn-group mr-2" role="group" aria-label="First group">');
                             echo ('<a href="AdminUtilisateur.php?t='.$ligne["CodeU"].'"><button type="button" class="btn "><img src="img/loupe.png" alt="Détail" width="30" height="30"></button></a>');                 
                             echo ('<button type="button"  class="btn " data-toggle="modal" data-target="#supprimer'.$ligne["CodeU"].'"><img src="img/trash.png" alt="Désactiver" width="30" height="30"></button>');    
                             echo ('</div>');
                            echo ('</td>');
                            echo ('</tr>');              
            
                             echo('<div class="modal" tabindex="-1" id="supprimer'.$ligne["CodeU"].'" role="dialog">');
                                echo('<div class="modal-dialog" role="document">');
                                  echo('<div class="modal-content">');
                                    echo('<div class="modal-header">');
                                      echo('<h5 class="modal-title">Vérification</h5>');
                                      echo('<button type="button" class="close" data-dismiss="modal" aria-label="Close">');
                                        echo('<span aria-hidden="true">&times;</span>');
                                      echo('</button>');
                                    echo('</div>');
                                    echo('<div class="modal-body">');
                                      echo('<p>Êtes-Vous sûr de supprimer ce compte ?  </p>');
                                    echo('</div>');
                                    echo('<div class="modal-footer">');                               
                                      echo('<button name="codeu" value="'.$ligne["CodeU"].'" type="submit" class="btn btn-primary">Supprimer</button>');
                                      echo('<button type="button" class="btn " data-dismiss="modal">Fermer</button>');
                                    echo('</div>');
                                  echo('</div>');
                                echo('</div>');
                              echo('</div>');         
         
                    }          
                    } 
                    echo ('</tbody>');
                    echo ('</table>');
                   echo '</form>
                </div>';
//<!--------------------------------------------------------------------------------------------------------------------------------------------->   
            echo '<div id="Stats" class="tabcontent">
              <h3>Statistiques</h3><hr>   
              
              <h5>Nombre de connexion du site</h5>
              <a href="https://analytics.google.com/analytics/web/?authuser=1#/report/visitors-overview/a173955301w241368476p225152034/" target="_blank" class="btn btn-light">Aller voir sur Google Analytics</a>
              <p><br></p>
              
              <h5>Mise en relation</h5><hr>';

                echo ('<dl>');
                echo ('<dt>Nombre de mise en relation besoins : ');
                $query5 = "select count(*) as reussit from compteurb";
                $result5 = mysqli_query ($session, $query5);
                if ($note = mysqli_fetch_array($result5)) {   
                    echo $note["reussit"]; 
                }                   
                echo ('</dt>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation réussit : ');
                $query1 = "select count(*) as reussit from compteurb where NumOuiB = 1";
                $result1 = mysqli_query ($session, $query1);
                if ($note = mysqli_fetch_array($result1)) {   
                    echo $note["reussit"]; 
                }
                echo ('</dd>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation échoué : ');
                $query2 = "select count(*) as echoue from compteurb where NumNonB = 1";
                $result2 = mysqli_query ($session, $query2);
                if ($note = mysqli_fetch_array($result2)) {   
                    echo $note["echoue"]; 
                }                   
                echo ('</dd>');
                echo ('</dl>');  

                echo ('<dl>');
                echo ('<dt>Nombre de mise en relation talents : ');
                $query6 = "select count(*) as reussit from compteurt";
                $result6 = mysqli_query ($session, $query6);
                if ($note = mysqli_fetch_array($result6)) {   
                    echo $note["reussit"]; 
                }                    
                echo ('</dt>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation réussit : ');
                $query3 = "select count(*) as reussit from compteurt where NumOuiT = 1";
                $result3 = mysqli_query ($session, $query3);
                if ($note = mysqli_fetch_array($result3)) {   
                    echo $note["reussit"]; 
                }                    
                echo ('</dd>');
                echo ('<dd style="text-indent:2em;"> - Nombre de mise en relation échoué : ');
                $query4 = "select count(*) as echoue from compteurt where NumNonT = 1";
                $result4 = mysqli_query ($session, $query4);
                if ($note = mysqli_fetch_array($result4)) {   
                    echo $note["echoue"]; 
                }                    
                echo ('</dd>');
                echo ('</dl><br>');    
               //----------------------------------------------------------------------->                 
                echo ('<h5>Notes</h5><hr>');
                echo ('<dl>');
                echo ('<dt>Note moyenne : ');
                $moyenne = "SELECT (SUM(b.NoteB) + SUM(t.NoteT))/(COUNT(b.NoteB) + COUNT(t.NoteT)) AS moyenne FROM evaluerb AS b, evaluert AS t";
                $notemoyenne = mysqli_query ($session, $moyenne);
                if ($note = mysqli_fetch_array($notemoyenne)) {   
                    echo $note["moyenne"];
                }                               
                echo ('</dt>');
                echo ('<dd style="text-indent:2em;"><p> - Moyenne de notes besoin : ');
                $moyenneb = "select AVG(NoteB) as moyenne from evaluerb";
                $notemoyenneb = mysqli_query ($session, $moyenneb);
                if ($noteb = mysqli_fetch_array($notemoyenneb)) {   
                    echo $noteb["moyenne"];
                }                               
                echo ('</p></dd>');                           
                echo ('<dd style="text-indent:2em;"><p> - Moyenne de notes talent : ');
                $moyennet = "select AVG(NoteT) as moyenne from evaluert";
                $notemoyennet = mysqli_query ($session, $moyennet);
                if ($notet = mysqli_fetch_array($notemoyennet)) {   
                    echo $notet["moyenne"];
                } 
                echo ('</p></dd>');                 
                echo ('</dl>');
                //-----------------------------------------------------------------------> 
                echo ('<br><h5>Retour d\'expérience</h5><hr>');   
                
                echo ('<h5>Avis besoin</h5>');
                echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                echo ('<thead>');
                      echo ('<tr>');
                        echo ('<th scope="col">besoin</th>');
                        echo ('<th scope="col">Note</th>');
                        echo ('<th scope="col">Commentaire</th>');
                      echo ('</tr>');
                    echo ('</thead>');
                    echo ('<tbody>');
                $requete1 = "select b.TitreB, e.NoteB, e.AvisB from evaluerb as e, besoins as b where e.AvisB != '' and e.CodeB = b.CodeB order by DateEB DESC limit 20";
                $resultat1 = mysqli_query ($session, $requete1);                        
                if (mysqli_num_rows($resultat1)>0) {
                while ($ligne = mysqli_fetch_array($resultat1)) {                                               
                      echo ('<tr>');
                        echo ('<th scope="row">'.$ligne["TitreB"].'</th>');
                        echo ('<td>'.$ligne["NoteB"].'</td>');
                        echo ('<td>'.$ligne["AvisB"].'</td>');
                      echo ('</tr>');                     
                }          
                } 
                echo ('</tbody>');
                echo ('</table><br><br>');                        
                
                echo ('<h5>Avis talent</h5>');
                echo ('<table class="table table-striped">');      /* Tableau pour afficher les catégories existantes*/       
                echo ('<thead>');
                      echo ('<tr>');
                        echo ('<th scope="col">talent</th>');
                        echo ('<th scope="col">Note</th>');
                        echo ('<th scope="col">Commentaire</th>');
                      echo ('</tr>');
                    echo ('</thead>');
                    echo ('<tbody>');
                $requete2 = "select t.TitreT, e.NoteT, e.AvisT from evaluert as e, talents as t where e.AvisT != '' and e.CodeT = t.CodeT order by DateET DESC limit 20";
                $resultat2 = mysqli_query ($session, $requete2);                        
                if (mysqli_num_rows($resultat2)>0) {
                while ($ligne = mysqli_fetch_array($resultat2)) {                                               
                      echo ('<tr>');
                        echo ('<th scope="row">'.$ligne["TitreT"].'</th>');
                        echo ('<td>'.$ligne["NoteT"].'</td>');
                        echo ('<td>'.$ligne["AvisT"].'</td>');
                      echo ('</tr>');                     
                }          
                } 
                echo ('</tbody>');
                echo ('</table>');                  

            echo ('</div>');
//<!--------------------------------------------------------------------------------------------------------------------------------------------->                  
        echo '<div id="Bandeau" class="tabcontent">
            <h3>Bandeau</h3><hr>';

            require_once('slide.html.php');

        echo '<br>  
        <h4>Modification</h4><hr>
        
        <form method="POST" action="AdminBandeauFonction.php">           
            <h5>Premier slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titre slide 1</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_1"></textarea>
                </div>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Photo (URL)</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_2"></textarea>
                </div>
          
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Paragraphe 1</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_3"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Paragraphe 2</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide1_4"></textarea>
                </div><br>        
                
            <h5>Deuxième slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titre slide 2</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide2_1"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Photo (URL)</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide2_2"></textarea>
                </div><br>
            
            <h5>Troisième slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titre slide 3</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide3_1"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Photo (URL)</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide3_2"></textarea>
                </div>            
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nouvelle</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide3_3"></textarea>
                </div><br>
                
            <h5>Quatième slide</h5>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titre slide 4</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_1"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Photo (URL)</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_2"></textarea>
                </div>             
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Commentaire 1</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_3"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Commentaire 2</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_4"></textarea>
                </div>
            
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Commentaire 3</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="slide4_5"></textarea>
                </div><br>           
            <input type="submit" class="btn btn-light" value="Modifier">
        </form>        
        </div> '; 
//<!--------------------------------------------------------------------------------------------------------------------------------------------->   
            echo '<div id="Paramètres" class="tabcontent">
                <h3>Paramètres</h3><hr>

                <form method="GET" action="AdminParametresFonction.php">
                    <p>Paramétrer le délais d\'envoie de mail d’évaluation : <input type=\'number\' name="interval"> jours </p>
                    <button type="submit" class="btn btn-light"> Modifier </button>';
                    $query = "select p.Interval from parametres as p";
                    $result = mysqli_query ($session, $query);
                    if (mysqli_num_rows($result)>0) {
                        while ($ligne = mysqli_fetch_array($result)) {     
                            echo '<p>Le délai actuel est  '.$ligne['Interval'].' jours</p>';                 
                        }
                    }
                    
              echo '  </form>
            </div>';
        } else {
            echo '<div><center><p><br><br><br>Vous n\'avez pas le droit d\'accéder à cette page</p>';
            echo '<a href="index.php">Retour à l\'accueil</a></div></center>';
        }
//<!---------------------------------------------------------------------------------------------------------------------------------------------> 
            ?>
            <script>
            function openPage(pageName, elmnt, color) {
            // Hide all elements with class="tabcontent" by default */
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(pageName).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
          }

          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
          </script>
      </div>
    </div>
    
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>