<?php 
	include('adminNav.php');
	
 ?>
 <!-- sql to get array of genre from the get method -->
<?php 
if(isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$sql = "SELECT * FROM writers WHERE id = '$id'";
	$sqlRun = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($sqlRun);
}
?>
<?php 
  if (isset($_POST['updateWriter'])) {
    $id = $_POST['writerId'];
    $upname = $_POST['writerName'];
    $updateSql= "UPDATE writers SET name = '$upname' WHERE  '$id'= id";
    $runtSql = mysqli_query($conn,$updateSql);
    if ($runtSql) {
        header("location: writers.php");
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
 <form action="editWriter.php" method="POST">
  <div class="form-group mt-4 ml-2">
    <label for="Add new Genres Name"> <b>Update Writer Name</b> </label>
    <input type="text" class="form-control" name="writerName" value="<?php echo $array['name'] ?>" >
  </div>
  <input type="hidden" value="<?php echo $array['id'] ?>" name="writerId" >
  <button type="submit" name="updateWriter" class="btn btn-outline-danger ml-3">Update Writers Name</button>
</form>
 		</div>
 	</body>
 </html>		