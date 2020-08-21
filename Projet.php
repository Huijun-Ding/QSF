<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Les projets</title>

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
                <h1 class="text-center">Les projets</h1>

</div>
          <div class="container">
			<br><br>
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">

              <a href="Creer1Projet.php"><button type="button" class="btn btn-light">Ajouter un nouveau projet</button></a>
            </div>
            
            <div class="flex-parent d-flex justify-content-md-between bd-highlight mb-2">
              <a href="ProjetC.php"><div class="alert alert-light" role="alert">Filtrer les projets par catégorie</div></a>
              <form class="form-inline my-2 my-lg-0" class="recherche">
                    <input class="form-control mr-sm-2" type="search" placeholder="Entrez un mot clé" aria-label="Recherche">
                    <button type="button" class="btn btn-outline-dark">Recherche</button>
              </form>
            </div>
            
            <div class="flex-parent d-flex flex-wrap justify-content-around mt-3">
		    <?php
			    require_once('Fonctions.php');
			    $query = "select p.TitreP, c.PhotoC, p.DateButoireP from projet p, categories c where p.CodeC = c.CodeC order by CodeP DESC";

			    if(isset($_GET['mot']) AND !empty($_GET['mot'])) {     /*Recherche par mot clé*/
				$mot = htmlspecialchars($_GET['mot']);
				$query = "select p.TitreP, c.PhotoC, p.DateButoireP from projet p, categories c where p.CodeC = c.CodeC and p.TitreP LIKE '%$mot%' order by p.CodeP DESC";
			    }

			    $result = mysqli_query ($session, $query);   /*Si le mot clé existe, il va exécute la deuxième requête, sinon la première*/

			    if (mysqli_num_rows($result)>0) {
				while ($ligne = mysqli_fetch_array($result)) {                    
				echo ('<div class="card" style="width: 12rem;">');
				echo ('<img src="'.$ligne["PhotoC"].'" class="card-img-top" alt="...">');   
				echo ('<div class="card-body card text-center">');
				echo ('<h5 class="card-title">'.$ligne["TitreP"].'</h5>');
				echo ('<p class="card-text">Délais souhaité: '.date("d-m-yy", strtotime($ligne["DateButoireP"])).'</p>');
				echo ('<a href="ProjetX.php" class="btn btn-outline-dark">Voir la demande</a>'); 
				echo ('</div>');  
				echo ('</div>');         
				}
			    } else {
			      echo('<h5> Aucun résultat pour : '.$mot.'</h5>');
			    }        
			?>
            </div>
          </div>
        </div>
                
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>