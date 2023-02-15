<?php 
	include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php');
	$get  = $_POST['quantity'];
	$getB = $_POST['bookId'];
	$getp = $_POST['price'];
	$getBn = $_POST['bookName'];
	print_r($get);
	print_r($getp);
	print_r($getB);
	$total =0;
	for ($i=0; $i<count($get); $i++) {
			// echo $get[$i].'and'.$getp[$i].'and'.$getBn[$i];
   			$total = $total + $get[$i] * $getp[$i];
   			
  }
  echo $total;
  $userMail = $_SESSION['ulogginemail'];
  $userDtlsSql = "SELECT * FROM user WHERE '$userMail' = uemail";
  $userDtlsSqlRun = mysqli_query($conn,$userDtlsSql);
  $details = mysqli_fetch_assoc($userDtlsSqlRun);
?>

<html>
	 <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
          	<?php 
          	for ($i=0; $i<count($getB) ; $i++) { 
          		?>
          		<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $getBn[$i]; ?></h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
          		<?php
          	}
          	 ?>
            
            
            
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">FUll Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $details['uname']; ?>" readonly>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              
            </div>

            

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $details['uemail']; ?>" readonly>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" readonly>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            

            
            <hr class="mb-4">
            
            
            

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cash on delivery</label>
              </div>
              
              
            </div>
            
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>		
	<script>
		
	</script>	
	</body>
</html>