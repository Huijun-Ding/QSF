<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Créer un compte</title>

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
                <h1 class="text-center">Créer un compte</h1>

</div>
          <div class="container">
			
                        <form method = 'POST' action="AjouterUtilisateurs.php" class="col-md-6 formulaire-inscription"><br><br>
			  <div class="form-row">

				<div class="form-group col-md-12">

				  <label for="inputEmail4">Nom</label>
				  <input type="text" class="form-control" name="nom" id="inputEmail4" maxlength="40" required>
				</div>

				<div class="form-group col-md-12">
				  <label for="inputPassword4" >Prénom</label>
				  <input type="text" class="form-control" name="prenom" id="inputPassword4" maxlength="25" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputAddress">Email (Pro & Perso)</label>
				<input type="text" class="form-control" name="email" id="inputAddress" placeholder="@gmail.com" maxlength="255" required>
			  </div>
                        
			  <div class="form-group">
				<div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck" required="">
				  <label class="form-check-label" for="gridCheck">
                                      <a href="ConditionGeneraleUtilisation.php" class="bulle" target="_blank" title="Tous vos échanges sur Coup de main coup de pouce sont anonymes, si vous voulez en savoir plus, veuillez cliquer ici">Je m'engage à respecter <u>la charte</u>. </a>
				  </label>
				</div>
			  </div>
                          
			  <div class="form-row">
				<div class="form-group col-md-12">
				  <label for="inputPassword1">Mot de Passe</label>
				  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" maxlength="40" required>
				</div>                       
				<div class="form-group col-md-12">
				  <label for="inputPassword4">Confirmation de Mot de Passe </label>
				  <input type="password" class="form-control" name="passwordcf" id="exampleInputPassword1"  placeholder="Password Confirmation" maxlength="40" required>
				</div>
			  </div>
                            
                        <div id="radiotypeu">
                          <p>Sélectionner le type d'information que vous souhaitez visualiser</p> 
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios1" value="" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Pro et Perso
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios2" value="Pro">
                            <label class="form-check-label" for="exampleRadios2">
                              Pro
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeu" id="exampleRadios3" value="Perso">
                            <label class="form-check-label" for="exampleRadios3">
                              Perso
                            </label>
                          </div>
                            <br>
                        </div>
                            
                        <div class="form-group">
                              <button type="submit" class="btn btn-light btn-primary">S'inscrire</button>
                              <input type="reset" class="btn btn-light" value="Annuler">
                        </div>
            </form>

          </div>
        </div>

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>


