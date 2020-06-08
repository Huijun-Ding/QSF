<?php 
require_once('Fonctions.php');
    
    $CodeB = $_POST['code'];
    
    $S1 = mysqli_prepare($session, "DELETE FROM `besoins` WHERE `CodeB` = ? ");
    mysqli_stmt_bind_param($S1, 'i', $CodeB);
    mysqli_stmt_execute($S1);




?>