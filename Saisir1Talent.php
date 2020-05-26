<?php 
require_once('Fonctions.php');

$TitreT = $_POST['typeT'].": ".$_POST['titreT'];
$DescriptionT = $_POST['descriptionT'];
$TypeT = $_POST['typeT']; 
$DatePublicationT = date("yy/m/d");
$Categorie = $_POST['categorieT'];

$stmt = mysqli_prepare($session, "INSERT INTO talents(TitreT,DescriptionT,DatePublicationT,TypeT,CodeC) VALUES(?,?,?,?,?)");  //insérer les doonnées dans la base de données
mysqli_stmt_bind_param($stmt, 'ssssi', $TitreT, $DescriptionT, $DatePublicationT, $TypeT, $Categorie);

if (mysqli_stmt_execute($stmt) === true) {
        echo "Votre talent a bien été enregistré";
        header("Location: TalentX.php");
} else {
        echo "Erreur: Votre talent n'a pas été enregistré";
}
//ajouter codeT et CodeU

?>