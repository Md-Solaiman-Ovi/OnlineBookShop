<?php 
	include('adminNav.php');
 ?>
 <?php 
 	if (isset($_GET['deleteAnnounce'])) {
 		$deleteanId = $_GET['deleteAnnounce'];
 		$delSql = "DELETE FROM announce WHERE id = '$deleteanId'";
 		$renDel = mysqli_query($conn,$delSql);
 		header("location: announce.php");

 	}
 	else if (isset($_GET['deleteGenre'])) {
 		$deleteId = $_GET['deleteGenre'];
 		$delSql = "DELETE FROM genres WHERE id = '$deleteId'";
 		$renDel = mysqli_query($conn,$delSql);
 		header("location: genres.php");

 	}
    elseif (isset($_GET['writedelete'])) {
        $id = $_GET['writedelete'];
        $delSql = "DELETE FROM writers WHERE id = '$id'";
        $runSql = mysqli_query($conn,$delSql);
        header("location: writers.php");
    }
    elseif (isset($_GET['categorydelete'])) {
        $id = $_GET['categorydelete'];
        $delSql = "DELETE FROM category WHERE cat_id = '$id'";
        $runSql = mysqli_query($conn,$delSql);
        header("location: category.php");
    }
    elseif (isset($_GET['bookdelete'])) {
        $id = $_GET['bookdelete'];
        $del_genre = "DELETE FROM books_genre WHERE book_id = '$id'";
        $run_del_genre = mysqli_query($conn,$del_genre);
        $del_writer = "DELETE  FROM books_writers WHERE book_id = '$id' ";
        $run_del_writer = mysqli_query($conn,$del_writer);
        $delbookSql = "DELETE FROM books WHERE book_id = '$id'";
        $runsql = mysqli_query($conn,$delbookSql);
        header("location: abooks.php");
    }

  ?>