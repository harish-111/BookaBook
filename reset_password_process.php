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

	$user_mail = $_POST['user_email'];
	$user_mobile = $_POST['user_mobile'];

	$sql_fetch_user = "SELECT * FROM registered_user WHERE user_email = '$user_mail' AND user_mobile = '$user_mobile'";

	$result = $conn->query($sql_fetch_user);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			?>
			<div class="container" style="margin-top: 20px;">
				<div class="card">
					<div class="card-header">
						Hi <?php echo $row['user_name']?>. Update your password below.
					</div>
					<div class="card-body">
						<form class="form-signin" action="modify_password_process.php" method="post">
							
							<div class="form-group">
								<label for="newPassword">Enter New Password</label>
								<input type="text" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
							</div>
							<input type="hidden" class="form-control" name = "user_Email" id="user_Email" value="<?php echo $row['user_email'];?>">
							<button type="submit" class="btn btn-dark" name="modify_password">Update Password</button>
							<br><br>
							<a href="login.php" style="color:#000000;">Back to Login</a><br>
							<p class="mt-5 mb-3 text-muted">&copy; BOOKaBOOK 2018</p>
						</form>
					</div>
				</div>
				
			</div>
			
			
			<?php
		}
	} else {
		?>	
		<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
			<p><strong>Incorrect Details!</strong></p>
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


	?>
</body>
</html>