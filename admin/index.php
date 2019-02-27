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

  	<!-- NAVBAR-TOP -->
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<img class="navbar-brand" src="../logo.png">
	   	 <ul class="navbar-nav" style="position:absolute;right:20px;">
	   		<li class="nav-item">
	   			<button class="nav-link login-signup btn btn-dark text-light" role="button">Admin Panel</button>
	   		</li>
	   	</ul>
	</nav>

	<!-- <section id="admin_actions" style="margin-top:20px;">
		<div class="container">
			<button class="btn btn-dark" href="addproduct.php">Add a Product</button>
		</div>
	</section> -->

	<section id="login_panel" style="margin-top:20px;">
		<div class="container text-center">
			<form action="adminlogin.php" method="post" style="max-width: 40%; margin:0 auto;">
			  <div class="form-group">
			    <input type="text" class="form-control" id="admin_id" name="admin_id" placeholder="Enter ID">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-dark center">Login</button>
			</form>
		</div>
	</section>


<!-- 
	<footer>
		<div class="row bg-dark text-light" id="bottom-nav">
			<p class="bottom-nav-text">Made with &hearts; in India<br>
					Designed and Developed by <a href="http://www.tabdeel.in" target="_blank" class="tabdeel-link">Tabdeel Studios</a>
			</p>
		</div>
	</footer>
	 -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>