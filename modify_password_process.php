<?php

include 'connect.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="signup.css" rel="stylesheet">
    <title>BOOKaBOOK | Reset Password</title>
    <style type="text/css">
    	.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: auto;
		}
    </style>
       
</head>
 <body class="text-center">
<?php
 	$current_user_email = $_POST['user_Email'];
	$new_password = $_POST['newPassword'];
	$sql_modify_password = "UPDATE registered_user SET user_password = '$new_password' WHERE user_email = '$current_user_email'";
	
	if ($conn->query($sql_modify_password) === TRUE) {
    ?>
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
		  <p><strong>Password Modified!</strong></p>
		  <p>Redirecting to Login Page.</p>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<script>
			window.setTimeout(function() {
			        window.location.assign('login.php');
			}, 2000);
		</script>

    <?php
	} else {
	    ?>
	    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
		  <p><strong>Failed to update password. Try again later!</strong></p>
		  <p>Redirecting to Login Page.</p>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<script>
			window.setTimeout(function() {
			        window.location.assign('login.php');
			}, 2000);
		</script>
	    <?php
	}
