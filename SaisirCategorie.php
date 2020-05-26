<?php 
require_once('Fonctions.php');
/*session_start();
$useremail = $_SESSION['email'];

if (isset($useremail)){                    //récupérer la CodeU de la session actuelle
    $sql = "select CodeU from utilisateurs WHERE Email = '"."$useremail"."'";
    $usercode = mysqli_query($session, $sql);
    return $usercode;
    echo $sql;
}*/

$usercode = 1;

$checkbox1 = $_POST['inlineCheckbox1'];            //récupérer les codes catégories sélectionnés
$checkbox2 = $_POST['inlineCheckbox2'];
$checkbox3 = $_POST['inlineCheckbox3'];
$checkbox4 = $_POST['inlineCheckbox4'];
$checkbox5 = $_POST['inlineCheckbox5'];
$checkbox6 = $_POST['inlineCheckbox6'];
$checkbox7 = $_POST['inlineCheckbox7'];
$checkbox8 = $_POST['inlineCheckbox8'];
$checkbox9 = $_POST['inlineCheckbox9'];
$checkbox10 = $_POST['inlineCheckbox10'];

if (isset($_POST['inlineCheckbox1'])) {
    $stmt1 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");   // Puis les insérer dans le table  abonner
    mysqli_stmt_bind_param($stmt1, 'ii', $usercode, $checkbox1);
    mysqli_stmt_execute($stmt1); 
}

if (isset($_POST['inlineCheckbox2'])) {
    $stmt2 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt2, 'ii', $usercode, $checkbox2);
    mysqli_stmt_execute($stmt2); 
}

if (isset($_POST['inlineCheckbox3'])) {
    $stmt3 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt3, 'ii', $usercode, $checkbox3);
    mysqli_stmt_execute($stmt3); 
}

if (isset($_POST['inlineCheckbox4'])) {
    $stmt14 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt14, 'ii', $usercode, $checkbox4);
    mysqli_stmt_execute($stmt14); 
}

if (isset($_POST['inlineCheckbox5'])) {
    $stmt5 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt5, 'ii', $usercode, $checkbox5);
    mysqli_stmt_execute($stmt5); 
}

if (isset($_POST['inlineCheckbox6'])) {
    $stmt6 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt6, 'ii', $usercode, $checkbox6);
    mysqli_stmt_execute($stmt6); 
}

if (isset($_POST['inlineCheckbox7'])) {
    $stmt7 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt7, 'ii', $usercode, $checkbox7);
    mysqli_stmt_execute($stmt7); 
}

if (isset($_POST['inlineCheckbox8'])) {
    $stmt8 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt8, 'ii', $usercode, $checkbox8);
    mysqli_stmt_execute($stmt8); 
}

if (isset($_POST['inlineCheckbox9'])) {
    $stmt9 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt9, 'ii', $usercode, $checkbox9);
    mysqli_stmt_execute($stmt9); 
}

if (isset($_POST['inlineCheckbox10'])) {
    $stmt10 = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt10, 'ii', $usercode, $checkbox10);
    mysqli_stmt_execute($stmt10); 
}

header("Location: Accueil.php");
?>