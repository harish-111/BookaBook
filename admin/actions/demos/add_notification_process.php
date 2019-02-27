<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <title>BOOKaBOOK | Admin Panel</title>

    
  </head>
  <body>

<?php
include 'connect.php';

error_reporting(0);


//Reading form values

$notification_header = $_POST["notification_header"];
$notification_content = $_POST["notification_content"];


$sql1 = "SELECT * FROM offer_notification";
	$result1 = $conn->query($sql1);
	$flag=0;
	if ($result1->num_rows > 0) {
    // output data of each row
    	while($row = $result1->fetch_assoc()) {
       		if($row["notification_id"]==1)
       			$flag=1;
    	}
	}

	if($flag==1)
		{
			
    	
			$sql = "UPDATE offer_notification SET notification_header = '$notification_header', notification_content = '$notification_content' WHERE notification_id = 1";

			if ($conn->query($sql) === TRUE) {
			    ?>

			    <div class="alert alert-success text-center" role="alert">
				  <p>Notification updated successfully. Redirecting...</p>
				  <script>
				    window.setTimeout(function() {
				        window.location.assign('../../admindashboard.php');
				    }, 2000);
			  	  </script>
				</div>

		<?php
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
		} else {


		$sql_insert_notification = "INSERT INTO offer_notification(notification_id,notification_header, notification_content) VALUES(1,'$notification_header', '$notification_content')";

		if ($conn->query($sql_insert_notification) === TRUE) {
			    ?>

			    <div class="alert alert-success text-center" role="alert">
				  <p>Notification updated successfully. Redirecting...</p>
				  <script>
				    window.setTimeout(function() {
				        window.location.assign('../../admindashboard.php');
				    }, 2000);
			  	  </script>
				</div>
				<?php
			}
		}

$conn->close();
?>


</body>
</html>