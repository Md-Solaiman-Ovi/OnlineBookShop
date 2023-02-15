<?php 
  include('adminNav.php');
 ?>

  
  
<html>

<body>
    <?php
if (isset($_GET['nav-search'])) {
            $name = $_GET['nav-search'];
            $arrays = searchBooks($conn,$name);
         }
elseif (isset($_POST['update'])) {
    $book_id = $_POST['book_id'];
    $stock = $_POST['stocks'];
    if (!($stock <0)) {
        updateStock($conn,$book_id,$stock);
        header("location: abooks.php");
    }
    
}
         else{
            $arrays = Allbook($conn);
            
         }
         ?>
    <div class="container">
        
        <form action="abooks.php" method="GET">
            <div class="form-group mt-2">
                <label for="Add new Genres Name">Book Name</label>
                <input type="text" class="form-control" name="nav-search" placeholder="Book name">
            </div>
            <button type="submit"  class="btn btn-outline-danger">Search Book</button>
        </form>
        <div>
            <span class="container"> <b>All Books</b></span>
            <!-- Table to show the available list of genres -->
            <table class="table table-dark" style="border: 6px solid gray;">
                <tr>
                    <th class="col-md-2">Book IMG</th>
                    <th class="col-md-2">Book Name</th>
                    <th class="col-md-3">Stock</th>
                    <th class="col-md-2"> Update(stock)</th>
                    <th colspan="2" class="col-md-3">Action</th>
                </tr>
                <?php
                     if (!empty($arrays)) {
             
         
                    foreach ($arrays as $i) {
                ?>
                <tr>
                    <td><img src="../../assets/img/books-img/<?php echo $i['book_pic'] ?>" alt="" width="70px" /></td>
                    <td>
                       <?php echo $i['book_name']; ?>
                    </td>
                    <td>
                        <form action="abooks.php" method="POST">
                            <input class="form-control item-quantity" type="number" name="stocks" min="0" value="<?php echo $i['stock'] ?>"/>
                            <input type="hidden" name="book_id" value="<?php echo $i['book_id']?>">
                        </td>
                        <td>
                            <button class="btn btn-success" name="update">Update(Stock)</button>
                        </form>
                        
                    
                    

                        
                        </td>
                        <td>
                        <a href="editBooks.php?edit=<?php echo $i['book_id'] ?>" class="btn btn-success">Edit</a>

                        <a href="delete.php?bookdelete=<?php echo $i['book_id'] ?>" class="btn btn-danger">Delete</a>

                        
                    </td>
                </tr>
                <?php 
      }
}
     ?>
            </table>
        </div>
    </div>
</body>

</html>