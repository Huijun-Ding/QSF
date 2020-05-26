<?php 
$Titre = $_POST['type'].": ".$_POST['titre'];   // récupéré les valeurs selon la méthode POST
$Description = $_POST['description'];
$DateButoire = $_POST['datebutoire'];
$Type = $_POST['type'];   
$DatePublicationB = date("yy/m/d");
$Satisfaisant = false;
$Categorie = $_POST['categorie'];

require_once('Fonctions.php');

$stmt = mysqli_prepare($session, "INSERT INTO besoins(TitreB,DescriptionB,DateButoireB,SatisfisantB,DatePublicationB,TypeB,CodeC) VALUES(?,?,?,?,?,?,?)");  //insérer les doonnées dans la base de données
mysqli_stmt_bind_param($stmt, 'sssissi', $Titre, $Description, $DateButoire, $Satisfaisant, $DatePublicationB, $Type, $Categorie);

if (mysqli_stmt_execute($stmt) === true) {
        echo "Votre besoin a bien été enregistré";
        header("Location: BesoinX.php");
} else {
        echo "Erreur: Votre besoin n'a pas été enregistré";
}
//ajouter codeb et codeu

?>