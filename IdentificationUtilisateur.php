<?php
require_once('Fonctions.php');

if(isset($_POST['email'])){
    $Email = $_POST['email'];
    $Password = $_POST["password"];
    
    $sql = "SELECT RoleU from utilisateurs where Email = '{$Email}'";
    $result = mysqli_query ($session, $sql);
    
    if (mysqli_num_rows($result)>0) {
      while ($ligne = mysqli_fetch_array($result)) {   

        if (isset($ligne['RoleU'])) {
            $stmt = mysqli_prepare($session, "SELECT MotDePasse FROM utilisateurs WHERE Email=?");   // Connecter et vérification de mot de passe
            mysqli_stmt_bind_param($stmt, "s", $Email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $good_password);
            mysqli_stmt_fetch($stmt);

            if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session 
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                $_SESSION['role'] = 'admin';
                ?>
                <script>
                    window.history.back();
                </script>
            <?php
            } else {
                ?>
           <script type="text/javascript">
               alert("Mauvais mot de passe ! \n Veuillez réessayer. ");
               document.location.href = 'Login.php';
           </script>
           <?php
           }                  
        } else {
            $stmt = mysqli_prepare($session, "SELECT MotDePasse FROM utilisateurs WHERE Email=?");   // Connecter et vérification de mot de passe
            mysqli_stmt_bind_param($stmt, "s", $Email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $good_password);
            mysqli_stmt_fetch($stmt);

            if(password_verify($Password,$good_password)) {    // si le mot de passe est bon, ouvert la session 
                session_start();
                $_SESSION['email'] = $Email;
                $_SESSION['password'] = $Password;
                ?>
                <script>
                    window.history.back();
                </script>
            <?php
            } else {
                 ?>
            <script type="text/javascript">
                alert("Mauvais mot de passe ! \n Veuillez réessayer. ");
                document.location.href = 'Login.php';
            </script>
            <?php
            }   
        }
    }
        } else {
             ?>
            <script type="text/javascript">
                alert("Cet Email n\'existe pas ! \n Veuillez créer un compte. ");
                document.location.href = 'Login.php';
            </script>
            <?php
        }
}
 ?>
        
