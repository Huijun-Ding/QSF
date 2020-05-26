<?php
        // 1. Connexion à la base de donnée
        //header('Content-Type: text/html; charset=latin1_swedich_ci');
        
        $nomlogin = 'root';                    // Ici, nous connectons avec le serveur local, si vous voulez le tester sur d'autre serveur, vous pouvez changer ces 3 variables
        $nompasswd = '';
        $nombase = 'talentland';

        $session = mysqli_connect('localhost', $nomlogin, $nompasswd ); 

        if ($session == NULL) // Test de connexion n'est pas réussié
          {
                  echo ("<p>Echec de connection</p>");
          } 
        else 
         {
                // Sélection de la base de donnée
                 if (mysqli_select_db($session, $nombase) == TRUE) { 
                            //echo ("Connection Réussite</br>");
            }
                else 
             {
                            echo ("Cette base n'existe pas</br>");
                    }  
         }

        // 2. Fonction vérification l'existnce d'email
        
            
            function is_unique_login($session,$Email){
                $stmt = mysqli_prepare($session, "SELECT Email from utilisateurs where Email = ?");
                mysqli_stmt_bind_param($stmt, "s", $Email);
                mysqli_stmt_execute($stmt);
                if(mysqli_stmt_fetch($stmt)==TRUE){
                    return False;
                } else {
                    return True;
                }
            }
        
        // 3. Session utilisateur
            session_start();
            
            if(isset($_SESSION['email'])){
                if(isset($_SESSION['anonyme'])){
                    echo('<a href=\"Deconnecter.php\"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>');
                    echo "Utilisateur Anonyme";    // quand l'utiliateur a croché le case Anonyme au moment de l'inscription, on va afficher Utilisateur Anonyme
                    echo('</button>');
                } else {
                    echo('<a href=\"Deconnecter.php\"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>');
                    echo $_SESSION['email'];       // quand l'utiliateur n'a pas croché le case Anonyme au moment de l'inscription, on va afficher son adresse mail
                    echo('</button>');
                }
            } else {
                echo('<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">');
                echo "Visiteur ";                   //Utilisateur qui n'a pas conncté
                echo('</button>');
            }
         
?>


