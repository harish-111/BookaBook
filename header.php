<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include 'connect.php';
error_reporting(0);
// echo "Cart contains : ";
// print_r($_SESSION['cart_content']);

if($_SESSION['cart_initial'] != 1)
{
	$_SESSION['current_product'] = null;
	$_SESSION['cart_content'] = array();
	$_SESSION['cart_content_size'] = array();
	$_SESSION['cart_content_units'] = array();
	$_SESSION['cart_content_name'] = array();
	$_SESSION['cart_content_price'] = array();
	$_SESSION['cart_initial']=1;
}

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127751131-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-127751131-1');
	</script>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="style.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
	<title>BOOKaBOOK | Home</title>
</head>
<style>
*{
	font-family: 'Roboto', sans-serif;
}

.category-link, .category-link:hover{
	color:#000000;
	text-decoration:none;
}

.category-link{
	-webkit-transition: color 0.3s;
	-moz-transition: color 0.3s;
	transition: color 0.3s;
}



.category-link:hover,
.category-link:focus {
	color: #000;
	cursor:pointer;
}

body {
	
	font-family: 'proxima-nova-soft', sans-serif;
	font-size: 14px;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
	.img-logo{
		width:80%;
	}
} 

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
	.img-logo{
		width:80%;
	}
} 

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
	.img-logo{
		width:80%;
	}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
	.img-logo{
		width:30%;
	}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
	.img-logo{
		width:30%;
	}
}
</style>
<body>

	<div class="">
		<!-- NAVBAR-TOP -->
		<div class="text-center">
			<a href="index.php"><img class="img-fluid" style="margin: 0 auto; max-width: 30%" src="logo.png"></a>
		</div>
		

		
		<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="display: block;">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span style="color: #fff;margin-bottom: 20px;border-bottom:10px; ">Menu</span>
			</button>

			
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav mr-auto" style="font-size:18px;font-weight:700;">
					<?php

					$sql_category = "SELECT DISTINCT product_category FROM product";
					$result = $conn->query($sql_category);

					if ($result->num_rows > 0) {
			    // output data of each row
						while($row = $result->fetch_assoc()) {
			        // echo "CATEGORY " . $row["product_category"]."<br>";
							?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color:#fff;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $row["product_category"];?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									
									<?php
									$category_temp = $row["product_category"];
									$sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
									$result1 = $conn->query($sql_subcategory);

									if ($result1->num_rows > 0) {
							    // output data of each row
										?>
										
										<?php

										while($row = $result1->fetch_assoc()) {
							        // echo "CATEGORY " . $row["product_category"]."<br>";
											?>
											<a class="dropdown-item" href="viewproducts.php?category=<?php echo $category_temp?>&sub_category=<?php echo $row["product_subcategory"];?>"><?php echo $row["product_subcategory"];?></a>

											
											<?php
										}
										

									}
									?></div></li><?php
								}
							}	else {
								echo "0 results";
							}
							?>
						</ul>
					</div>


					<div id="search_bar_div">
						<form method="get" action="search.php" class="form-inline">
							<div class="input-group">
								<input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search Books" style="width:150px;margin-top: 7px;">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="submit" name="process_search"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>

					<a class="nav-link login-signup" style="color:#fff;display:inline;" id="cart_link" href="show_cart.php" role="button"><i class="fas fa-shopping-cart"></i> (<?php echo count($_SESSION['cart_content']);?>)</a>
					<?php
					if(!isset($_SESSION['user_name'])) {
						
						?>
						
						
						<li class="nav-item" style="font-size:18px;font-weight:700;list-style-type:none;display:inline;" style="color:#fff;">
							<a class="nav-link login-signup" style="color:#fff;display:inline;" href="login.php" role="button">Login | Sign Up</a>
						</li>
						<?php
					}
					
					
					?>

				</div>

			</nav>
		</div>
		<div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border:0;display: block;">
				<div class="container">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav" style="font-size:18px;font-weight:700;">

							<?php
							$userpassword = $_POST['user_password'];
							$useremail = $_POST['user_email'];
							if(isset($_SESSION['user_name']))
							{
								?>



								<li class="nav-item">
									<a style="color:#fff" class="nav-link" href="user_orders.php" role="button">
										<span class="user-dropdown-title">Hello, <?php echo $_SESSION['user_name'];?></span><br>Your Orders
									</a>
								</li>
								<li class="nav-item">
									<a style="color:#fff" class="nav-link" href="user_profile.php" role="button">
										<span class="user-dropdown-title">View your</span><br>Profile
									</a>
								</li>
								<li class="nav-item" style="margin-top: 14px;">
									<a style="color:#fff" class="nav-link login-signup" href="logout.php" role="button">Logout</a>
								</li>

								<?php
							}
							?></ul>
						</div>
					</div>
				</nav></div>

				<!-- Optional JavaScript -->

				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script type="text/javascript" src="myScript.js"></script>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


