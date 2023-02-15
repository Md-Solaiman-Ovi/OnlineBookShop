<?php 
	include('adminNav.php');
 ?>
 <?php 
 	$alreadyExist = false;
 	$success  =false;
 	if (isset($_POST['submitWriter'])) {
 		$writerName = $_POST['writerName'];
 		$check = "SELECT * FROM writers where name like '%$writerName%'";
 		$chechSql = mysqli_query($conn, $check);
 		if(mysqli_num_rows($chechSql)>0){
 			$alreadyExist = true;
 		}
 		else{
 			$sql = "INSERT INTO writers(name) VALUES('$writerName')";
 			$sqlRun = mysqli_query($conn, $sql);
 			$success = true;
 		}
 	}
  
 	
  ?>
 <html>
 	<body>
 		
 		<div class="container">
 			<?php 
 		if ($alreadyExist) {
 			warningMessage(" Genre Already exist!!");
 		}
 		elseif ($success) {
 			successMessage("New Genre added Successfully");
 		}
 		 ?>
 			<form action="writers.php" method="POST">
  <div class="form-group mt-2">
    <label for="Add new Writers Name">Writers Name</label>
    <input type="text" class="form-control" name="writerName"  placeholder="writer name">
  </div>
  <button type="submit" name="submitWriter" class="btn btn-outline-danger">Add Genres</button>
</form>
<div>
	<span class="container"> <b>All Writers</b></span>

<!-- Table to show the available list of writers -->

 			<table class="table table-dark"  style="border: 6px solid gray;">
      <tr>
        <th class="col-md-5">Writers Name</th>
        <th class="col-md-2">Action</th>
        <th colspan="2" class="col-md-2"></th>
      </tr>
    
    <?php 
    	$Allwriters = "SELECT * FROM writers";
    	$runsql = mysqli_query($conn, $Allwriters);
  		while ($post = mysqli_fetch_assoc($runsql)) {

  		?>
  		<tr>
  		<td><?php echo $post['name']; ?></td>
  		
  		<td>
        <a href="editWriter.php?edit=<?php echo $post['id'] ?>" class="btn btn-success">Edit</a>

        <a href="delete.php?writedelete=<?php echo $post['id'] ?>" class="btn btn-danger">Delete</a>
  	</td>
  		
  	</tr>
  		<?php	
  		}

     ?>
      
        
        
      
      
      
    
  </table>
 </div>
 		</div>
 		
 
 	</body>
 </html>