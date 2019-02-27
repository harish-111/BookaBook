<?php

session_start();
include 'connect.php';
$order_date = date("d-m-Y h:i:s A");

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$delivery_pincode = $_POST['user_zip'];
$delivery_city = $_POST['user_city'];
$delivery_state = $_POST['user_state'];
$shipping_address = $_POST['user_address'].','.$_POST['user_city'].','.$_POST['user_state'].','.$_POST['user_zip'];
$order_price = $_POST['order_price'];
$contact_number=$_POST['user_contact'];

$deliver_to=$_POST['deliver_to'];
$landmark_address=$_POST['landmark_address'];

$save_ids = implode(",",$_SESSION['cart_content']);
$save_names = implode(",",$_SESSION['cart_content_name']);
$save_sizes = implode(",",$_SESSION['cart_content_size']);
$save_units = implode(",",$_SESSION['cart_content_units']);
$save_price = implode(",",$_SESSION['cart_content_price']);

$sql_save_order = "INSERT INTO placed_order(user_id, user_email, product_id, product_name, product_size, product_price, product_quantity, shipping_address, delivery_pincode, delivery_city, delivery_state, contact_number, order_price, deliver_to, landmark_address, order_datetime) VALUES('$user_id','$user_email','$save_ids','$save_names','$save_sizes','$save_price','$save_units','$shipping_address', '$delivery_pincode', '$delivery_city', '$delivery_state','$contact_number','$order_price','$deliver_to','$landmark_address','$order_date')";

if ($conn->query($sql_save_order) === TRUE) {
    echo "Order placed successfully";

    

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>