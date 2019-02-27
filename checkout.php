<?php
include 'connect.php';
error_reporting(0);
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$product_id = $_POST['proudct_id'];
	$product_name = $_POST['proudct_name'];
	$product_size = $_POST['proudct_size'];
	$product_price = $_POST['proudct_price'];
	$product_quantity = $_POST['product_quantity'];
	$shipping_address = $_POST['shipping_address'];
	$contact_number = $_POST['contact_number'];
	$order_price = $_POST['order_price'];

	$sql_save_order = "INSERT INTO placed_order (order_id, user_id, user_email, product_id, product_name, product_size, product_price, product_quantity, shipping_address, contact_number, order_price) VALUES('$order_id', '$user_id', '$user_email', '$product_id', '$product_name', '$product_size', '$product_price', '$product_quantity', '$shipping_address', '$contact_number', '$order_price')";

	if ($conn->query($sql_save_order) === TRUE) {
		?>
			<div class="alert alert-success" role="alert">
			  Order placed successfully.
			</div>
		<?php
	    
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	?>

</body>
</html>