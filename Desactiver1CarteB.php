<?php 
require_once('Fonctions.php');

        $CodeB = $_POST['codeB'];

        $S2 = mysqli_prepare($session, "UPDATE besoins SET VisibiliteB = 0 WHERE CodeB = ?");
        mysqli_stmt_bind_param($S2, 'i', $CodeB);
        mysqli_stmt_execute($S2);

        header("Location: MonProfil.php")
?>