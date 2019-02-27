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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
    <title>Glamaroma | Home</title>
  
<style>

#headingZero:hover{
			cursor: pointer;
		}
		#headingOne:hover{
			cursor: pointer;
		}
		#headingTwo:hover{
			cursor: pointer;
		}
		#headingThree:hover{
			cursor: pointer;
		}


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
</head>
    <body>

  	<div class="">
  	<!-- NAVBAR-TOP -->
  	<div class="text-center">
  		<a href="index.php"><img class="img-fluid" style="margin: 0 auto; max-width: 30%" src="logo.png"></a>
  	</div>
        

  	
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
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
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
			  <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search for a product" style="width:150px">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="submit" name="process_search"><i class="fas fa-search"></i></button>
			  </div>
			</div>
			</form>
	    </div>

	    <a class="nav-link login-signup" style="color:#000000;display:inline;" id="cart_link" href="show_cart.php" role="button"><i class="fas fa-shopping-cart"></i> (<?php echo count($_SESSION['cart_content']);?>)</a>
<?php
	   			if(!isset($_SESSION['user_name'])) {
		   			
		   				?>
		   				
						
						<li class="nav-item" style="font-size:18px;font-weight:700;list-style-type:none;display:inline;" style="color:#000000;">
							<a class="nav-link login-signup" style="color:#000000;display:inline;" href="login.php" role="button">Login | Sign Up</a>
						</li>
						<?php
		   			}
	   		
		   			
	   			?>
	
	    
<div class="collapse navbar-collapse" id="navbarSupportedContent">
	   	<ul class="navbar-nav" style="font-size:18px;font-weight:700;">
	   		
	   			<?php
	   			$userpassword = $_POST['user_password'];
	   			$useremail = $_POST['user_email'];
	   			if(isset($_SESSION['user_name']))
	   			{
	   				?>
	   				

					    
						<li class="nav-item">
							<a class="nav-link" href="user_orders.php" role="button">
								<span class="user-dropdown-title">Hello, <?php echo $_SESSION['user_name'];?></span><br>Your Orders
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="user_profile.php" role="button">
								<span class="user-dropdown-title">View your</span><br>Profile
							</a>
						</li>
						<li class="nav-item" style="margin-top: 14px;">
							<a class="nav-link login-signup" href="logout.php" role="button">Logout</a>
						</li>
					
					<?php
	   			}
?></ul>

	    </div>

	   	
	    
	</nav></div>

  <div class="accordion" id="accordionExample">
