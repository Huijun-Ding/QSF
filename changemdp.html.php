<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Modifier le mot de passe</title>

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
                <h1 class="text-center">Modifier le mot de passe</h1>

</div>
          <div class="container">
              <h1>Modifier le mot de passe</h1><hr><br>
            <form action="changemdp.fonction.php" method="POST">
                <p>Nouveau mot de passe : <input type="text" name="newmdp1"></p><br>
                <p>Confirmation de nouveau mot de passe : <input type="text" name="newmdp2"></p><br>
                <input type="submit" value="Modifier" class="btn btn-primary">
                <a href="MonProfil.php"><input type="reset" value="Annuler" class="btn btn-dark"></a>
            </form>
          </div>
        </div>
        
<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>