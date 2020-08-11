<?php
require_once('Fonctions.php');

$DateET = date("yy/m/d");

$sql = "INSERT INTO evaluert(NoteT,AvisT,DateET,CodeU,CodeT) VALUES({$_POST["rating"]},'{$_POST["avis"]}','{$DateET}',{$_POST['codeu']},{$_POST['talent']})";
mysqli_query ($session, $sql);
?>
<script type="text/javascript">
    alert("Merci d'avoir évaluer !");
    document.location.href = 'index.php';
</script> 

