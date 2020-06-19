<?php
require_once 'Fonctions.php';

$retype = $_POST['switch-two'];  //type choisi dans mon espace via la boutton radio

$stmt = mysqli_prepare($session, 'UPDATE `utilisateurs` SET `TypeU` = ? WHERE `utilisateurs`.`CodeU` = ? ; ');   // Connecter et vérification de mot de passe
mysqli_stmt_bind_param($stmt, "si", $retype, $usercode);
mysqli_stmt_execute($stmt);

header("Location: MonProfil.php");
?>    