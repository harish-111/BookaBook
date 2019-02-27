<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../style.css">

    <style type="text/css">

    </style>

    <title>BOOKaBOOK | Admin Panel</title>
  </head>
  <body>

  	<!-- NAVBAR-TOP -->
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<img class="navbar-brand img-fluid" src="../../../logo.png">
	   	 <ul class="navbar-nav" style="position:absolute;right:20px;">
	   		<li class="nav-item">
	   			<a class="btn btn-dark text-light" href="../../admindashboard.php" role="button">Back</a>
	   			<button class="btn btn-dark text-light" role="button">Admin Panel</button>
	   		</li>
	   	</ul>
	</nav>


<?php
include 'connect.php';
error_reporting(0);

$sql_fetch_notification = "SELECT * FROM offer_notification WHERE notification_id = 1";

  $result = $conn->query($sql_fetch_notification);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      	$previous_header = $row['notification_header'];
      	$previous_content = $row['notification_content'];
      }
  }

?>
	<div class="container" style="margin-top: 25px; margin-bottom: 25px;">
	 <form action="add_notification_process.php" method="post">
		<div class="form-group">
			 
		  <div id="sample">
	        <script type="text/javascript" src="../nicEdit.js"></script>
	        <script type="text/javascript">
	          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	        </script>
	        <h5>Notification Header here : </h5>
	        <textarea class="form-control" id="notification_header" name="notification_header" rows="2"><?php echo $previous_header;?></textarea><hr>
	        <h5>Notification Content here : </h5>
	        <textarea class="form-control" id="notification_content" name="notification_content" rows="4"><?php echo $previous_content;?></textarea>
	      </div>
		</div>
		
		<br>   
		<button type="submit" name="submit_product" class="btn btn-success">Save changes</button>
		<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
	 </form>
	</div>
</body>
</html>