<h5 style="padding:20px;margin-bottom:0"><strong>Configure your pallete by selecting shades from below : </strong></h5>
    <div class="card">
    <div class="card-header" id="headingZero" data-toggle="collapse" data-target="#collapseZero">
      <h5 class="mb-0">
          Magnetic Palette, Highlighter and Blush <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>

    <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionExample">
      <!-- Magnetic Palette, Highlighter and Blush -->
		<div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_glitters = "SELECT * FROM palette_colors WHERE color_category LIKE 'MAGNETIC PALETTE, HIGHLIGHTER AND BLUSH'";
			$result_fetch_glitters = $conn->query($sql_fetch_glitters);

			if ($result_fetch_glitters->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_glitters->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
								<div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
      <h5 class="mb-0">
          Glitters <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <!-- GLITTERS -->
		<div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_glitters = "SELECT * FROM palette_colors WHERE color_category LIKE 'GLITTERS'";
			$result_fetch_glitters = $conn->query($sql_fetch_glitters);

			if ($result_fetch_glitters->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_glitters->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
								<div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
      <h5 class="mb-0">
          Shimmers <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>
 
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
    	 <!-- SHIMMERS -->
      <div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_shimmers = "SELECT * FROM palette_colors WHERE color_category LIKE 'SHIMMERS'";
			$result_fetch_shimmers = $conn->query($sql_fetch_shimmers);

			if ($result_fetch_shimmers->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_shimmers->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
							    <div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree">
      <h5 class="mb-0">
          Matte <span style="position: absolute; right:50px;"><i class="fas fa-caret-down"></i></span>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
       <!-- MATTE -->
      <div class="row" style="width:100%;margin:0;">
		<?php
			$sql_fetch_matte = "SELECT * FROM palette_colors WHERE color_category LIKE 'MATTE'";
			$result_fetch_matte = $conn->query($sql_fetch_matte);

			if ($result_fetch_matte->num_rows > 0) {
			    // output data of each row
			    while($row = $result_fetch_matte->fetch_assoc()) {
			    	?>
			        	<div class="col-md-1 col-sm-2 col-4" style="margin:0;padding:0;">
							<div class="card" id="<?php echo $row['color_code'];?>" onclick="add_to_palette('<?php echo $row['color_name'];?>','<?php echo $row['color_price'];?>','<?php echo $row['color_units'];?>','<?php echo $row['color_code'];?>')">
							    <div id="carouselExampleIndicators<?php echo $row['color_code'];?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['color_image1']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image1']?>" alt="First slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image2']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image2']?>" alt="Second slide">
                                  </div>
                                    <?php
                                  }
                                  if($row['color_image3']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <img class="d-block w-100" src="glamaroma_admin_access/actions/uploads/palette_shades/<?php echo $row['color_image3']?>" alt="Third slide">
                                  </div>
                                    <?php
                                  }

                                  
                                ?>
                          
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                             </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $row['color_code'];?>" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
							    <div class="card-footer text-center">
							      <small class="text-muted"><?php echo $row['color_name'];?></small>
							    </div>
							</div>
						</div>
					<?php
			    }
			} else {
			    echo "0 results";
			}
		?>
		</div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var picked_colors_shades = new Array();
	var picked_colors_price = new Array();
	var picked_colors_units = new Array();
	var picked_colors_codes = new Array();

	function add_to_palette(color,price,units,code){
		if(picked_colors_codes.includes(code))
		{
			document.getElementById(code).style.opacity="1";
			remove_shade(picked_colors_codes,code);
			refresh_palette();
		}
		else
		{
			picked_colors_shades.push(color);
			picked_colors_price.push(price);
			picked_colors_units.push(1);
			picked_colors_codes.push(code);
			document.getElementById(code).style.opacity="0.5";
			refresh_palette();
		}		
	}

		
	function remove_shade(array, code){
		var index=0;
		for(i=0;i<array.length;i++)
		{
			if(array[i]==code)
			{
				array.splice(i,1);
                                picked_colors_shades.splice(i,1);
				picked_colors_price.splice(i,1);
				picked_colors_units.splice(i,1);
			}
		}
	}

	function refresh_palette(){
		if(picked_colors_codes.length == 0){
			document.getElementById("display_notification").innerHTML = "<b>Pick a shade to continue.</b>";
			document.getElementById("display_shades").innerHTML = "";
			document.getElementById("display_codes").innerHTML = "";
			document.getElementById("display_price").innerHTML = "";
			document.getElementById("display_units").innerHTML = "";
			document.getElementById("display_total").innerHTML = "";
			document.getElementById("save_palette_button").style.visibility = "hidden";
			document.getElementById("add_to_cart_button").style.visibility = "hidden";
		}
		else{
			document.getElementById("save_palette_button").style.visibility = "visible";
			document.getElementById("add_to_cart_button").style.visibility = "visible";
			document.getElementById("display_notification").innerHTML = "";
			document.getElementById("display_shades").innerHTML = "<b>Shades : </b>"+picked_colors_shades.toString();
			document.getElementById("display_codes").innerHTML = "<b>Codes : </b>"+picked_colors_codes.toString();
			document.getElementById("display_price").innerHTML = "<b>Price(per shade)(in Rs.) : </b>"+picked_colors_price.toString();
			document.getElementById("display_units").innerHTML = "<b>Units(per shade) : </b>"+picked_colors_units.toString();
			document.getElementById("display_total").innerHTML = "<b>Total : Rs. "+calculate_total()+"</b>";
		}
	}

	function calculate_total(){
		var total=0.0;
		for (x in picked_colors_price) {
		    total += parseFloat(picked_colors_price[x]);
		}
                document.getElementById("display_discount_notification").innerHTML = "";

                if(total > 1000 && total < 1500)
		{
			total = total - total*.05;
			document.getElementById("display_discount_notification").innerHTML = "<b><i>(5% off)</i></b>";
		}
		else if(total >= 1500 && total < 2000)
		{
			total = total - total*.075;
			document.getElementById("display_discount_notification").innerHTML = "<b><i>(7.5% off)</i></b>";
		}
		else if(total >= 2000 && total < 2500)
		{
			total = total - total*.10;
			document.getElementById("display_discount_notification").innerHTML = "<b><i>(10% off)</i></b>";
		}
		else if(total >= 2500)
		{
			total = total - total*.125;
			document.getElementById("display_discount_notification").innerHTML = "<b><i>(12.5% off)</i></b>";
		}

		return total;
	}
</script>

<?php

if(isset($_POST['save_palette_process']))
{
	echo "SUBMITTED>";
	echo $_POST['shades_to_save'];
}

?>

<section id="user_palette" style="position: sticky; bottom:0; background-color: #e7e7e7; padding:20px;max-height: 200px; overflow: scroll;"">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h5 style="text-decoration: underline;" class="align-middle"><b>Your Palette</b></h5>
				<p style="font-size: 16px;" id="display_notification"><b>Pick a shade to continue.</b></p>
				<p style="font-size: 16px;" id="display_shades"></p>
                                <p style="font-size: 16px;" id="display_codes"></p>
			</div>
			<div class="col-sm-4">
				<p style="font-size: 16px;" id="display_price"></p>
				<p style="font-size: 16px;" id="display_units"></p>
				<p style="font-size: 16px;margin-bottom: 0" id="display_total"></p>
                                <p style="font-size: 14px;color:green;margin-top:0" id="display_discount_notification"></p>					
			</div>
			<div class="col-sm-4">
				<form method="post" action="#">
					<input type="hidden" name="shades_to_save" id="shades_to_save">
					<button id="save_palette_button" name="save_palette_process" style="visibility: hidden;" class="btn btn-dark mr-auto">Save Palette</button>
					<button id="add_to_cart_button" name="add_to_cart_process" style="visibility: hidden;" class="btn btn-dark">Add to Cart</button>
				</form>
			</div>
		</div>
	</div>
</section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>