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
    $S1 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S1, 'i', $checkbox1);
    mysqli_stmt_execute($S1);
}

if (isset($_POST['2'])) {
    $S2 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S2, 'i', $checkbox2);
    mysqli_stmt_execute($S2);
}

if (isset($_POST['3'])) {
    $S3 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S3, 'i', $checkbox3);
    mysqli_stmt_execute($S3);
}

if (isset($_POST['4'])) {
    $S4 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S4, 'i', $checkbox4);
    mysqli_stmt_execute($S4);
}

if (isset($_POST['5'])) {
    $S5 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S5, 'i', $checkbox5);
    mysqli_stmt_execute($S5);
}

if (isset($_POST['6'])) {
    $S6 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S6, 'i', $checkbox6);
    mysqli_stmt_execute($S6);
}

if (isset($_POST['7'])) {
    $S7 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S7, 'i', $checkbox7);
    mysqli_stmt_execute($S7);
}

if (isset($_POST['8'])) {
    $S8 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S8, 'i', $checkbox8);
    mysqli_stmt_execute($S8);
}

if (isset($_POST['9'])) {
    $S9 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S9, 'i', $checkbox9);
    mysqli_stmt_execute($S9);
}

if (isset($_POST['10'])) {
    $S10 = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeC` = ? ");
    mysqli_stmt_bind_param($S10, 'i', $checkbox10);
    mysqli_stmt_execute($S10);
}

header("Location: MesCategories.php");
?>