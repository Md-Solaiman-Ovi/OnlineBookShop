<?php 

    include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php')
 ?>
<?php 
        
        $successAler = false;
        $warningAlert = false; 
        if(isset($_POST['postComment']) && isset($_SESSION['uloggedin'])) {
            $book_id = $_POST['book_id'];
            $comBody = $_POST['commentBody'];
            $userId = $_SESSION['user_id'];
            $userName = $_SESSION['username'];
            $postCmntSql = "INSERT INTO comments (user_id,book_id,user_name,comment) VALUES('$userId','$book_id','$userName','$comBody')";
            $runpostSql = mysqli_query($conn,$postCmntSql);
            if ($runpostSql) {
                
                  $successAler = true;
              } 
              
            }
            if (isset($_POST['postComment']) && !isset($_SESSION['uloggedin'])) {
                
                 $warningAlert = true; 
                 
             } 
         ?>

  <body >
    <div class="jumbotron" style=" background-color: lightgray;">
        
        <?php 
        if ($successAler) {
            successMessage("Comment Posted Successfully.");
        }
        if ($warningAlert) {
            warningMessage("You must be loggedIn to comment into this.");
        }
         ?>
        <div class="container">
            <?php
            $book_id = $_GET['product_id'];
            $book_details = getBookDetails($conn,$book_id);
            $allcommentSql = "SELECT * FROM comments WHERE book_id ='$book_id' ORDER BY created_at DESC";
            $runcommentSql = mysqli_query($conn,$allcommentSql);
            while ($row = mysqli_fetch_assoc($runcommentSql)) {
             $arraycomments[] = $row;
    }
    if (!empty($arraycomments)) {
        $arraycommentss = $arraycomments;
    } 
             ?>
            <h1 class="display-4 text-center text-danger"><?php echo $book_details['book_name']; ?></h1>
            <!-- <p class="lead">A blazer is a type of jacket resembling a suit jacket, but cut more casually. A blazer is generally distinguished from a sport coat as a more formal garment and tailored from solid colour fabrics. Blazers often have naval-style metal buttons to reflect their origins as jackets worn by boating club members.</p> -->
            <!-- <button class="btn btn-success">
                <a class="btn btn-success" href="index.php" role="button">Add To Cart</a>

            </button> -->

        </div>

        <div class="container">
            <div class="row">
                <div class=" col-lg-6 col-sm-12">
                    <img src="../assets/img/books-img/<?php echo $book_details['book_pic'] ?>" class="img-fluid" alt="">
<!-- ratings here -->
                            <!-- <div class="ratings"> <span class="product-rating">4.6</span><span>/5</span>
                                <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="rating-text"> <span>46 ratings & 15 reviews</span> </div>
                            </div> -->

                </div>
                <div class=" col-lg-6 col-sm-12">
                    
                    <h5><?php echo $book_details['book_desc']; ?></h5>
                    <h3> <strong>Price: </strong><b style="color:blue;"><?php echo $book_details['price']; ?></b></h3>
                    <?php 
                    if ($book_details['stock']>0) {
                        ?>
                        <span class="badge badge-pill badge-success">Stock-Available</span>
                        <?php
                    }
                    else{
                        ?>
                        <span class="badge badge-pill badge-danger">Stock-Out</span>
                        <?php
                    }
                 ?> 
                    <a href="actions.php?addCart=<?php echo $book_details['book_id'] ?>" class=" btn btn-success"  data-id="<?php echo $book_details['book_id']; ?>" role="button"   style="<?php if ($book_details['stock']<1) {
                echo "pointer-events: none;";
            }
            else echo "" ?>     " >Add to cart</a> <br>


                        <div class="d-flex justify-content row mt-2">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section">
                                    <?php 
                                    if (!empty($arraycommentss)) {
                                        
                                    
                                    foreach($arraycommentss as $i){
                                        
                                     ?>
                                    
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://img.icons8.com/bubbles/100/000000/user.png" width="40">

                                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $i['user_name']; ?></span><span class="date text-black-50"></span></div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text"><?php echo $i['comment']; ?></p>
                                        </div>
                                    </div>
                                <?php }} ?>
                                    <div class="bg-light p-2">
                                        <form action="" method="POST">
                                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://img.icons8.com/bubbles/100/000000/user.png" width="40"><textarea class="form-control ml-1 shadow-none textarea" name="commentBody"></textarea></div>
                                            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit" name="postComment">Post comment</button>
                                            </div>
                                        </form>             
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>