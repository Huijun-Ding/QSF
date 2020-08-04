            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">

                 <!--First slide-->
                <div class="carousel-item active">
                  <img src="https://r1pbk8s6fm-flywheel.netdna-ssl.com/wp-content/uploads/2018/04/map-connectivity-1200x400.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue !</h1>
                    <h5>Une plateforme qui permet de partager les compétences entre collaborateurs.</h5>
                    <hr class="my-4">
                    <p>Partageons nos talents, la solitarité c'est aussi entre nous.</p>
                    <button class="btn btn-light" onclick="document.location='https://notmoebius.github.io/quaidessavoirfaire/'">En savoir plus</button>
                    <p><br></p>
                  </div>
                </div>
                <!--First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                  <img src="https://www.bravopromo.fr/cdn/blog/1200x400/le-green-friday-par-bravopromo-201911151231-preview.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h1>Oui, vous avez des talents !</h1>
                    <hr class="my-4">
                    <?php
                    require_once('Fonctions.php');

                    if(isset($_SESSION['email'])){
                        echo ('<button class="btn btn-light" onclick="document.location="https://eva.beta.gouv.fr/"">Ulitiser EVA pour faire éclorer vos talents.</button>');
                    } else {
                        echo ('<button class="btn btn-light" onclick="document.location="Login.php"">Ulitiser EVA pour faire éclorer vos talents.</button>');
                    }
                    ?>
                    <p><br></p>
                  </div>
                </div>
                <!--Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                  <img src="https://gray-ktuu-prod.cdn.arcpublishing.com/resizer/gDT0TCs6HrkaegOnMo6p0ZZX694=/1200x400/smart/cloudfront-us-east-1.images.arcpublishing.com/gray/3BWLQZ7DZ5NMFF35HJEJ7KFTR4.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h1>Nouvelle du jour</h1>
                    <hr class="my-4">
                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content,Some quick example text to build on the card title and make up the bulk of the card's content,Some quick example text to build on the card title and make up the bulk of the card's content,Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p><br></p>
                  </div>
                </div> 
                <!--Third slide-->  

                <!--Fourth slide-->
                <div class="carousel-item">
                  <img src="https://i.pinimg.com/originals/d1/a5/d3/d1a5d3d96f0862664846c7800e3c8aff.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h1>Retours d'expériences des utilisateurs</h1>
                    <hr class="my-4">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="card mb-2">
                        <div class="card-body">
                          <h4 class="text-secondary">Utilisateur 1</h4>
                          <p class="text-secondary">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <div class="card-body">
                          <h4 class="text-secondary">Utilisateur 2</h4>
                          <p class="text-secondary">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <div class="card-body">
                          <h4 class="text-secondary">Utilisateur 3</h4>
                          <p class="text-secondary">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p><br></p>
                  </div>
                </div>
                <!--Fourth slide-->

              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Prochaine</span>
              </a>
            </div>