<?php 
require_once('Fonctions.php');

$TitreT = $_POST['typeT'].": ".$_POST['titreT'];
$DescriptionT = $_POST['descriptionT'];
$TypeT = $_POST['typeT']; 
$DatePublicationT = date("yy/m/d");
$Categorie = $_POST['categorieT'];

$stmt = mysqli_prepare($session, "INSERT INTO talents(TitreT,DescriptionT,DatePublicationT,TypeT,CodeC) VALUES(?,?,?,?,?)");  //insérer un nouveau talet dans le table talents
mysqli_stmt_bind_param($stmt, 'ssssi', $TitreT, $DescriptionT, $DatePublicationT, $TypeT, $Categorie);

if (mysqli_stmt_execute($stmt) === true) {
        echo "Votre talent a bien été enregistré";
        header("Location: MonProfil.php");
} else {
        echo "Erreur: Votre talent n'a pas été enregistré";
}
//ajouter codeT et CodeU dans le table proposer
    $sql = "select CodeT from talents order by CodeT DESC limit 1";
    $result = mysqli_query ($session, $sql);
    if ($code = mysqli_fetch_array($result)) {   
        $codet = $code['CodeT'];
        $stmt2 = mysqli_prepare($session, "INSERT INTO proposer(CodeU,CodeT) VALUES(?,?)");   // insérer le code de l'utilisateur et le code de catégorie dans le table abonner
        mysqli_stmt_bind_param($stmt2, 'ii', $usercode, $codet);
        mysqli_stmt_execute($stmt2); 
    }  
?>