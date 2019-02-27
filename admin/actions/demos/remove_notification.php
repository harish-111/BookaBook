<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <title>Glamaroma | Admin Panel</title>

    
  </head>
  <body>

<?php
include 'connect.php';

error_reporting(0);


//Reading form values


$sql = "DELETE FROM offer_notification WHERE notification_id = 1";

		if ($conn->query($sql) === TRUE) {
		    ?>

		    <div class="alert alert-success text-center" role="alert">
			  <p>Notification deleted successfully. Redirecting...</p>
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

	
$conn->close();
?>


</body>
</html>