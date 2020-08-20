<?php
require_once 'Fonctions.php'; 

$retype = $_POST['switch-two'];  //modifier le type d'utilisateur dans mon espace via la boutton radio
echo $retype;

$stmt = mysqli_prepare($session, 'UPDATE `utilisateurs` SET `TypeU` = ? WHERE `utilisateurs`.`CodeU` = ? ; ');   
mysqli_stmt_bind_param($stmt, "si", $retype, $usercode);

if (mysqli_stmt_execute($stmt) == TRUE) {
  header("Location: MonProfil.php");
} 

?>    