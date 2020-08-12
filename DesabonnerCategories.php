<?php 
require_once('Fonctions.php');

    if (isset($_POST['categorie'])) { 
             foreach ($_POST["categorie"] as $categories) {                  
                $stmt = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");   // insérer le code de l'utilisateur et le code de catégorie dans la table abonner
                mysqli_stmt_bind_param($stmt, 'i', $categories);
                mysqli_stmt_execute($stmt); 
             }
        }

header("Location: MesCategories.php");

     
?>