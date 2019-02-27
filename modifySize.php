<?php
session_start();
include 'connect.php';
$product_id = $_POST['product_id_size'];
$product_size_id = $_POST['product_size_id'];
$product_size_new = $_POST['product_size_modify'];
$picked_price = $_POST['product_picked_price'];

$_SESSION['cart_content_size'][$product_size_id]=$product_size_new;

$sql_fetch_product_price = "SELECT * FROM product WHERE product_id = $product_id";
$result_fetch_product_price = $conn->query($sql_fetch_product_price);

	if ($result_fetch_product_price->num_rows > 0) {
	    // output data of each row
	    while($row = $result_fetch_product_price->fetch_assoc()) {
                  if($row['product_discount']!=0)
                       {
                              	if($product_size_new == $row['product_size_01'])
				    {
				     	$picked_price = $row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100));
				    }
				if($product_size_new == $row['product_size_02'])
				    {
				      	$picked_price = $row['product_price_02'] - ($row['product_price_02']*($row['product_discount']/100));
				    }
			 	if($product_size_new == $row['product_size_03'])
				    {
				     	$picked_price = $row['product_price_03'] - ($row['product_price_03']*($row['product_discount']/100));
				    }
				if($product_size_new == $row['product_size_04'])
				    {
				       	$picked_price = $row['product_price_04'] - ($row['product_price_04']*($row['product_discount']/100));
				    }
				if($product_size_new == $row['product_size_05'])
				    {
				     	$picked_price = $row['product_price_05'] - ($row['product_price_05']*($row['product_discount']/100));
				    }
                     }   
                     else {          	         
				  if($product_size_new == $row['product_size_01'])
									        {
									        	$picked_price = $row['product_price_01'];
									        }
									        if($product_size_new == $row['product_size_02'])
									        {
									        	$picked_price = $row['product_price_02'];
									        }
									        if($product_size_new == $row['product_size_03'])
									        {
									        	$picked_price = $row['product_price_03'];
									        }
									        if($product_size_new == $row['product_size_04'])
									        {
									        	$picked_price = $row['product_price_04'];
									        }
									        if($product_size_new == $row['product_size_05'])
									        {
									        	$picked_price = $row['product_price_05'];
									        }
									    }
									        
								}
							}
							
							
$_SESSION['cart_content_price'][$product_size_id]=$picked_price;

echo '<script>window.location.href = "show_cart.php";</script>';
?>
