<?php 
	include("db.php");

	function successMessage($message){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation! </strong>' .$message. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}

	function warningMessage($message){
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning! </strong>' .$message. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}

	

 function getAllgenres(){
 	$sql = "SELECT * FROM genres";
 	$sqlRun = mysqli_query($conn,$sql);
 	while ($row = mysqli_fetch_assoc($sqlRun)) {
 		$array[] = $row; 
 	}
 	return $array;
 }
 function Allbook($conn){
 		$sql = "SELECT * FROM books";
 		$sqlRun = mysqli_query($conn,$sql);
 		while ($row = mysqli_fetch_assoc($sqlRun)) {
 			$array[] = $row;
 		}
    if (!empty($array)) {
      return $array;
    }
 		
 }
 function searchBooks($conn,$name){
  $sql = "SELECT * FROM books WHERE book_name LIKE '%$name%'";
  $runSql = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_assoc($runSql)) {
    $array[] = $row;
  }
  if (!empty($array)) {
      return $array;
    }
 }
 function updateStock($conn,$book_id,$stock){
  $sql = "UPDATE books SET stock = '$stock' WHERE '$book_id' = book_id ";
  $sqlRun = mysqli_query($conn,$sql);
 }

function getBookDetails($conn,$book_id)
{
  $sql = "SELECT  b.book_id,
                  b.book_name,
                  b.book_desc,
                  b.price,
                  b.book_pic,
                  b.stock,
                  b.published_year,
                    w.book_id,
                    w.writer_id,
                      n.id,
                      n.name,
                        g.book_id,
                        g.genre_id,
                          gg.id,
                            gg.name AS genre_name
          FROM books b 
            INNER JOIN books_writers w ON w.book_id = b.book_id
            INNER JOIN writers n ON n.id = w.writer_id 
            INNER JOIN books_genre g ON g.book_id = b.book_id
            INNER JOIN genres gg ON gg.id = g.genre_id
            WHERE b.book_id = '$book_id' ";
  $sqlRun = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($sqlRun);
  return $row;

}

function genreBooks($conn,$gen_id){
$sql = "SELECT  g.id,
                g.name,
                bg.id,
                bg.book_id,
                bg.genre_id,
                b.book_id,
                b.book_name,
                b.book_desc,
                b.price, 
                b.stock,
                b.book_pic
              FROM genres g
              INNER JOIN books_genre bg ON bg.genre_id = g.id
              INNER JOIN books b ON b.book_id = bg.book_id
              WHERE bg.genre_id = '$gen_id'";
              $sqlRun = mysqli_query($conn,$sql);
              while ($row = mysqli_fetch_assoc($sqlRun)) {
              $array[] = $row;
              }
              if (!empty($array)) {
                return $array;
    }
 }
function getWriterBooks($conn,$writerId){

  $sql = "SELECT w.id ,
          w.name,
          bw.book_id,
          bw.writer_id,
          b.book_id,
          b.book_name,
          b.price,
          b.book_pic,
          b.stock,
          b.created_at
          FROM writers w
          INNER JOIN books_writers bw ON bw.writer_id = w.id
          INNER JOIN books b ON b.book_id = bw.book_id
          WHERE w.id = '$writerId'";
            $sqlRun = mysqli_query($conn,$sql);
              while ($row = mysqli_fetch_assoc($sqlRun)) {
              $array[] = $row;
              }
              if (!empty($array)) {
                return $array;
    }

}

 ?>