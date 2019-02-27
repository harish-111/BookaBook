<?php
session_start();
$product_array_id = $_POST['product_array_id'];
if(isset($_POST["reduce_quantity"]))
{
	if($_POST["current_quantity"]==1)
	{
		$_SESSION['cart_content_units'][$product_array_id]=1;
	}
	else{
		$_SESSION['cart_content_units'][$product_array_id]--;	
	}
}
else
{
	$_SESSION['cart_content_units'][$product_array_id]++;
}


echo '<script>window.location.href = "show_cart.php";</script>';
?>
