<?php 
require_once('Fonctions.php');

$checkbox1 = $_POST['1'];            //récupérer les codes catégories sélectionnés
$checkbox2 = $_POST['2'];
$checkbox3 = $_POST['3'];
$checkbox4 = $_POST['4'];
$checkbox5 = $_POST['5'];
$checkbox6 = $_POST['6'];
$checkbox7 = $_POST['7'];
$checkbox8 = $_POST['8'];
$checkbox9 = $_POST['9'];
$checkbox10 = $_POST['10'];


if (isset($_POST['1'])) {
    $stmt1 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");   // insérer le code de l'utilisateur et le code de catégorie dans la table abonner
    mysqli_stmt_bind_param($stmt1, 'ii', $usercode, $checkbox1);
    mysqli_stmt_execute($stmt1); 
}

if (isset($_POST['2'])) {
    $stmt2 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt2, 'ii', $usercode, $checkbox2);
    mysqli_stmt_execute($stmt2); 
}

if (isset($_POST['3'])) {
    $stmt3 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");   // Pourquoi ça marche pas pour les deux mots ?????
    mysqli_stmt_bind_param($stmt3, 'ii', $usercode, $checkbox3);
    mysqli_stmt_execute($stmt3); 
}

if (isset($_POST['4'])) {
    $stmt4 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt4, 'ii', $usercode, $checkbox4);
    mysqli_stmt_execute($stmt4); 
}

if (isset($_POST['5'])) {
    $stmt5 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt5, 'ii', $usercode, $checkbox5);
    mysqli_stmt_execute($stmt5); 
}

if (isset($_POST['6'])) {
    $stmt6 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt6, 'ii', $usercode, $checkbox6);
    mysqli_stmt_execute($stmt6); 
}

if (isset($_POST['7'])) {
    $stmt7 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt7, 'ii', $usercode, $checkbox7);
    mysqli_stmt_execute($stmt7); 
}

if (isset($_POST['8'])) {
    $stmt8 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt8, 'ii', $usercode, $checkbox8);
    mysqli_stmt_execute($stmt8); 
}

if (isset($_POST['9'])) {
    $stmt9 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt9, 'ii', $usercode, $checkbox9);
    mysqli_stmt_execute($stmt9); 
}

if (isset($_POST['10'])) {
    $stmt10 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt10, 'ii', $usercode, $checkbox10);
    mysqli_stmt_execute($stmt10); 
}

header("Location: MesCategories.php");
?>