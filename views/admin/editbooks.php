<?php 
	include('adminNav.php');
 ?>
 <?php 
 	$book_id = $_GET['edit'];
 	$fetchdata = getBookDetails($conn,$book_id);
	if (isset($_POST['edit_book'])) {
		$bookName = mysqli_real_escape_string($conn,$_POST['bookName']);
		$bookDesc = mysqli_real_escape_string($conn,$_POST['bookDesc']);
		$bookPrice = mysqli_real_escape_string($conn,$_POST['bookPrice']);
		$bookGenre = mysqli_real_escape_string($conn,$_POST['bookGenre']);
		$bookStock = mysqli_real_escape_string($conn,$_POST['bookStock']);
		$bookPublish = mysqli_real_escape_string($conn,$_POST['bookPublish']);
		$writer = $_POST['writer'];
		$img =  $_FILES["img"]["name"];
 		$file_name = $_FILES["img"]["name"];
		$file_tmp = $_FILES["img"]["tmp_name"];
            
  		if($file_name!=''){
        	move_uploaded_file($file_tmp,"../../assets/img/books-img/".$file_name);
        	$sql_book="INSERT INTO books (book_name,book_desc,price,book_pic,stock,published_year) VALUES('$bookName','$bookDesc','$bookPrice','$img','$bookStock','$bookPublish')";
  		if(mysqli_query($conn,$sql_book)){
  			$book_id = mysqli_insert_id($conn);

  			foreach ($writer as $i) {
			$sql_writers = "INSERT INTO books_writers(book_id,writer_id) VALUES('$book_id','$i')";
			$run_sql_writers = mysqli_query($conn,$sql_writers);
		}
		$sql_genre = "INSERT INTO books_genre (book_id,genre_id) VALUES('$book_id','$bookGenre')";
		$run_sql_genre = mysqli_query($conn,$sql_genre);
  		}
  		}


  		// $fetch_book_id = "SELECT * FROM books WHERE book_name LIKE '%bookName%' AND book_desc LIKE '%$bookDesc%'";
  		// $runFetch = mysqli_query($conn,$fetch_book_id);
  		// while ($row = mysqli_fetch_assoc($runFetch)) {
  		// 	$book_id = $row['book_id']
  		// }
		
	}
 ?>

<html>
 	<body>
 		<div class="container mb-3">
 			<form class="col-md-7" style="margin: auto;" action="addBook.php" enctype="multipart/form-data" method="POST" onsubmit="return true">
<!-- book name input field -->
            <div class="form-group mt-1">
               <label for="bookName" style="color:black;">Enter title of the book!</label>
                <input class="form-control" type="text" name="bookName" id="bookName"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter name of the book!'" placeholder="Enter the book." required="" style=" color: black;" value="<?php echo $fetchdata['book_name'] ?>">
            </div>
<!-- book discription input field -->
            <div class="form-group">
               <label for="bookDesc" style="color:black;">Enter Description of the book!</label>
               <textarea class="form-control" name="bookDesc" id="bookDesc"   placeholder="Plese write the Description of the book!!" style=" color: black;" required="" cols="30" rows="10">
               	<?php echo $fetchdata['book_desc'] ?>
               </textarea>
                
            </div>
<!-- book price input field -->
            <div class="form-group mt-1">
               <label for="bookPrice" style="color:black">Enter price of the book!</label>
                <input class="form-control" type="number" name="bookPrice" id="bookPrice"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter price of the book!'" placeholder="Enter the book's price." required="" style=" color: black;" value="<?php echo $fetchdata['price'] ?>">
            </div>
<!-- book image field -->
            <div class="form-group">
            	<img src="../../assets/img/books-img/<?php echo $fetchdata['book_pic']; ?>" alt="" style="height: 200px; width: 200px;">
               <input type="file" name="img" id="fileToUploadd" style=" color: black;" >
            </div>
<!-- book genre field -->
            <div class="form-group">
               <label for="genres" style="color:black;">Selcet the genres of the book:</label>
                  <select class="form-control" name="bookGenre" id="" required="" style="color: black;">
                     <?php 
                        $genQuery = "SELECT * FROM genres";
                        $rungen = mysqli_query($conn, $genQuery);
                        while ($row=mysqli_fetch_assoc($rungen)) {
                           $gen_id = $row['id'];
                           $gen_name = $row['name'];

                     ?>
                        <option value="<?php echo $gen_id; ?>" style="background-color:white;"><?php echo $gen_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
<!-- book writer field -->  
<div class="form-group">
   <?php 
      $book_writerss_sql = "SELECT
         bw.book_id,
         bw.writer_id,
            w.id,
            w.name
         FROM books_writers bw
         INNER JOIN writers w ON w.id = bw.writer_id
         WHERE bw.book_id = '$book_id'";
         $run_book_writers = mysqli_query($conn,$book_writerss_sql);
         $uh_array = [];
         foreach($run_book_writers as $rowuh){
            $uh_array[] = $rowuh['id'];
         }
    ?>
               <label for="writer" style="color:black;">Selcet the writer of the book:</label>
                  <select class="form-control multiple-select" name="writer[]" id="" required="" style="color: black;" multiple>
                     <?php 
                        $wriQuery = "SELECT * FROM writers";
                        $runwri = mysqli_query($conn, $wriQuery);
                        while ($row=mysqli_fetch_assoc($runwri)) {
                           $wri_id = $row['id'];
                           $wri_name = $row['name'];

                     ?>
                        <option value="<?php echo $wri_id; ?>" style="background-color:white;" <?php
                           
                            echo in_array($wri_id,$uh_array ) ? "selected ":""  ?>>
                           
                           <?php echo $wri_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
<!-- book stock input field -->
            <div class="form-group mt-1">
               <label for="bookStock" style="color:black">Enter stock of the book!</label>
                <input class="form-control" type="number" name="bookStock" id="bookStock"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter Stock of the book!'" placeholder="Enter the book's stock." required="" style=" color: black;" Value="<?php echo $fetchdata['stock'] ?>">
            </div>
<!-- book published year input field -->
<div class="form-group mt-1">
               <label for="bookPublish" style="color:black">Enter published year of the book!</label>
                <input class="form-control" type="number" name="bookPublish" id="bookPublish"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter publish year of the book!'" placeholder="Enter the book's publish year." required="" style=" color: black;" Value="<?php echo $fetchdata['published_year'] ?>">
            </div>
            <button type="submit" class="btn btn-success col-md-5" name="add_book" >Update Book Info</button>
            
        </form>
        
 		</div>
 		
 		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 		<script>
 			$(".multiple-select").select2({
               //maximumSelectionLength: 2
            });
 		</script>
 	</body>
 </html>