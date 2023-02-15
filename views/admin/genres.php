<?php 
  include('adminNav.php');
 ?>
<?php 
  $alreadyExist = false;
  $success  =false;
  if (isset($_POST['submitGenre'])) {
    $genreName = $_POST['genresName'];
    $check = "SELECT * FROM genres where name like '%$genreName%'";
    $chechSql = mysqli_query($conn, $check);
    if(mysqli_num_rows($chechSql)>0){
      $alreadyExist = true;
    }
    else{
      $sql = "INSERT INTO genres(name) VALUES('$genreName')";
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
        <form action="genres.php" method="POST">
            <div class="form-group mt-2">
                <label for="Add new Genres Name">Genres Name</label>
                <input type="text" class="form-control" name="genresName" placeholder="genres name">
            </div>
            <button type="submit" name="submitGenre" class="btn btn-outline-danger">Add Genres</button>
        </form>
        <div>
            <span class="container"> <b>All Genres</b></span>
            <!-- Table to show the available list of genres -->
            <table class="table table-dark" style="border: 6px solid gray;">
                <tr>
                    <th class="col-md-5">Genre Name</th>
                    <th class="col-md-2"></th>
                    <th colspan="2" class="col-md-2">Action</th>
                </tr>
                <?php 
      $Allgenres = "SELECT * FROM genres";
      $runsql = mysqli_query($conn, $Allgenres);
      while ($post = mysqli_fetch_assoc($runsql)) {

      ?>
                <tr>
                    <td>
                        <?php echo $post['name']; ?>
                    </td>
                    <td>
                        <form action="delete.php" method="GET">
                            <button class="btn btn-danger" name="deleteGenre" value="<?php echo $post['id'];?>" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="editGenre.php" method="GET">
                            <button class="btn btn-success" name="editGenre" value="<?php echo $post['id']; ?>" type="submit">Edit</button>
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