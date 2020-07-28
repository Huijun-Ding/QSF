<?php
  $chaine = $_POST['titre'];

  $fp = fopen('Admin.php', 'r+');
  fputs($fp,$chaine);


  header("Location: Admin.php");

?>

