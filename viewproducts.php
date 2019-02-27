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

<!-- Add to cart -->
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
      
                
              ?>


<!-- DISPLAYING PRODUCTS -->

<?php
$category = $_GET["category"];
$subcategory = $_GET["sub_category"];

?>
<div class="container">
	<ul class="nav nav-pills mb-3 nav-fill-dark" id="pills-tab" role="tablist">

		<?php
			$category_temp = $category;
			$sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
			$result1 = $conn->query($sql_subcategory);

			if ($result1->num_rows > 0) {
			    // output data of each row
			   ?>
			    <?php
				    while($row = $result1->fetch_assoc()) {
			        // echo "CATEGORY " . $row["product_category"]."<br>";
				    	if($subcategory==$row['product_subcategory'])
				        {
				        ?>
				        <li class="nav-item">
						    <a class="nav-link active" id="<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])."-tab"?>" data-toggle="pill" href="#<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])?>" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $row['product_subcategory']?></a>
						 </li>
						 
						 <?php
						 } else {
						 	?>
						 	<li class="nav-item">
						    <a class="nav-link" id="<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])."-tab"?>" data-toggle="pill" href="#<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])?>" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $row['product_subcategory']?></a>
						 </li>
					
									        
			        <?php
			   		}
			    }
			}
			?>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<?php
			$category_temp = $category;
			$sql_subcategory = "SELECT DISTINCT product_subcategory FROM product WHERE product_category = '$category_temp'";
			$result1 = $conn->query($sql_subcategory);

			if ($result1->num_rows > 0) {
			    // output data of each row
			   ?>
			    <?php
				    while($row = $result1->fetch_assoc()) {
			        // echo "CATEGORY " . $row["product_category"]."<br>";
				    	if($subcategory==$row['product_subcategory'])
				        {
				        ?>
				        <div class="tab-pane fade show active" id="<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])?>" role="tabpanel">
				        	<div class="row">
				        	<?php
				        	$subcategory_temp = $row['product_subcategory'];
				        	$sql = "SELECT * FROM product WHERE product_category = '$category_temp' AND product_subcategory = '$subcategory_temp'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        ?>
							        <div class="col-md-4 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-header">
                      <p class="card-header-text"><?php echo $row['product_name'];?></p>
                    </div>
                    <div class="card-body" style="padding-bottom: 0;">
                      <div class="row">
                        <div class="col-sm-7 col-5" style="padding: 5px">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['product_imgurl_01']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_01']?>" alt="First slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_02']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_02']?>" alt="Second slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_03']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_03']?>" alt="Third slide"></a>
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
                          
                        </div>
                        <div class="col-sm-5 col-7" style="padding:5px">
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
        ?><br>
                            <strong>Price :</strong> 
                            <?php
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
              echo '<br><span style="text-decoration : line-through;">'.' Rs. '.$row['product_price_0'.$i].'</span> ';
              echo '<b>Rs. '.($row['product_price_0'.$i] - ($row['product_price_0'.$i]*($row['product_discount']/100))).'</b>';
            }

          }
          echo '<br><i><span style="color : green;">'.$row['product_discount'].'% off</i></span>';
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
        ?></p>
                          </p>
                          <div class="card-button">
                            <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>" title="View Details"><i class="fas fa-lg fa-info-circle" style="margin-bottom: 10px;"></i></a>
                            
                          </div>
                          <div class="card-button">
                            <form method="post">
                              <input type="hidden" name="product_id_picked" value="<?php echo $row['product_id'];?>">
                              <input type="hidden" name="product_name_picked" value="<?php echo $row['product_name'];?>">
                              <input type="hidden" name="product_size" value="<?php echo $row['product_size_01'];?>">
                              <input type="hidden" name="product_units" value="1">
                              <input type="submit" title="Add to Cart" id="add_to_cart_form" name="add_to_cart_form" class="btn btn-outline-dark" value="Add to cart" style="visibility: visible;">
                              <a class="btn btn-dark" id="show_cart_now" style="visibility: hidden" href="show_cart.php">View Cart</a>
                              <div id="cart_notification"></div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
								
									<?php

							      }
							  }
							} else {
								?>
			    			<div class="tab-pane fade" id="<?php echo "pills-".str_replace(' ', '', $row['product_subcategory'])?>" role="tabpanel">
				        	<div class="row">
				        	<?php
				        	$subcategory_temp = $row['product_subcategory'];
				        	$sql = "SELECT * FROM product WHERE product_category = '$category_temp' AND product_subcategory = '$subcategory_temp'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        ?>
							        <div class="col-md-4 col-sm-6 col-12">
                  <div class="card">
                    <div class="card-header">
                      <p class="card-header-text"><?php echo $row['product_name'];?></p>
                    </div>
                    <div class="card-body" style="padding-bottom: 0;">
                      <div class="row">
                        <div class="col-sm-7 col-5" style="padding: 5px">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <?php
                                  if($row['product_imgurl_01']!="")
                                  {
                                    ?>
                                      <div class="carousel-item active">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_01']?>" alt="First slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_02']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_02']?>" alt="Second slide"></a>
                                  </div>
                                    <?php
                                  }
                                  if($row['product_imgurl_03']!="")
                                  {
                                    ?>
                                        <div class="carousel-item">
                                    <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>"><img class="d-block w-100" src="admin/actions/uploads/<?php echo $row['product_imgurl_03']?>" alt="Third slide"></a>
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
                          
                        </div>
                        <div class="col-sm-5 col-7" style="padding:5px">
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
        ?><br>
                            <strong>Price :</strong> 
                            <?php
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
              echo '<br><span style="text-decoration : line-through;">'.' Rs. '.$row['product_price_0'.$i].'</span> ';
              echo '<b>Rs. '.($row['product_price_0'.$i] - ($row['product_price_0'.$i]*($row['product_discount']/100))).'</b>';
            }

          }
          echo '<br><i><span style="color : green;">'.$row['product_discount'].'% off</i></span>';
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
        ?></p>
                          </p>
                          <div class="card-button">
                            <a href="show_product_details.php?product_id=<?php echo $row['product_id'];?>" title="View Details"><i class="fas fa-lg fa-info-circle" style="margin-bottom: 10px;"></i></a>
                            
                          </div>
                          <div class="card-button">
                            <form method="post">
                              <input type="hidden" name="product_id_picked" value="<?php echo $row['product_id'];?>">
                              <input type="hidden" name="product_name_picked" value="<?php echo $row['product_name'];?>">
                              <input type="hidden" name="product_size" value="<?php echo $row['product_size_01'];?>">
                              <input type="hidden" name="product_units" value="1">
                              <input type="submit" title="Add to Cart" id="add_to_cart_form" name="add_to_cart_form" class="btn btn-outline-dark" value="Add to cart" style="visibility: visible;">
                              <a class="btn btn-dark" id="show_cart_now" style="visibility: hidden" href="show_cart.php">View Cart</a>
                              <div id="cart_notification"></div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
									<?php

							      }
							  }
							}
							?>
	</div>
</div>

<?php
}
}

?>
</div>
</div>
</div>
</div>

<?php



include 'footer.php';

?>