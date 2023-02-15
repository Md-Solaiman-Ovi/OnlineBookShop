<?php 
	include('adminNav.php');
 ?>
 <?php 
 	$alreadyExist = false;
 	$success  =false;
 	if (isset($_POST['submitCategory'])) {
 		$categoryName = $_POST['categoryName'];
 		$check = "SELECT * FROM category where cat_name like '%$categoryName%'";
 		$chechSql = mysqli_query($conn, $check);
 		if(mysqli_num_rows($chechSql)>0){
 			$alreadyExist = true;
 		}
 		else{
 			$sql = "INSERT INTO category(cat_name) VALUES('$categoryName')";
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
 			warningMessage(" Category Already exist!!");
 		}
 		elseif ($success) {
 			successMessage("New Category added Successfully");
 		}
 		 ?>
 			<form action="category.php" method="POST">
  <div class="form-group mt-2">
    <label for="Add new Category Name">Category Name</label>
    <input type="text" class="form-control" name="categoryName"  placeholder="category name">
  </div>
  <button type="submit" name="submitCategory" class="btn btn-outline-danger">Add Category</button>
</form>
<div>
	<span class="container"> <b>All Category</b></span>

<!-- Table to show the available list of category -->

 			<table class="table table-dark"  style="border: 6px solid gray;">
      <tr>
        <th class="col-md-5">Category Name</th>
        <th class="col-md-2">Action</th>
        <th colspan="2" class="col-md-2"></th>
      </tr>
    
    <?php 
    	$Allcategory = "SELECT * FROM category";
    	$runsql = mysqli_query($conn, $Allcategory);
  		while ($post = mysqli_fetch_assoc($runsql)) {

  		?>
  		<tr>
  		<td><?php echo $post['cat_name']; ?></td>
  		
  		<td>
        <a href="editCategory.php?edit=<?php echo $post['cat_id'] ?>" class="btn btn-success">Edit</a>

        <a href="delete.php?categorydelete=<?php echo $post['cat_id'] ?>" class="btn btn-danger">Delete</a>
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