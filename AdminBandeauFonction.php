<?php
  require_once 'Fonctions.php';
  
  if (!empty($_POST['slide1_1'])) {
        $query1 = "UPDATE slides SET TitreS = '{$_POST['slide1_1']}' WHERE NumSlide = 1 ";
        mysqli_query ($session, $query1);
  }
  
  if (!empty($_POST['slide1_2'])) {
        $query2 = "UPDATE slides SET PhotoS = '{$_POST['slide1_2']}' WHERE NumSlide = 1 ";
        mysqli_query ($session, $query2);
  } 
  
  if (!empty($_POST['slide1_3'])) {
        $query3 = "UPDATE slides SET TextS1 = '{$_POST['slide1_3']}' WHERE NumSlide = 1 ";
        mysqli_query ($session, $query3);
  } 
  
  if (!empty($_POST['slide1_4'])) {
        $query4 = "UPDATE slides SET TextS2 = '{$_POST['slide1_4']}' WHERE NumSlide = 1 ";
        mysqli_query ($session, $query4);
  } 
  
  if (!empty($_POST['slide2_1'])) {
        $query5 = "UPDATE slides SET TitreS = '{$_POST['slide2_1']}' WHERE NumSlide = 2 ";
        mysqli_query ($session, $query5);
  } 
  
  if (!empty($_POST['slide2_2'])) {
        $query6 = "UPDATE slides SET PhotoS = '{$_POST['slide2_2']}' WHERE NumSlide = 2 ";
        mysqli_query ($session, $query6);
  } 
  
  if (!empty($_POST['slide3_1'])) {
        $query7 = "UPDATE slides SET TitreS = '{$_POST['slide3_1']}' WHERE NumSlide = 3 ";
        mysqli_query ($session, $query7);
  } 
  
  if (!empty($_POST['slide3_2'])) {
        $query8 = "UPDATE slides SET PhotoS = '{$_POST['slide3_2']}' WHERE NumSlide = 3 ";
        mysqli_query ($session, $query8);
  } 
  
  if (!empty($_POST['slide3_3'])) {
        $query9 = "UPDATE slides SET TextS1 = '{$_POST['slide3_3']}' WHERE NumSlide = 3 ";
        mysqli_query ($session, $query9);
  } 
  
  if (!empty($_POST['slide4_1'])) {
        $query10 = "UPDATE slides SET TitreS = '{$_POST['slide4_1']}' WHERE NumSlide = 4 ";
        mysqli_query ($session, $query10);
  } 
  
  if (!empty($_POST['slide4_2'])) {
        $query11 = "UPDATE slides SET PhotoS = '{$_POST['slide4_2']}' WHERE NumSlide = 4 ";
        mysqli_query ($session, $query11);
  } 
  
  if (!empty($_POST['slide4_3'])) {
        $query12 = "UPDATE slides SET TextS1 = '{$_POST['slide4_3']}' WHERE NumSlide = 4 ";
        mysqli_query ($session, $query12);
  } 
  
  if (!empty($_POST['slide4_4'])) {
        $query13 = "UPDATE slides SET TextS2 = '{$_POST['slide4_4']}' WHERE NumSlide = 4 ";
        mysqli_query ($session, $query13);
  }
  
  if (!empty($_POST['slide4_5'])) {
        $query14 = "UPDATE slides SET TextS3 = '{$_POST['slide4_5']}' WHERE NumSlide = 4 ";
        mysqli_query ($session, $query14);
  } 
   
  header("Location: Admin.php");
 
?>

