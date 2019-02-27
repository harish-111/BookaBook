
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

<!-- DISPLAYING PRODUCTS -->

<?php
$product = $_GET["searched_product"];
$category = "";
$sub_category = "";
?>
<div class="container" style="margin-top: 15px;">
	<h5>Search Results : </h5><hr>
	<ul class="nav nav-pills mb-3 nav-fill-dark" id="pills-tab" role="tablist">

		<?php
			$sql_get_product = "SELECT * FROM product WHERE lower(product_name) = lower('$product')";
			$result1 = $conn->query($sql_get_product);

			if ($result1->num_rows > 0) {
			    // output data of each row

			   ?>
			    <?php
				    while($row = $result1->fetch_assoc()) {
			        
				        $category = $row['product_category'];
				        $sub_category = $row['product_subcategory'];
				        ?>
				        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card">
							  <div class="card-header">
							  	<p class="card-header-text"><?php echo $row['product_name'];?></p>
							  </div>
							  <div class="card-body">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									  <ol class="carousel-indicators">
									  	<?php
										  	if($row['product_imgurl_01']!="")
												{
													?>
														<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
													<?php
												}
												if($row['product_imgurl_02']!="")
												{
													?>
														 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
													<?php
												}
												if($row['product_imgurl_03']!="")
												{
													?>
														  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_01']?>" alt="First slide">
											    </div>
														<?php
													}
													if($row['product_imgurl_02']!="")
													{
														?>
															  <div class="carousel-item">
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_02']?>" alt="Second slide">
											    </div>
														<?php
													}
													if($row['product_imgurl_03']!="")
													{
														?>
															  <div class="carousel-item">
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_03']?>" alt="Third slide">
											    </div>
														<?php
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


										    
										    <p class="card-text"> <strong>Available Sizes :</strong> 
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
<br>
<strong>Price :</strong> 
				<?php
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
				?></p>
										    <div class="card-button">
										    	<a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>" class="btn btn-dark">View Details</a>
										    	
										    </div>
										    
										  </div>
										</div>
									</div>
						 <?php
						 } 

						} else {
						 	?>
						 	
						<p>No results found</p>
									        
			        <?php
			   		}
			  
			?>
	  
	</div>
<hr>
	<div class="container">
		<h5>Related Products : </h5><hr>
		<div class="row">
		<?php
			$sql_related_products = "SELECT * FROM product WHERE product_category = '$category' AND lower(product_name) != lower('$product')";
			$result1 = $conn->query($sql_related_products);

			if ($result1->num_rows > 0) {
			    // output data of each row
			   ?>
			    <?php
				    while($row = $result1->fetch_assoc()) {
			        // echo "CATEGORY " . $row["product_category"]."<br>";
				        
				        ?>
				        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="card">
							  <div class="card-header">
							  	<p class="card-header-text"><?php echo $row['product_name'];?></p>
							  </div>
							  <div class="card-body">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									  <ol class="carousel-indicators">
									  	<?php
										  	if($row['product_imgurl_01']!="")
												{
													?>
														<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
													<?php
												}
												if($row['product_imgurl_02']!="")
												{
													?>
														 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
													<?php
												}
												if($row['product_imgurl_03']!="")
												{
													?>
														  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_01']?>" alt="First slide">
											    </div>
														<?php
													}
													if($row['product_imgurl_02']!="")
													{
														?>
															  <div class="carousel-item">
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_02']?>" alt="Second slide">
											    </div>
														<?php
													}
													if($row['product_imgurl_03']!="")
													{
														?>
															  <div class="carousel-item">
											      <img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_03']?>" alt="Third slide">
											    </div>
														<?php
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


										    
										    <p class="card-text"> <strong>Available Sizes :</strong> 
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
<br>
<strong>Price :</strong> 
				<?php
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
				?></p>
										    <div class="card-button">
										    	<a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>" class="btn btn-dark">View Details</a>
										    	
										    </div>
										    
										  </div>
										</div>
									</div>
						 <?php
						 } 

						} else {
						 	?>
						 	
						<p>No results found</p>
									        
			        <?php
			   		}
			  
			?>
	  </div>
	</div>




<?php

include 'footer.php';

?>
