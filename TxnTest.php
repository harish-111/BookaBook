<?php
session_start();
header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");


include 'connect.php';
date_default_timezone_set("Asia/Kolkata");
$order_date = date("d-m-Y h:i:s A");

$coupon_code_used = $_POST['coupon_code_used'];
$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$user_street = $_POST['user_address'];
$user_city = $_POST['user_city'];
$user_state = $_POST['user_state'];
$user_zip = $_POST['user_zip'];
$shipping_address = $_POST['user_address'].','.$_POST['user_city'].','.$_POST['user_state'].','.$_POST['user_zip'];
$order_price = $_POST['order_price'];
$contact_number=$_POST['user_contact'];
$deliver_to = $_POST['deliver_to'];
$landmark_address = $_POST['landmark_address'];

if(isset($_POST['defaultCheck1']))
{
  $sql_save_address = "UPDATE registered_user SET user_street = '$user_street', user_city = '$user_city', user_state = '$user_state', user_zip = '$user_zip' WHERE user_id = $user_id";
  $conn->query($sql_save_address);
}

if(isset($_POST['check_COD']))
{
      $ORDER_ID = $_POST["ORDER_ID"];
    $CUST_ID = $_POST["CUST_ID"];
    $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
    $CHANNEL_ID = $_POST["CHANNEL_ID"];
    $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

  $save_ids = implode(",",$_SESSION['cart_content']);
  $save_names = implode(",",$_SESSION['cart_content_name']);
  $save_sizes = implode(",",$_SESSION['cart_content_size']);
  $save_units = implode(",",$_SESSION['cart_content_units']);
  $save_price = implode(",",$_SESSION['cart_content_price']);

$sql_save_order_cod = "INSERT INTO placed_order(user_id, user_email, product_id, product_name, product_size, product_price, product_quantity, shipping_address, delivery_pincode, delivery_city, delivery_state, contact_number, order_price, coupon_code, payment_id, payment_status, deliver_to, landmark_address, order_datetime) VALUES('$user_id','$user_email','$save_ids','$save_names','$save_sizes','$save_price','$save_units','$shipping_address','$user_zip','$user_city','$user_state','$contact_number','$TXN_AMOUNT', '$coupon_code_used','$ORDER_ID', 'Cash on Delivery', '$deliver_to','$landmark_address','$order_date')";

if ($conn->query($sql_save_order_cod) === TRUE) {
    echo "Order details stored successfully.";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<script type="text/javascript">
  window.location="PgResponseCOD.php";
</script>
<?php
}
else {

  $ORDER_ID = $_POST["ORDER_ID"];
  $CUST_ID = $_POST["CUST_ID"];
  $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
  $CHANNEL_ID = $_POST["CHANNEL_ID"];
  $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

$save_ids = implode(",",$_SESSION['cart_content']);
$save_names = implode(",",$_SESSION['cart_content_name']);
$save_sizes = implode(",",$_SESSION['cart_content_size']);
$save_units = implode(",",$_SESSION['cart_content_units']);
$save_price = implode(",",$_SESSION['cart_content_price']);

$sql_save_order = "INSERT INTO placed_order(user_id, user_email, product_id, product_name, product_size, product_price, product_quantity, shipping_address, delivery_pincode, delivery_city, delivery_state, contact_number, order_price, coupon_code, payment_id, deliver_to, landmark_address, order_datetime) VALUES('$user_id','$user_email','$save_ids','$save_names','$save_sizes','$save_price','$save_units','$shipping_address','$user_zip','$user_city','$user_state','$contact_number','$TXN_AMOUNT', '$coupon_code_used','$ORDER_ID','$deliver_to','$landmark_address','$order_date')";

if ($conn->query($sql_save_order) === TRUE) {
    echo "Order details stored successfully.";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body onload="submitOrder()">
<script>
function submitOrder(){
   document.getElementById("submit_order").submit();
}
</script>
  <h4 class="text-center">Order Details : </h4>
  <pre>
  </pre>
<div class="container">
  <form method="post" action="pgRedirect.php" id="submit_order">
    <table class="table">
      <tbody>
        <tr>
          <th>S.No</th>
          <th>Label</th>
          <th>Value</th>
        </tr>
        <tr>
          <td>1</td>
          <td><label>ORDER_ID::*</label></td>
          <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
            name="ORDER_ID" autocomplete="off"
            value="<?php echo $ORDER_ID?>">
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><label>CUSTID ::*</label></td>
          <td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $CUST_ID?>"></td>
        </tr>
        <tr>
          <td>3</td>
          <td><label>INDUSTRY_TYPE_ID ::*</label></td>
          <td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="<?php echo $INDUSTRY_TYPE_ID?>"></td>
        </tr>
        <tr>
          <td>4</td>
          <td><label>Channel ::*</label></td>
          <td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
            size="12" name="CHANNEL_ID" autocomplete="off" value="<?php echo $CHANNEL_ID?>">
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td><label>txnAmount*</label></td>
          <td><input title="TXN_AMOUNT" tabindex="10"
            type="text" name="TXN_AMOUNT"
            value="<?php echo $TXN_AMOUNT?>"> 
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><input value="CheckOut" type="submit" onclick=""></td>
        </tr>
      </tbody>
    </table>
    * - Mandatory Fields
  </form>
</div>
</body>
</html>


