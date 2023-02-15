<?php
ob_start();
     include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php')


?>
<?php

if (isset($_GET['addCart'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = $_GET['addCart'];
    $quantity = 1;
    
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $sql = "SELECT * FROM books WHERE $product_id = book_id";
    $sqlRun = mysqli_query($conn,$sql);
    // Fetch the product from the database and return the result as an Array
    $product = mysqli_fetch_assoc($sqlRun);

    // Check if the product exists (array is not empty)
    if ($product  > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity.

                $_SESSION['cart'][$product_id] = $product_id;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $product_id;
            }
        } 
        else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $product_id);
        }
    }
    // Prevent form resubmission...
    header("location: home.php");
    exit;
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
    header("location: cart.php");
    
}


ob_flush();
?>