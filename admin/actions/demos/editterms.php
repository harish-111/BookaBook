<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>BOOKaBOOK | Admin Panel</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<img class="navbar-brand img-fluid" src="../../../logo.png" width="15%">
	   	 <ul class="navbar-nav" style="position:absolute;right:20px;">
	   		<li class="nav-item">
          <a class="btn btn-dark text-light" href="../../admindashboard.php" role="button">Back</a>
	   			<button class="btn btn-dark text-light" role="button">Admin Panel</button>
	   		</li>
	   	</ul>
	</nav>
  	<div class="container">
      <h6>Edit Terms & Conditions content below : </h6>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <div id="sample">
        <script type="text/javascript" src="../nicEdit.js"></script>
        <script type="text/javascript">
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>
        <textarea name="terms_content" cols="120" rows="10"></textarea>
        <br />
      </div>

    <input type="submit" name="terms_content_submit" class="btn btn-dark">
      </form>
    </div>
   
   	<?php
   	$terms_content = $_POST['terms_content'];
  	$myfile = fopen("../../../footer/terms_conditions.html", "w") or die("Unable to open file!");
    $header = '<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Glamaroma | Contact Us</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img class="navbar-brand img-fluid" src="../logo.png" width="15%">
       <ul class="navbar-nav" style="position:absolute;right:20px;">
        <li class="nav-item">
          <a href="../index.php" class="btn btn-dark text-light" role="button">Back</a>
        </li>
      </ul>
  </nav>
    <div class="container" style="padding:10px;">
    <h6>Terms & Conditions : </h6>';
    fwrite($myfile, $header);
    fwrite($myfile, $terms_content);
    $footer='</div><footer>
    
    <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <h5>Glamaroma</h5>
            <ul>
              <li><a href="about.html" class="tabdeel-link">About</a></li>
              <li><a href="contact_us.php" class="tabdeel-link">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <h5>Shopping</h5>
            <ul>
              <li><a href="shipping_policy.html" class="tabdeel-link">Shipping Policy</a></li>
              <li><a href="return_policy.html" class="tabdeel-link">Return/Cancellation Policy</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <h5>Legal/Privacy</h5>
            <ul>
              <li><a href="privacy_policy.html" class="tabdeel-link">Privacy Policy</a></li>
              <li><a href="terms_conditions.html" class="tabdeel-link">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>  
    </div>

    
    <div class="row" id="bottom-nav">
      <p class="bottom-nav-text">Made with &hearts; in India<br>
          Designed and Developed by <a href="http://www.tabdeel.in" target="_blank" class="tabdeel-link">Tabdeel Studios</a>
      </p>
    </div>
    
  </footer>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="myScript.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>';
  	fwrite($myfile, $footer);
  	fclose($myfile);
  	?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
