<!doctype html>
<html lang="fr">
<head>
    
<!-- Link -->
 <?php require "link.php"; ?>
<!-- Link -->

<title>Talent non</title>

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
                <h1 class="text-center">Talent non</h1>

</div>
          <div class="container">
              <h1>Pourquoi ?</h1><hr>
              <p>Veuillez sélectionner une raison de refuse : </p><br>
              <?php echo ('<form action="talentnon.fonction.php" method="GET">'); ?>
                  
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="raison_non_talent" id="talent_raison1" value="Je ne suis pas libre" checked>
                  <label class="form-check-label" for="talent_raison1">
                    Je ne suis pas libre
                  </label>
                </div><br>
                
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="raison_non_talent" id="talent_raison2" value="Je serais disponible à partir du ">
                  <label class="form-check-label" for="talent_raison2">
                    Je serais disponible à partir du   
                  </label>
                  <input type="date" name="datedispo">
                </div><br>  

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="raison_non_talent" id="talent_raison3" value="">
                  <label class="form-check-label" for="talent_raison3">
                    Autre raison (veuillez préciser) 
                  </label><br>
                  <textarea name="autre_raison" rows="4" cols="50"></textarea>
                </div><br>
                <?php
                echo '<input type="hidden" name="c" value="'.$_GET['c'].'">';
                echo '<input type="hidden" name="p" value="'.$_GET['p'].'">';
                ?>               
                <button type="submit" class="btn btn-primary">Envoyer</button>
                
              </form>
              <hr>      
          </div>
        </div>

<!-- footer -->
 <?php require "footer.php"; ?>
<!-- Fin footer -->

</body>
</html>