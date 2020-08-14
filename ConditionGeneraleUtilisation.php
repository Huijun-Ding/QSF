<!doctype html>
<html lang="fr">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173955301-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-173955301-1');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
​    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>COUP DE MAIN, COUP DE POUCE</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">COUP DE MAIN, COUP DE POUCE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil<!--<span class="sr-only">(current)</span>--></a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Besoin.php">Besoins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Talent.php">Talents</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="Atelier.php">Ateliers</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="Projet.php">Projets</a>
          </li>                
          <li class="nav-item">
            <a class="nav-link" href="AbonnerCategorie.php">Catégories</a>
          </li> 
        </ul>
          
          <form  method="get">
          <?php
            /*require_once 'Fonctions.php';
            
            if (empty($_SESSION['email'])){
                echo ('<div class="btn-group" role="group" aria-label="Basic example">');
                echo ('<button type="radio" id="tout" class="btn btn-secondary btn-sm" name="tout">Tout</button>');
                echo ('<button type="radio" id="pro" class="btn btn-secondary btn-sm" name="pro" value="Pro">Pro</button>');   
                echo ('<button type="radio" id="perso" class="btn btn-secondary btn-sm" name="perso" value="Perso">Perso</button>');               
                echo ('</div>');
            } */
          ?>
          </form>      
                   
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft">   
            <?php
            require_once 'Fonctions.php';
    
            if(isset($_SESSION['email'])){    
                
                $query = "select SUM(b.ReponseB) + SUM(t.ReponseT) as Reponse from besoins b, saisir s, talents t, proposer p where s.CodeB = b.CodeB and t.CodeT = p.CodeT and p.CodeU = {$usercode} and s.CodeU = {$usercode}";
                $result = mysqli_query ($session, $query);
                
                while ($ligne = mysqli_fetch_array($result)) { 
                    if ($ligne["Reponse"] > 0) {
                        echo ('<span class="badge badge-danger">Nouveau message</span>');                           
                    } 
                }    
                    echo('<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                    $prenom = "select PrenomU from utilisateurs where CodeU = {$usercode} ";
                    $result = mysqli_query ($session, $prenom);
                    while ($prenom = mysqli_fetch_array($result)) {      
                        echo $prenom['PrenomU'];       // Afficher le prénom d'un utilisateur
                    }
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
                    if(isset($_SESSION['role'])) {
                        echo ('<a class="dropdown-item" href="Admin.php">Espace admin</a>');
                        echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');                       
                    } else {
                        echo ('<a class="dropdown-item" href="MonProfil.php">Mon profil</a>');
                        echo ('<a class="dropdown-item" href="MesCategories.php">Mes catégories</a>');
                        echo ('<a class="dropdown-item" href="Deconnecter.php" onclick="Deconnexion()">Déconnecter</a>');
                    }
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
			
            <h1> Condition Générale d'Utilisation </h1>
            <hr>
            <a>Le Site désigne le site internet Quai des savoirs faire édité par la société CPAM 31. Le terme utilisateur désigne l’ensemble des internautes, inscrits ou non, qui naviguent sur le Site. </a>
            <br><a>Le Site présente sa charte de bonne conduite. C’est une plateforme d’échange de compétences entre collaborateurs de la CPAM 31.</a>
            <br><a>Toute information communiquée, échangée ou partagée sur le site ne doit en aucun cas être illégale, préjudiciable, menaçante, délictuelle, diffamatoire, injurieuse, vulgaire ou contraire aux bonnes mœurs ou porter atteinte à la vie privée d’une personne. </a>
            <br><a>L’équipe se réserve le droit de supprimer toute mention ne respectant pas ces exigences et de bannir leurs auteurs.</a>
            <br><a>Nous vous remercions vivement de l'attention que vous porterez à cette charte que nous diffusons afin que les supports produits ou animés par la plateforme restent un espace d'expression et d'échanges respectant les valeurs du Site. </a>
            <br><a>Le niveau d’expertise des utilisateurs proposant une compétence ou un savoir-faire n’engage que celui-ci. </a><br>
            
            <br><h3>Article 1 : Champ d’application </h3>
            <br><a>Les présentes Conditions Générales d’Utilisation régissent les relations contractuelles entre tout utilisateur du Site. L’utilisateur est invité à lire avec la plus grande attention le présent document et de renouveler sa lecture à chaque fois qu’il consulte le Site. En effet, l’utilisation du Site constitue son acceptation des dites conditions générales d’utilisations. A cet égard, pour toute question concernant le Site, vous pouvez contacter le webmaster : [Lien vers formulaire de contact]. </a>
            <br><a>Les conditions générales présentées ici peuvent être modifiées afin de prendre en compte des changements liés à la législation française ou la modification de logiciels du site. Une consultation de ces Conditions Générales d’Utilisation doit donc être réalisée régulièrement par l’utilisateur. </a>
            <br><a>Chaque inscrit s’engage à respecter cette charte en cochant son acceptation lors de la création de son compte. </a><br>
            
            
            <br><h3>Article 2 : Droit de propriété intellectuelle</h3>
            <br><a>La Société Editrice du Site est le propriétaire exclusif de tous les droits de propriété intellectuelle portant tant sur la structure que sur le contenu du Site. Tous les éléments figurant sur le présent Site (images, bases de données, marques, illustrations, logos, dessins, modèles, mise en page, documents téléchargeables) sont protégés en tant qu’œuvres de l’esprit par la législation française et internationale sur le droit d’auteur et la propriété intellectuelle. Sauf autorisation préalable et écrite, toute reproduction, représentation, adaptation, modification partielle ou intégrale de tout élément composant le Site, par quelque moyen que ce soit, est interdite sous peine de poursuite judiciaire. </a>
            <br><a>Toute utilisation dans un cadre professionnel ou commercial ou toute commercialisation de ce contenu auprès de tiers est interdite, sauf accord exprès de la CPAM 31. </a><br>
            
            <br><h3>Article 3 : Responsabilité </h3>
            <br><a>Les services proposés sont conformes à la législation française en vigueur. Les photographies et les textes reproduits et illustrant les produits et services présentés ne sont pas contractuels. En conséquence, la responsabilité de la CPAM 31 ne saurait être engagée en cas d’erreur dans l’une de ces photographies ou l’un de ces textes. Les éventuels liens figurant dans le Site et renvoyant vers des sites externes sont fournis à titre informatif. La CPAM 31 ne saurait être tenue pour responsable du contenu de ces sites externes référencés. </a><br>
            <br><h4>Informations nominatives et données personnelles</h4>
            <br><a>La CPAM 31 s’engage à respecter la réglementation en vigueur applicable au traitement de données à caractère personnel et, en particulier, le règlement (UE) 2016/679 du Parlement européen et du Conseil du 27 avril 2016 applicable à compter du 25 mai 2018 (ci-après, « le règlement européen sur la protection des données » ou RGPD). </a><br>
            
            <br><h3>Article 4 : Données personnelles </h3>
            <br><a>La CPAM 31 traite uniquement les données à caractère personnel de ses utilisateurs. Ces données correspondent aux données fournies lors de la création du compte depuis notre site : email professionnel et personnel, nom et prénom de la personne. Ces données font l’objet d’un traitement qui a pour finalité de permettre à l’utilisateur de se créer un profil utilisateur et d’accéder à ses services. Les finalités du traitement par la CPAM 31 sont la prise de contact (contact email, alerte email) afin de fournir les informations nécessaires à la bonne exécution des services. </a><br>
            <br><h4>Exercice des droits</h4>
            <br><a>Conformément à la loi de 1978 Informatique et Libertés modifiée, l’utilisateur dispose du droit d’accès, de modification des informations qui le concernent. Les utilisateurs du site disposent d’un droit d’accès et de rectification aux données les concernant. Vous disposez d’un droit d’information, de rectification et de modification de vos données personnelles. Vous pouvez nous demander la modification et la suppression de vos données. Pour exercer vos droits, vous pouvez contacter le DPO de la CPAM: dpo.cpam-toulouse@assurance-maladie.fr </a><br>
            <br><h4>Responsabilité </h4>
            <br><a>La CPAM 31 décline toute responsabilité en cas de transmission volontaire ou involontaire par l’utilisateur à un tiers des codes d’accès qu’il lui appartient de conserver en lieu sûr et dont l’utilisation par un tiers pourrait entrainer la divulgation, l’altération ou la suppression des données personnelles de l’utilisateur. La CPAM 31 s’engage à garantir la confidentialité des données à caractère personnel et veiller à ce que les personnes autorisées à traiter les données à caractère personnel : </a><br>
            <ul>
                <li>S’engagent à respecter la confidentialité ou soient soumises à une obligation légale appropriée de confidentialité ; </li>
                <li>Reçoivent la formation nécessaire en matière de protection des données à caractère personnel ; </li>
                <li>Prennent en compte les principes de protection des données par défaut.</li>
            </ul>
            <br><h4>Sécurité des données </h4>
            <br><a>De plus, la CPAM 31 a confié l’hébergement de son Site à la société OVH pour assurer la sécurité des données personnelles confiées par ses utilisateurs, les données de nos utilisateurs sont stockées que sur les bases de données du Site, l’infrastructure hardware et software sur laquelle les sites sont hébergés est conçue pour garantir une sécurité absolue des données (antivirus, switch, routeurs, serveurs et firewalls redondants). </a>
            
          </div>
        </div>        

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