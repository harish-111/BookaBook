<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Home</title>

    
  </head>
  <body>

<?php

error_reporting(0);

$admin_id = $_POST["admin_id"];
$admin_password = $_POST["admin_password"];

if($admin_id=="cognizant" && $admin_password=="cts@2019")
{
	?>
		<div class="alert alert-success text-center" role="alert">
		  Login successful. Redirecting...
		  <script>
		    window.setTimeout(function() {
		        window.location.assign('admindashboard.php');
		    }, 2000);
		  </script>
		</div>
	<?php
} else {
	?>
		<div class="alert alert-danger text-center" role="alert">
		  Username/Password incorrect. Redirecting...
		  <script>
		    window.setTimeout(function() {
		        window.location.assign('index.php');
		    }, 2000);
		  </script>
		</div>
	<?php
}
?>

</body>
</html>