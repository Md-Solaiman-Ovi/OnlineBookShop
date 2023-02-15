<?php 
	include('adminNav.php');
 ?>
 <?php 
 	if (isset($_GET['updateGenre'])) {
    $id = $_GET['genereId'];
    $upname = $_GET['genresName'];
    $updateSql= "UPDATE genres SET name = '$upname' WHERE  '$id'= id";
    $runtSql = mysqli_query($conn,$updateSql);
    if ($runtSql) {
        echo "success";
    }
    else{
        echo "error";
    }
  }
  ?>