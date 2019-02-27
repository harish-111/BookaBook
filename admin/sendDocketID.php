<?php
//post
include 'actions/connect.php';
$url="www.way2sms.com/api/v1/sendCampaign";
$mobile = $_POST['contact_number'];
$courier_name=$_POST['pick_courier'];
$deliver_to=$_POST['deliver_to'];
$track_link="";
$order_id = $_POST['order_id'];
if($courier_name == "dtdc")
{
	$track_link = "www.dtdc.in";
} else if($courier_name == "fedex")
{
	$track_link = "www.fedex.com";
} else if($courier_name == "delhivery")
{
	$track_link = "www.delhivery.com";
}

$docket_id = $_POST['docket_id'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=ZJU4FOHA7E0D5EIOXLFJQHWCBCTS339W&secret=RIUXIJO3LBJI3VAF&usetype=prod&phone=$mobile&senderid=GAROMA&message=Hi $deliver_to! You order is shipped by $courier_name. The Docket ID is : $docket_id! Track your order : $track_link");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;


$sql_modify_courier_details = "UPDATE placed_order SET courier_name = '$courier_name', docket_id = '$docket_id' WHERE order_id = '$order_id'";
$conn->query($sql_modify_courier_details);
?>

<script>
    window.setTimeout(function() {
     window.location.assign('sheetview.php');
    }, 2000);
</script>