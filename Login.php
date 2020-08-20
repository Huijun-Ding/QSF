<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Se connecter</title>

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
                <h1 class="text-center">Se connecter</h1>

</div>
          <div class="container">
              <form class="form-signin" method = 'POST' action="IdentificationUtilisateur.php">

                  <center><br><br>
                    <label for="inputEmail" class="sr-only" >Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Votre adresse mail" required autofocus style="width:40%">
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Votre mot de passe" required style="width:40%">
                    <div class="checkbox mb-3">
                            <label>
                              <br><p><input type="checkbox" value="remember-me"> se souvenir de moi</p>
                              <p><a href="findmdp.html.php"> Mot de passe oublié </a></p> 
                              <p><a href="Inscription.php"> S'inscrire </a></p>            
                            </label>
                    </div>
		    <button class="btn btn-lg btn-light btn-block" type="submit" style="width:40%">Se connecter</button>
                  </center>
              </form>

          </div>
        </div>

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>

