<?php
require_once('Fonctions.php');

$DateEB = date("yy/m/d");

//ajouter une évaluation besoin
$sql = "INSERT INTO evaluerb(NoteB,AvisB,DateEB,CodeU,CodeB) VALUES({$_POST["rating"]},'{$_POST["avis"]}','{$DateEB}',{$_POST['codeu']},{$_POST['besoin']})";
mysqli_query ($session, $sql);
?>
<script type="text/javascript">
    alert("Merci d'avoir évaluer !");
    document.location.href = 'index.php';
</script> 