<?php
session_start();
$product_id_delete = $_POST['product_id_delete'];
$key=array_search($product_id_delete,$_SESSION['cart_content']);
    if($key!==false)
    {
	   	unset($_SESSION['cart_content'][$key]);
	   	unset($_SESSION['cart_content_size'][$key]);
	   	unset($_SESSION['cart_content_units'][$key]);
	   	unset($_SESSION['cart_content_name'][$key]);
	   	unset($_SESSION['cart_content_price'][$key]);
	   	$_SESSION['cart_content'] = array_values($_SESSION['cart_content']);
		$_SESSION['cart_content_size'] = array_values($_SESSION['cart_content_size']);
		$_SESSION['cart_content_units'] = array_values($_SESSION['cart_content_units']);
		$_SESSION['cart_content_name'] = array_values($_SESSION['cart_content_name']);
		$_SESSION['cart_content_price'] = array_values($_SESSION['cart_content_price']);
    }
echo '<script>window.location.href = "show_cart.php";</script>';
?>
