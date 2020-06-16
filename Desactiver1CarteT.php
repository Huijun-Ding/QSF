<?php 
require_once('Fonctions.php');

        $CodeT = $_POST['codeT'];

        $S4 = mysqli_prepare($session, "UPDATE talents SET VisibiliteT = 0 WHERE CodeT = ?");
        mysqli_stmt_bind_param($S4, 'i', $CodeT);
        mysqli_stmt_execute($S4);

        header("Location: MonProfil.php");
      



 

?>