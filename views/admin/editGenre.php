<?php 
	include('adminNav.php');
	
 ?>
 <!-- sql to get array of genre from the get method -->
<?php 
if(isset($_GET['editGenre'])) {
	$id = $_GET['editGenre'];
	$sql = "SELECT * FROM genres WHERE id = '$id'";
	$sqlRun = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($sqlRun);
}
?>
<?php 
  if (isset($_POST['updateGenre'])) {
    $id = $_POST['genereId'];
    $upname = $_POST['genresName'];
    $updateSql= "UPDATE genres SET name = '$upname' WHERE  '$id'= id";
    $runtSql = mysqli_query($conn,$updateSql);
    if ($runtSql) {
        header("location: genres.php");
    }
    else{
        echo "error";
    }
  }

 ?>
 <html>
 	<body>
 		<div>
 <!-- Form to update genre name -->
 <form action="editGenre.php" method="POST">
  <div class="form-group mt-4 ml-2">
    <label for="Add new Genres Name"> <b>Update Genres Name</b> </label>
    <input type="text" class="form-control" name="genresName" value="<?php echo $array['name'] ?>" >
  </div>
  <input type="hidden" value="<?php echo $array['id'] ?>" name="genereId" >
  <button type="submit" name="updateGenre" class="btn btn-outline-danger ml-3">Update Genres</button>
</form>
 		</div>
 	</body>
 </html>		