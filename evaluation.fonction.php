<?php
require_once('Fonctions.php');

/*$stmt = mysqli_prepare($session, "INSERT INTO evaluation(Note,Avis) VALUES(?,?)");   
mysqli_stmt_bind_param($stmt, 'is', $_POST["rating"],$_POST["avis"]);
if (mysqli_stmt_execute($stmt) == true) {
    header("Location: Accueil.php");
} else {
    echo 'erreur, veuillez réessayer';
}*/
if (isset($note) or isset($avis)){
    $sql = "INSERT INTO evaluation(Note,Avis) VALUES({$_POST["rating"]},'{$_POST["avis"]}') ";
    mysqli_query ($session, $sql);
}
?>