<?php 
	include('adminNav.php');
	
 ?>
 <?php 
	if (isset($_GET['editAnnounce'])) {
		$id = $_GET['editAnnounce'];
		$sql = "SELECT * FROM announce WHERE id = '$id'";
		$sqlRun = mysqli_query($conn, $sql);
		$array = mysqli_fetch_array($sqlRun);
} ?>
 <?php 
   $success = false;
   $error = false;
   if(isset($_POST['edit_announce']))
	{
   
      $title = mysqli_real_escape_string($conn,$_POST['edittitle']);
      $id = $_POST['announceId'];
      $img =  $_FILES["img"]["name"];
      $file_name = $_FILES["img"]["name"];
      $file_tmp = $_FILES["img"]["tmp_name"];
      if(!empty($file_name)){
        move_uploaded_file($file_tmp,"../../assets/img/".$file_name);
        $sql_query = "UPDATE announce SET title = '$title', img = '$img' WHERE $id= id "; 
      }
   else{
      $sql_query="UPDATE announce SET title = '$title' WHERE '$id' = id";
   }

 if(mysqli_query($conn,$sql_query))
 {
   $success = true;
  
  
 }
 else
 {
   $error = true;
  
  
 }
}

?>
 
<html>
	<body>
		<div>
			<?php 
 		if ($error) {
 			warningMessage(" Error");
 		}
 		elseif ($success) {
 			successMessage("Updated Successfully");
 		}
 		 ?>
			<form class="container" style="margin: auto;" action="" enctype="multipart/form-data" method="POST" onsubmit="return true">
            <div class="form-group mt-1">
               <label for="newstitle" style="color:black;">Enter updated title of the news!</label>
                <input class="form-control" type="text" name="edittitle" value="<?php echo $array['title']; ?>" id="posttitle"   style=" color: black;">
            </div>
            <input type="hidden" name="announceId" value="<?php echo $array['id'] ?>">
            
            <div class="form-group">
               <img src="../../assets/img/<?php echo $array['img']; ?>" alt="" style="height: 200px; width: 200px;">
               <input type="file" name="img" id="fileToUploadd" style=" color: black;">
            </div>
            
           
            
            
            <button type="submit" class="btn btn-success col-md-5" name="edit_announce" >Update News</button>
            
        </form>
		</div>
	</body>
</html>