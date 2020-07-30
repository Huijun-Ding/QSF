<?php
    require_once('Fonctions.php');
    if(isset($_GET['c'])){
       $increment = "update besoins set Nombre = Nombre + 1 where CodeB = {$_GET['c']}";
       mysqli_query ($session, $increment);
       header("location:Besoin.php");
    }
?>

