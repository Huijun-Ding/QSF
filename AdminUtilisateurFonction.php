<?php 
    require_once('Fonctions.php');
  /* Rendre l'utilisateur et tous ses cartes, catégories en anonyme */
  /* tous ses cartes */
 
    if (isset($_POST['codeu'])) {
        $S1 = mysqli_prepare($session, "UPDATE besoins INNER JOIN saisir ON besoins.CodeB = saisir.CodeB SET besoins.VisibiliteB = 0 WHERE saisir.CodeU = ?");
        mysqli_stmt_bind_param($S1, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S1);

        $S2 = mysqli_prepare($session, "UPDATE talents INNER JOIN proposer ON talents.CodeT = proposer.CodeT SET talents.VisibiliteT = 0 WHERE proposer.CodeU = ?");
        mysqli_stmt_bind_param($S2, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S2);

        /* tous ses categories */

        $S3 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeU` = ? ");
        mysqli_stmt_bind_param($S3, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S3);

         /* le compte */

        $S4 = mysqli_prepare($session, "UPDATE utilisateurs SET Anonyme = 0 WHERE CodeU = ?");
        mysqli_stmt_bind_param($S4, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S4);

        $S5 = mysqli_prepare($session, "UPDATE utilisateurs SET Email = 'XXXXX' WHERE CodeU = ?");
        mysqli_stmt_bind_param($S5, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S5);

        $S6 = mysqli_prepare($session, "UPDATE utilisateurs SET NomU = 'XXXXX' WHERE CodeU = ?");
        mysqli_stmt_bind_param($S6, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S6);

        $S7 = mysqli_prepare($session, "UPDATE utilisateurs SET PrenomU = 'XXXXX' WHERE CodeU = ?");
        mysqli_stmt_bind_param($S7, 'i', $_POST['codeu']);
        mysqli_stmt_execute($S7);
    }
   

    header("Location: Admin.php")
?>