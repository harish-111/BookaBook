<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Admin Panel</title>
    <?php
    	include 'connect.php';
    ?>
</head>
  <body>

  	

  	<!-- NAVBAR-TOP -->
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<img class="navbar-brand img-fluid" src="../../logo.png" style="max-width: 15%;">
	   	 <ul class="navbar-nav" style="position:absolute;right:20px;">
	   		<li class="nav-item">
	   			<a class="btn btn-dark text-light" href="../admindashboard.php" role="button">Back</a>
	   			<button class="btn btn-dark text-light" role="button">Admin Panel</button>
	   		</li>
	   	</ul>
	</nav>

	<?php
		$couponCode = $_POST['inputCoupon'];
		$couponType = $_POST['couponType'];
		$couponValue = $_POST['inputCouponValue'];
		$couponNumber = $_POST['inputNumberCoupons'];

		$sql_add_coupon = "INSERT INTO discount_coupon(coupon_code, coupon_type, coupon_value, coupon_number) VALUES ('$couponCode','$couponType','$couponValue','$couponNumber')";

		if ($conn->query($sql_add_coupon) === TRUE) {
		    ?>
 
	        <div class="alert alert-success text-center" role="alert">
	        <p>Coupon Added Successfully. Redirecting...</p>
	        <script>
	          window.setTimeout(function() {
	              window.location.assign('../admindashboard.php');
	          }, 2000);
	          </script>
	      </div>

		<?php
	    } else {

	        ?>
	        <div class="alert alert-danger" role="alert">
	        <p>Something went wrong.</p>
	        <p><?php echo $conn->error; ?></p>
	        <a class="btn btn-primary" href="index.php" role="button">Back to Panel</a>
	      </div>
	      <?php
	  }
		?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>