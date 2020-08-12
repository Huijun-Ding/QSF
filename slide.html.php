<?php
require_once('Fonctions.php');

    echo '<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">';

         //<!--First slide-->
    $query1 = "select * from slides WHERE NumSlide = 1 ";
    $result1 = mysqli_query ($session, $query1);
    if ($slide1 = mysqli_fetch_array($result1)) {    
        echo '<div class="carousel-item active">
          <img src="'.$slide1['PhotoS'].'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>'.$slide1['TitreS'].'</h1>
            <h5>'.$slide1['TextS1'].'</h5>
            <hr class="my-4">
            <p>'.$slide1['TextS2'].'</p>
            <button class="btn btn-light" onclick="document.location=\'https://qualif-qsf.cpam31.fr/lp/index.php\'">En savoir plus</button>
            <p><br></p>
          </div>
        </div>';
    }
    
        //<!--Second slide-->
    $query2 = "select * from slides WHERE NumSlide = 2 ";
    $result2 = mysqli_query ($session, $query2);
    if ($slide2 = mysqli_fetch_array($result2)) {    
        echo '<div class="carousel-item">
          <img src="'.$slide2['PhotoS'].'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>'.$slide2['TitreS'].'</h1>
            <hr class="my-4">';
            if(isset($_SESSION['email'])){
                echo ('<button class="btn btn-light" onclick="document.location="https://eva.beta.gouv.fr/"">Ulitiser EVA pour faire éclorer vos talents.</button>');
            } else {
                echo ('<button class="btn btn-light" onclick="document.location="Login.php"">Ulitiser EVA pour faire éclorer vos talents.</button>');
            }
        echo '<p><br></p>
          </div>
        </div>';
    }
    
        //<!--Third slide-->
    $query3 = "select * from slides WHERE NumSlide = 3 ";
    $result3 = mysqli_query ($session, $query3);
    if ($slide3 = mysqli_fetch_array($result3)) { 
        echo '<div class="carousel-item">
          <img src="'.$slide3['PhotoS'].'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>'.$slide3['TitreS'].'</h1>
            <hr class="my-4">
            <p>'.$slide3['TextS1'].'</p>
            <p><br></p>
          </div>
        </div> ';
    }
    
        //<!--Fourth slide-->
    $query4 = "select * from slides WHERE NumSlide = 4 ";
    $result4 = mysqli_query ($session, $query4);
    if ($slide4 = mysqli_fetch_array($result4)) {     
        echo '<div class="carousel-item">
          <img src="'.$slide4['PhotoS'].'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1>'.$slide4['TitreS'].'</h1>
            <hr class="my-4">';

        echo '  <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <h4 class="text-secondary">“</h4>
                  <p class="text-secondary">'.$slide4['TextS1'].'</p>
                  <h4 class="text-secondary">”</h4>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <div class="card-body">
                  <h4 class="text-secondary">“</h4>
                  <p class="text-secondary">'.$slide4['TextS2'].'</p>
                  <h4 class="text-secondary">”</h4>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <div class="card-body">
                  <h4 class="text-secondary">“</h4>
                  <p class="text-secondary">'.$slide4['TextS3'].'</p>
                  <h4 class="text-secondary">”</h4>
                </div>
              </div>
            </div>';
    }              
        echo '  </div>
          <p><br></p>
          </div>
        </div>';

    echo '  </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Prochaine</span>
      </a>
    </div>';
?>