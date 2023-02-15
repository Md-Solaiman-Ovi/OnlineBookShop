<?php 

	include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php')
 ?>
<html>

<body>
    <?php
         if (isset($_GET['nav-search'])) {
            $name = $_GET['nav-search'];
            $array = searchBooks($conn,$name);
         }
         elseif (isset($_GET['gen'])) {
             $gen_id = $_GET['gen'];
             $array = genreBooks($conn,$gen_id);
         }
         elseif (isset($_GET['wri'])) {
             $writerId = $_GET['wri'];
             $array = getWriterBooks($conn,$writerId);
         }
         else{
            $array = Allbook($conn);
         }
        

        
     ?>
    <div class="search my-2 col-md-12">
        <form class="form-inline my-2 my-lg-1 ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search by book name" aria-label="Search" name="nav-search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search </button>
        </form>
    </div>
    <?php 
    $sql = "SELECT * FROM announce";
        $runSql = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($runSql)) {
            $slidersArray[] = $row;
        }
     ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
        <?php 
        $c=1;
        foreach ($slidersArray as $imgages ) {
            if ($c>1) {
                $sw = "";
            }
            else{
                $sw = "active";
            }
            ?>
             <div class="carousel-item <?php echo $sw ?>"data-interval="500">
                <img class="d-block w-100" src="../assets/img/<?php echo $imgages['img'] ?>" alt="..." style="height: 400px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase carousel-caption " style="color:black;"><?php echo $imgages['title'];?></h5>
                    
                </div>
            </div>
        <?php
        $c++; 
        }
         ?>
        
           
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row col-md-12">
        <?php
        if (!empty($array)) {
             
         
        foreach ($array as $i) {
        ?>
        <div class="col-md-3 mt-2" >
      <div class="card mb-1" style="border-radius: 25px;min-height: 480px; max-height: 450px; background: ghostwhite;">
        <img src="../assets/img/books-img/<?php echo $i['book_pic'] ?>" alt="" class="card-img-top" style="max-height: 280px; min-height: 250px; border-radius: 25px;">
        <div class="card-body">
            <h5 class="card-title"><b><?php echo $i['book_name']; ?></b></h5>
            <p class="card-text "><b style="color:green;">৳ <?php echo $i['price']; ?>.0</b>
                <?php 
                    if ($i['stock']>0) {
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
                
            </p>

          <div class="link">
            <a class="btn btn-outline-success" href="product-details.php?product_id=<?php echo $i['book_id'] ?>" role="button">View Details</a>
            <a href="actions.php?addCart=<?php echo $i['book_id'] ?>" class=" btn btn-outline-success"  data-id="<?php echo $i['book_id']; ?>" role="button"   style="<?php if ($i['stock']<1) {
                echo "pointer-events: none;";
            }
            else echo "" ?>     " >Add to cart</a>
          </div>
        </div>
      </div>

    </div>

        <?php
        }
    }
         ?>
     
    </div>
    


</body>

</html>