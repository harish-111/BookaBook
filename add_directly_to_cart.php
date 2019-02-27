<?php

session_start();
include 'connect.php';

$picked_id = $_POST['product_id'];
$picked_quantity = 1; 
	
$sql_fetch_product_price = "SELECT * FROM product WHERE product_id = $picked_id";
$result_fetch_product_price = $conn->query($sql_fetch_product_price);

if ($result_fetch_product_price->num_rows > 0) {
	// output data of each row
	while($row = $result_fetch_product_price->fetch_assoc()) {
        if($row['product_discount']!=0)
            {
                $picked_name = $row['product_name'];
                $picked_size = $row['product_size_01'];
		$picked_price = $row['product_price_01'] - ($row['product_price_01']*($row['product_discount']/100));
		    }   
        else{          	         
                $picked_name = $row['product_name'];
		$picked_size = $row['product_size_01']);
		$picked_price = $row['product_price_01'];
	    }
      }
}

	if(in_array($picked_id,$_SESSION['cart_content']))
		{
			echo "Already in cart..";
		}
		else {
			array_push($_SESSION['cart_content'], $picked_id);
		    	array_push($_SESSION['cart_content_size'], $picked_size);
		   	 array_push($_SESSION['cart_content_units'], $picked_quantity);
		    	array_push($_SESSION['cart_content_name'], $picked_name);
		    	array_push($_SESSION['cart_content_price'], $picked_price);
		    	$_SESSION['cart_count'] = $_SESSION['cart_count'] + 1;
		    	echo "Added.";
		}		        							
?>
		        		