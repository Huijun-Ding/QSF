<?php
    require_once('Fonctions.php');
    
        //Diriger vers auelle page ?
    if(isset($_GET['c'])){
       $increment = "update besoins set Nombre = Nombre + 1 where CodeB = {$_GET['c']}";
       mysqli_query ($session, $increment);
       
       $query = "insert into saisir(CodeU, CodeB) values({$_SESSION['codeu']},{$_GET['c']})";
       mysqli_query ($session, $query);
    }
 ?>
    <script>
        alert("Vous avez sollicité ce besoin !");
        document.location.href = "Besoin.php";
    </script>


