<?php 

    include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php');
 ?>
<?php
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
//print_r(array_keys($products_in_cart));

if ($products_in_cart) {
    $arr  = implode(" ,", $products_in_cart);
    
    $sql = "SELECT * FROM books WHERE book_id IN ( $arr )";
 
    $sqlRun = mysqli_query($conn,$sql);
    //$rows = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_assoc($sqlRun)) {
            
            $cartarray[] = $row;

        }     
        
}
else{
    
}   

?>
<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head">My Cart</h2>
                <table class="table table-bordered"  style="border: 6px solid gray;">

                    <thead>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th width="120px">Product Price</th>
                        <th width="100px">Qty.</th>
                        <th>Action</th>
                    </thead>
                    <form action="checkout.php" method="POST">
                    <tbody class="table-body">

                        <?php if (empty($cartarray)): ?>
                            <tr class="item-row">
                            <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                            </tr>
                            <?php else: ?>
                <?php foreach ($cartarray as $i): ?>
                        <tr class="items-row">
                            <td><img src="../assets/img/books-img/<?php echo $i['book_pic'] ?>" alt="" width="70px" /></td>
                            <td><?=$i['book_name']?></td>
                            <td >৳ <span class="price" ><?=$i['price']?></span></td>
                            <td class="quantity">
                                <input class="form-control item-quantity" type="number" value="1" min="1" name="quantity[]" max="<?php echo $i['stock']; ?>"/>
                                <input type="hidden" name="price[]" value="<?php echo $i['price']; ?>">
                                <input type="hidden" name="bookName[]" value="<?php echo $i['book_name'] ?>">
                                <input type="hidden" name="bookId[]" value="<?php echo $i['book_id']; ?>">
                                
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary remove-cart-item" href="actions.php?remove=<?php echo $i['book_id'] ?>" data-id="2"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="2" align="right"><b >TOTAL AMOUNT (MRP.)</b></td>
                            <td class="total-price" style="color:blue; font-weight: 900;">৳ </td>
                        </tr>
                    </tbody>
                    <button type="submit" class="btn-btn-danger">Checkout</button>
                </form>
                </table>
                <a class="btn btn-sm btn-primary" type="submit" href="checkout.php">Continue Shopping</a>
                <a class="" href="#" data-toggle="modal" data-target="#userLogin_form"></a>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
<!-- footer -->
<!-- <div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Second Hand Book Store</h3>
                <p>Buy and Sell Second hand Books</p>
            </div>
            <div class="col-md-3">
                <h3>Categories</h3>
                <ul class="menu-list">
                    <li><a href="category.php?cat=1">Grade 9</a></li>
                    <li><a href="category.php?cat=2">Grade 10</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Useful Links</h3>
                <ul class="menu-list">
                    <li><a href="http://localhost/shbs">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="latest_products.php">Latest Products</a></li>
                    <li><a href="popular_products.php">Popular Products</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Contact Us</h3>
                <ul class="menu-list">
                    <li><i class="fa fa-home"></i><span>: UOG Marghazar campus</span></li>
                    <li><i class="fa fa-phone"></i><span>: 03187848227</span></li>
                    <li><i class="fa fa-envelope"></i><span>: info@secondhandbookstore.com</span></li>
                </ul>
            </div>
            <div class="col-md-12">
                <span>Second hand Book Store Copyright 2021 UOG Marghazar Campus | Created by <a href="" target="_blank">FYP Group Marghazar Campus</a></span>
            </div>
        </div>
    </div>
</div> -->