<?php 
	include('userNav.php');
 ?>
 <?php 
 	$userid = $_SESSION['user_id'];
 	$sql = "SELECT * FROM user WHERE uid = '$userid'";
 	$runSql = mysqli_query($conn,$sql);
 	$row = mysqli_fetch_assoc($runSql);

 ?>
<?php 
	if (isset($_POST['edit_info'])) {
		$id = $_POST['userId'];
		$name = $_POST['edittname'];
		$address  = $_POST['editAddress'];
		$phone = $_POST['editPhone'];
		$sql_query = "UPDATE user SET uname = '$name', uaddress = '$address' WHERE $id = id ";
		$sqlRun = mysqli_query($conn,$sql_query); 
	}
 ?>

		
 		<form class="container col-md-5" style="margin: auto;" action="" enctype="multipart/form-data" method="POST" onsubmit="return true">
            <div class="form-group mt-1">
               <label for="newstitle" style="color:black;">Name of user</label>
                <input class="form-control" type="text" name="edittname" value="<?php echo $row['uname'] ?>" id="posttitle"   style=" color: black;">
            </div>
            <div class="form-group mt-1">
               <label for="newstitle" style="color:black;">User Email</label>
                <input class="form-control" type="text"  value="<?php echo $row['uemail'] ?>" id="posttitle"   style=" color: black;">
            </div>
            <div class="form-group mt-1">
               <label for="newstitle" style="color:black;">Address:</label>
                <input class="form-control" type="text" name="editAddress" value="<?php echo $row['uaddress'] ?>" id="posttitle"   style=" color: black;">
            </div>
            <div class="form-group mt-1">
               <label for="newstitle" style="color:black;">Phone Number:</label>
                <input class="form-control" type="text" name="editPhone" value="<?php echo $row['uphone'] ?>" id="posttitle"   style=" color: black;">
            </div>
            <input type="hidden" name="userId" value="<?php echo $userid ?>">
            
            
            
           
            
            
            <button type="submit" class="btn btn-success col-md-5" name="edit_info" >Update Info</button>
            
        </form>
 	