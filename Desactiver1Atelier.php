<?php 
require_once('Fonctions.php');

        $CodeA = $_POST['codeA'];

        $S2 = mysqli_prepare($session, "UPDATE ateliers SET VisibiliteA = 0 WHERE CodeA = ?");
        mysqli_stmt_bind_param($S2, 'i', $CodeA);
        mysqli_stmt_execute($S2);

      header("Location: MonProfil.php");
?>