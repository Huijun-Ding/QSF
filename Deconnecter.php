<?php
session_start();
session_destroy();
header('location: Accueil.php');
exit;
?>
