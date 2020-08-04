<?php
require_once 'Fonctions.php';

$sql = "insert into compteurt (NumOuiT, NumNonT) VALUES(1, 0)";
$result = mysqli_query ($session, $sql);  
header("Location: index.php");

?>
