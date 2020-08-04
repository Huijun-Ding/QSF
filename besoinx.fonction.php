<?php
    require_once('Fonctions.php');
    
        //Diriger vers auelle page ?
    if(isset($_GET['c'])){
       $increment = "update besoins set Nombre = Nombre + 1 where CodeB = {$_GET['c']}";
       mysqli_query ($session, $increment);
    
    }
 ?>
    <script>
        alert("Vous avez sollicité ce besoin !");
        window.history.back();
    </script>


