<?php
include 'connect.php';
include 'header.php';


?>
<style type="text/css">
	.nav-pills .nav-link.active, .nav-pills .show>.nav-link{
		background-color: #343a40;
		color:#ffffff;	}
	.nav-link{
		color:#343a40;
	}
</style>

<!-- DISPLAYING PRODUCT DETAILS -->
<div class="container" style="margin-top:20px;">
	<div class="row">
	<div class="col-md-7 col-xs-12">
		<?php
	$product_id = $_GET['product_id'];
	$sql_fetch_product_details = "SELECT * FROM product WHERE product_id = $product_id";
	$result_fetch_product_details = $conn->query($sql_fetch_product_details);

	if ($result_fetch_product_details->num_rows > 0) {
	    // output data of each row
	    while($row = $result_fetch_product_details->fetch_assoc()) {
	        ?>
	        <h5><?php echo $row['product_name'];?></h5>
        	<p><?php echo $row['product_category'];?> > <?php echo $row['product_subcategory'];?></p>

  
			<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="max-width: 350px;">
				<ol class="carousel-indicators">
					<?php
					if($row['product_imgurl_01']!="")
					{
						?>
							<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
						<?php
					}
					if($row['product_imgurl_02']!="")
					{
						?>
							<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
						<?php
					}
					if($row['product_imgurl_03']!="")
					{
						?>
							<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
						<?php
					}
					?>
				
				</ol>
				<div class="carousel-inner">
				<?php
					if($row['product_imgurl_01']!="")
					{
						?>
							<div class="carousel-item active">
								<img class="d-block" style="width:100%;" src="admin/actions/uploads/<?php echo $row['product_imgurl_01'];?>">
							</div>
						<?php
					}
					if($row['product_imgurl_02']!="")
					{
						?>
							<div class="carousel-item">
							<img class="d-block" style="width:100%;" src="admin/actions/uploads/<?php echo $row['product_imgurl_02'];?>">
						</div>
						<?php
					}
					if($row['product_imgurl_03']!="")
					{
						?>
							<div class="carousel-item">
							<img class="d-block" style="width:25%;" src="admin/actions/uploads/<?php echo $row['product_imgurl_03'];?>">
						</div>
						<?php
					}
					?>
			
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>
			<hr>

			
			<h6><b>Sizes Available :</b> 
				<?php
				if($row['product_size_01']!="")
					{
						echo $row['product_size_01'];
					}
				for($i=2;$i<6;$i++)
				{
					if($row['product_size_0'.$i]!="")
					{
						echo ' | '.$row['product_size_0'.$i];
					}
				}
				?>
				</h6>
			<hr>	
			<h6><b>Price : </b><?php
				if($row['product_discount']!=0)
				{
					if($row['product_price_01']!=0)
					{
						echo '<span style="text-decoration : line-through;">'.'Rs. '.$row['product_price_01'].'</span> ';
						echo '<b>Rs. '.($row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100))).'</b>';

					}
					for($i=2;$i<6;$i++)
					{
						if($row['product_price_0'.$i]!=0)
						{
							echo ' | <span style="text-decoration : line-through;">'.' Rs. '.$row['product_price_0'.$i].'</span> ';
							echo '<b>Rs. '.($row['product_price_0'.$i] - ($row['product_price_0'.$i]*($row['product_discount']/100))).'</b>';
						}

					}
					echo '<br><b><i><span style="color : green;margin-left:100px;">'.$row['product_discount'].'% off</i></b></span>';
				}
				else{
					if($row['product_price_01']!=0)
						{
							echo 'Rs. '.$row['product_price_01'];
						}
					for($i=2;$i<6;$i++)
					{
						if($row['product_price_0'.$i]!=0)
						{
							echo ' | Rs. '.$row['product_price_0'.$i];
						}
					}
				}
				?>
				
			<hr>


	</div>
	<div class="col-md-5 col-xs-12">
		<hr>
			<?php
				if($row['product_units_01']<1 && $row['product_units_02']<1 && $row['product_units_03']<1)
				{
					?>
					<p>Out of stock</p>
					<button type="button" disabled class="btn btn-dark">Add to cart</button><br/>
<br/><h6>About : </h6>
			<p><?php echo $row['product_description'];?></p>
			<hr>
					<?php
				}
				else
				{
					?>
					<p>In stock</p>
					      	<form method="post">
					      		<input type="hidden" name="product_id_picked" value="<?php echo $row['product_id'];?>">
					      		<input type="hidden" name="product_name_picked" value="<?php echo $row['product_name'];?>">
					      		<label for="product_size">Pick size : </label>
					      		<select name="product_size" id="product_size">
					      			<?php
					      				for($i=1;$i<6;$i++)
					      				{
					      					if($row['product_units_0'.$i]>0)
								      		{
								      			?>
								      			<option value="<?php echo $row['product_size_0'.$i];?>">
								      				<?php echo $row['product_size_0'.$i];?>
								      			</option>
								      			<?php
								      		}
								      		else
								      		{
								      			if($row['product_size_0'.$i]!="")
								      			{
								      			?>
								      			<option disabled>
								      				<?php echo $row['product_size_0'.$i].' : Out of stock.';?>
								      			</option>
								      			<?php
								      			}
								      		}
					      				}

					      			?>
					      		</select><br>

					      				

					      		<label for="product_units">Pick no of units : </label>
					      		<select name="product_units" id="product_units">
					      			<?php
					      				for($i=1;$i<=10;$i++)
					      				{
					      					?>
								      			<option value="<?php echo $i;?>">
								      				<?php echo $i;?>
								      			</option>
								      		<?php
					      				}

					      			?>
					      		</select><br>
					 
					       <input type="submit" id="add_to_cart_form" name="add_to_cart_form" class="btn btn-dark" value="Add to cart" style="visibility: visible;">
					       <a class="btn btn-dark" id="show_cart_now" style="visibility: hidden" href="show_cart.php">View Cart</a>
					       <div id="cart_notification"></div>
<br>
<h6>About : </h6>
			<p><?php echo $row['product_description'];?></p>
			<hr>
					      </div>
					      </form>
					      
					    
					<?php
		        	if(isset($_POST['add_to_cart_form']))
		        	{
							    $picked_id = $_POST['product_id_picked'];
							    $picked_quantity = $_POST['product_units']; 
							    $picked_size = $_POST['product_size'];
							    $picked_name = $_POST['product_name_picked'];
							    $picked_price = 0;

								$sql_fetch_product_price = "SELECT * FROM product WHERE product_id = $picked_id";
								$result_fetch_product_price = $conn->query($sql_fetch_product_price);

								if ($result_fetch_product_price->num_rows > 0) {
								    // output data of each row
								    while($row = $result_fetch_product_price->fetch_assoc()) {
                                        if($row['product_discount']!=0)
                                        {
                                        	if($picked_size == $row['product_size_01'])
									        {
									        	$picked_price = $row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100));
									        }
									        if($picked_size == $row['product_size_02'])
									        {
									        	$picked_price = $row['product_price_02'] - ($row['product_price_02']*($row['product_discount']/100));
									        }
									        if($picked_size == $row['product_size_03'])
									        {
									        	$picked_price = $row['product_price_03'] - ($row['product_price_03']*($row['product_discount']/100));
									        }
									        if($picked_size == $row['product_size_04'])
									        {
									        	$picked_price = $row['product_price_04'] - ($row['product_price_04']*($row['product_discount']/100));
									        }
									        if($picked_size == $row['product_size_05'])
									        {
									        	$picked_price = $row['product_price_05'] - ($row['product_price_05']*($row['product_discount']/100));
									        }
                                        }   
                                        else {          	         
									        if($picked_size == $row['product_size_01'])
									        {
									        	$picked_price = $row['product_price_01'];
									        }
									        if($picked_size == $row['product_size_02'])
									        {
									        	$picked_price = $row['product_price_02'];
									        }
									        if($picked_size == $row['product_size_03'])
									        {
									        	$picked_price = $row['product_price_03'];
									        }
									        if($picked_size == $row['product_size_04'])
									        {
									        	$picked_price = $row['product_price_04'];
									        }
									        if($picked_size == $row['product_size_05'])
									        {
									        	$picked_price = $row['product_price_05'];
									        }
									    }
									        
								}
							}

							    echo $picked_quantity."  :  ".$picked_size.'  :  '.$picked_name."  :  ".$picked_price;
			        				if(in_array($picked_id,$_SESSION['cart_content']))
			        				{
			        					?>
			        						<script type="text/javascript">
			        						document.getElementById("cart_notification").innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">This product is already in the cart.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			        						</script>

			        					<?php
			        				}
			        				else {
			        					array_push($_SESSION['cart_content'], $picked_id);
		        						array_push($_SESSION['cart_content_size'], $picked_size);
		        						array_push($_SESSION['cart_content_units'], $picked_quantity);
		        						array_push($_SESSION['cart_content_name'], $picked_name);
		        						array_push($_SESSION['cart_content_price'], $picked_price);
		        						$_SESSION['cart_count'] = $_SESSION['cart_count'] + 1;
		        						?>
		        							<script type="text/javascript">
			        						document.getElementById("cart_notification").innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">Added to cart.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			        						</script>
		        							
		        						<?php	
			        				}
		        				
		        			?>
		        			<script>	
		        							document.getElementById('show_cart_now').style.visibility='visible';
		        							document.getElementById('add_to_cart_form').style.visibility='hidden';
		        							document.getElementById('add_to_cart_form').style.display='none';
											document.getElementById('cart_link').innerHTML=" <i class='fas fa-shopping-cart'></i> (<?php echo count($_SESSION['cart_content']);?>)";
				        					
				        		
				        	</script>
		        			<?php
		        	}
		        	
				}
	    }
	} else {
	    echo "0 results";
	}
	?>
	</div>
</div>
</div>

<?php
	include 'footer.php';
?>