<!doctype html>
<html lang="fr">
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
               <h1>Admin</h1>        <!-- Bouton pour les onglets --> 
                <button class="tablink" onclick="openPage('Catégories', this, 'orange')" >Catégories</button>   <!-- moteur de recherche : après changer de page ?????-->   
                <button class="tablink" onclick="openPage('Cartes', this, 'orange')" >Cartes</button>
                <button class="tablink" onclick="openPage('Utilisateurs', this, 'orange')" id="defaultOpen">Utilisateurs</button>
                <button class="tablink" onclick="openPage('Stats', this, 'orange')">Stats</button>
                <button class="tablink" onclick="openPage('Bandeau', this, 'orange')">Bandeau</button>
                <button class="tablink" onclick="openPage('Paramètres', this, 'orange')">Paramètres</button>

                <div id="Catégories" class="tabcontent">    <!-- Onglet catégorie --> 
                  <h3>Catégories</h3>
                    
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">⊕ Créer </button><br><br>
                    
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
                              <label for="message-text" class="col-form-label">Photo de catégorie :</label>  <!-- url de l'image ? -->
                              <textarea name="photoc" class="form-control" id="message-text"></textarea>
                            </div>                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button name="creer" type="submit" class="btn btn-primary">Créer</button>
                        </div>                     
                      </div>
                    </div>
                  </div>
                  </form>
                  
                   <?php
                    require_once('Fonctions.php');

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
                            echo ('<th scope="col">PhotoC</th>');
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
                             echo ('<a href="AdminModifierCategorie.php?t='.$ligne["CodeC"].'"><button type="button" class="btn btn-secondary"><img src="https://png.pngtree.com/png-vector/20190927/ourlarge/pngtree-pencil-icon-png-image_1753753.jpg" alt="Modifier" width="30" height="30"></button></a>');
                             echo ('<form action="AdminCategorieFonction.php" method="POST">');  //Désactiver une catégorie
                             echo ('<button name="desactiver" value="'.$ligne["CodeC"].'" type="submit" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Supprimer" width="30" height="30"></button>');
                             echo ('</form>');
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    }
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>                        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Cartes" class="tabcontent">      <!-- Onglet carte --> 
                
                  <h3>Cartes</h3>
                 
           
                  <!-- Tab links -->
                    <div class="tab">
                      <button class="tablinksc" onclick="openCity(event, 'London')">Besoins</button>
                      <button class="tablinksc" onclick="openCity(event, 'Paris')">Talents</button>
                    </div>

                    <!-- Tab content -->
                    <div id="London" class="tabcontentc">
                    <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                        <h3>Besoins</h3>
                        <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">     <!-- Moteur de recherche dans titre & description -->
                            <input class="form-control mr-sm-2" type="search" name="carteb" placeholder="Titre/Description" aria-label="Recherche">
                            <button type="submit" class="btn btn-outline-dark">Recherche</button>
                        </form>
                    </div>
                  <form action="AdminCarteInapproprieB.php" method="post">
                  <?php
                   
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
                             echo ('<a href="AdminBesoinX.php?t='.$ligne["CodeB"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="desactiverb" value="'.$ligne["CodeB"].'" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');                            
                             echo ('</div>');
                            echo ('</td>');                        
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                    
                    echo('<br><h3>Besoins Cachés</h3><br>');   

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
                             echo ('<a href="AdminBesoinX.php?t='.$ligne["CodeB"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activerb" value="'.$ligne["CodeB"].'" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                                                       
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    ?>        
                </form>
                </div>

                <div id="Paris" class="tabcontentc">      
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Talents</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">
                        <input class="form-control mr-sm-2" type="search" name="cartet" placeholder="Titre/Description" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                    
                  <form action="AdminCarteInapproprieT.php" method="post">
                  <?php

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
                             echo ('<a href="AdminTalentX.php?t='.$ligne["CodeT"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                              echo ('<button type="submit" name="desactivert" value="'.$ligne["CodeT"].'" class="btn btn-secondary"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');                 
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    
                    echo('<br><h3>Talents Cachés</h3><br>');
                    
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
                             echo ('<a href="AdminTalentX.php?t='.$ligne["CodeT"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             echo ('<button type="submit" name="activert" value="'.$ligne["CodeT"].'" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS82pYv9wgxfx27dUrgTr8zaGjZ6O3O2CONHA&usqp=CAU" alt="Activer" width="30" height="30"></button>');                    
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                   
                    ?>        
                </form>
            </div>
     

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
            </script>
        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Utilisateurs" class="tabcontent">      <!-- Onglet utilisateur --> 
                  <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
                    <h3>Utilisateurs</h3>
                    <form method="GET" class="form-inline my-2 my-lg-0" class="recherche">  <!-- Moteur de recherche --> 
                        <input class="form-control mr-sm-2" type="search" name="user" placeholder="Nom/Prénom/Email" aria-label="Recherche">
                        <button type="submit" class="btn btn-outline-dark">Recherche</button>
                    </form>
                  </div>
                  <p>Accéder au profil d'utilisateur. Bloquer un compte avec un mail de prévenance (modal : êtes-vous sûr ? comme ne pouvoir pas réactiver un compte). Moteur de recherche dans nom, prénom, email</p>
                   <?php

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
                             echo ('<a href="AdminUtilisateur.php?t='.$ligne["CodeU"].'"><button type="button" class="btn btn-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUptTBSZ_MvCJwuSgHbU74zhNGo2FDtMhgvA&usqp=CAU" alt="Détail" width="30" height="30"></button></a>');
                             
                             //echo ('<form name="Supprimer" action="AdminSupprimer1Compte.php" method="post"><br>');
                             echo ('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#supprimer"><img src="https://static.vecteezy.com/system/resources/previews/000/630/530/non_2x/trash-can-icon-symbol-illustration-vector.jpg" alt="Désactiver" width="30" height="30"></button>');
                             
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
                                      echo('<p>Êtes-Vous sûr de supprimer ce compte ?  </p>');
                                    echo('</div>');
                                    echo('<div class="modal-footer">');
                                      echo('<button type="submit" class="btn btn-primary">Supprimer</button>');
                                      echo('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>');
                                    echo('</div>');
                                  echo('</div>');
                                echo('</div>');
                              echo('</div>');                
                              //echo('</form>');
                              
                             echo ('</div>');
                            echo ('</td>');
                          echo ('</tr>');                     
                    }          
                    } 
                     echo ('</tbody>');
                    echo ('</table>');
                    ?>        
                </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------->   
                <div id="Stats" class="tabcontent">   <!-- Onglet stats --> 
                  <h3>Stats</h3>
                  <p>Affichage des chiffres statistiques (le nombre de mise en relation, note(étoiles) et commentaire : lier aux cartes correspondantes)</p>
                </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------->                  
                <div id="Bandeau" class="tabcontent">
                  <h3>Bandeau</h3>
                  <p>Remplacer Jumbotron par Carrousel avec des annonces d’administrateur (1ère page : Bienvenu). Zone de modification des texts et des photos dans la page d’accueil (Carousel) sans faire du code</p>
                  
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img class="d-block w-100" src="../img/Carrousel_1.png" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Page bienvenu</h5>
                            <p>Bienvenu à la PF</p>
                          </div>                          
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="https://st4.depositphotos.com/17075580/24554/v/600/depositphotos_245544496-stock-video-pink-comment-icon-black-background.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Page commentaires</h5>
                            <p>Voici des commentaires pour notre PF</p>
                          </div>  
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.vhm.fr/themes/custom/vhmgroupe/public/images/actualites.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Page info</h5>
                            <p>Voilà quelques infos</p>
                          </div>  
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>     
                </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------->                  
                <div id="Paramètres" class="tabcontent">   <!-- Onglet paramètre --> 
                  <h3>Paramètres</h3>
                  <p>Paramètre délais d’évaluation</p>
                  <h5>Délai pour envoyer l'email d'évaluation : <input type='text' placeholder="15"  > jours </h5>
                  <button type="button" class="btn btn-primary"> Changer </button>
                </div>
           
                <!-- CSS pour les onglets --> 
                <style>

                /* Style tab links */
                .tablink {
                  background-color: #555;
                  color: white;
                  float: left;
                  border: none;
                  outline: none;
                  cursor: pointer;
                  padding: 14px 16px;
                  font-size: 17px;
                  width: 15%;
                }

                .tablink:hover {
                  background-color: #777;
                }

                /* Style the tab content (and add height:100% for full page content) */
                .tabcontent {
                  color: black;
                  display: none;
                  padding: 100px 20px;
                  height: 100%;
                }

                </style>
                
                <!-- JS pour les onglets --> 
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

  <hr> 
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