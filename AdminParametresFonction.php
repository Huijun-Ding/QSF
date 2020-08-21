<?php
    require_once 'Fonctions.php';
    
    // modifier le délais d'évaluation
    $query="UPDATE `parametres` SET `Interval` = {$_GET['interval']}";
    mysqli_query ($session, $query);
    header("Location:Admin.php");
?>
