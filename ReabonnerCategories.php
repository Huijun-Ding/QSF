<?php 
require_once('Fonctions.php');

$usercode = 1;

$query = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeU` = 1");
mysqli_stmt_execute($query);
/*
$query = mysqli_prepare($session, "DELETE FROM `abonner` WHERE `CodeU` = .'$usercode.'");
mysqli_stmt_bind_param($query, 'i', $usercode);
mysqli_stmt_execute($query);

  $query = "DELETE FROM `abonner` WHERE `CodeU` = .'$usercode.'";
  if($session->query($query))
  {
      header("location:work.php");
 //echo "<script>alert('删除成功')</script>";
  }
  else
  {
      echo "删除失败！";
  }
?> */


$codec = $_POST['inlineCheckbox'];            //récupérer les codes catégories sélectionnés

if (isset($_POST['inlineCheckbox'])) {
    $stmt = mysqli_prepare($session, "INSERT INTO abonner(CodeU,CodeC) VALUES(?,?)");   // Puis les insérer dans le table  abonner
    mysqli_stmt_bind_param($stmt, 'ii', $usercode, $codec);
    mysqli_stmt_execute($stmt); 
}

/*header("Location: MesCategories.php");*/
?>