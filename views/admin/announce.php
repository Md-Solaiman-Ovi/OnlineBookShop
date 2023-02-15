<?php 
	include('adminNav.php');
 ?>
 <?php 
 if(isset($_POST['add_announce']))
{

    $title = mysqli_real_escape_string($conn,$_POST['announcetitle']);
    $img =  $_FILES["img"]["name"];
 	$file_name = $_FILES["img"]["name"];
	$file_tmp = $_FILES["img"]["tmp_name"];
  	if($file_name!=''){
        move_uploaded_file($file_tmp,"../../assets/img/".$file_name);
  	}

	$sql_query="INSERT INTO announce (title,img) VALUES('$title','$img')";

 	if(mysqli_query($conn,$sql_query))
 	{
  	?>
  		<script type="text/javascript">
  		alert('news added Successfully ');
  
  		</script>
  	<?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 
}
?>
 <html>
 	<body>
 		<div class="container">
 			<form class="col-md-5" style="margin: auto;" action="announce.php" enctype="multipart/form-data" method="POST" onsubmit="return true">
            <div class="form-group mt-1">
               <label for="announcetitle" style="color:black;">Enter title of the announcement!</label>
                <input class="form-control" type="text" name="announcetitle" id="announcetitle"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter title of the announcement!'" placeholder="Enter the title." required="" style=" color: black;">
            </div>
            <div class="form-group">
               <input type="file" name="img" id="fileToUploadd" style=" color: black;">
            </div>     
            <button type="submit" class="btn btn-success col-md-5" name="add_announce" >Add Announcement</button>
            
        </form>
        <div>
	<span class="container"> <b>All Announcements</b></span>

<!-- Table to show the available list of announcements -->

 			<table class="table table-dark"  style="border: 6px solid gray;">
      <tr>
        <th class="col-md-5">Announce title</th>
        <th class="col-md-2">Image</th>
        <th colspan="2" class="col-md-2">Action</th>
      </tr>
    
    <?php 
    	$Allannounce = "SELECT * FROM announce";
    	$runsql = mysqli_query($conn, $Allannounce);
  		while ($post = mysqli_fetch_assoc($runsql)) {

  		?>
  		<tr>
  		<td><?php echo $post['title']; ?></td>
  		<td> <img src="../../assets/img/<?php echo $post['img'] ?>" alt="" style="height:80px; width: 100px;" > </td>
  		<td>
        <form action="delete.php" method="GET">
  			<button class="btn btn-danger" name="deleteAnnounce" value="<?php echo $post['id'];?>" type="submit" >Delete</button> 
  		</form>
  	</td>
  		<td>
        <form action="editAnnounce.php" method="GET">
        <button class="btn btn-success" name="editAnnounce" value="<?php echo $post['id']; ?>" type="submit">Edit</button></td>
  		</tr>
  		<?php	
  		}

     ?>
      
        
        
      
      
      
    
  </table>
 </div>
 		</div>
 	</body>
 </html>