<?php

include 'connect.php';
error_reporting(0);

?>

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
	  
	$product_id = $_POST["product_id"];
	 

	$sql1 = "SELECT * FROM product WHERE product_id=$product_id";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc()
	
			?>
    	<div class="alert alert-success text-center" role="alert">
			  <p>Product Found. Modify the details below.</p>
		</div>
		
		<div class="container">
			<form action="modifyproductprocess.php" method="post">
			  <div class="form-group">
			    <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Product Category" value="<?php echo $row["product_category"];?>">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="product_subcategory" name="product_subcategory" placeholder="Product Sub-Category" value="<?php echo $row["product_subcategory"];?>">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="<?php echo $row["product_name"];?>">
			  </div>
			  <div class="form-group">
			    <div id="sample">
        <script type="text/javascript" src="../nicEdit.js"></script>
        <script type="text/javascript">
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>
        <textarea class="form-control" id="product_description" name="product_description" rows="4"><?php echo $row["product_description"]?></textarea>
        <br />
      </div>

			  </div>
			  
			  
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_01" name="product_size_01" placeholder="Size 01" value="<?php echo $row["product_size_01"];?>">
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_01" name="product_price_01" placeholder="Price for Size 01" value="<?php echo $row["product_price_01"];?>">
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_01" name="product_units_01" placeholder="Number of Units of Size 01" value="<?php echo $row["product_units_01"];?>">
			</div>
		</div>
			<br>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_size_02" name="product_size_02" placeholder="Size 02" value="<?php echo $row["product_size_02"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_price_02" name="product_price_02" placeholder="Price for Size 02" value="<?php echo $row["product_price_02"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_units_02" name="product_units_02" placeholder="Number of Units of Size 02" value="<?php echo $row["product_units_02"];?>">
				</div>
			</div>
			<br>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_size_03" name="product_size_03" placeholder="Size 03" value="<?php echo $row["product_size_03"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_price_03" name="product_price_03" placeholder="Price for Size 03" value="<?php echo $row["product_price_03"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_units_03" name="product_units_03" placeholder="Number of Units of Size 03" value="<?php echo $row["product_units_03"];?>">
				</div>
			</div>
			<br>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_size_04" name="product_size_04" placeholder="Size 04" value="<?php echo $row["product_size_04"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_price_04" name="product_price_04" placeholder="Price for Size 04" value="<?php echo $row["product_price_04"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_units_04" name="product_units_04" placeholder="Number of Units of Size 04" value="<?php echo $row["product_units_04"];?>">
				</div>
			</div>
			<br>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_size_05" name="product_size_05" placeholder="Size 05" value="<?php echo $row["product_size_05"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_price_05" name="product_price_05" placeholder="Price for Size 05" value="<?php echo $row["product_price_05"];?>">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_units_05" name="product_units_05" placeholder="Number of Units of Size 05" value="<?php echo $row["product_units_05"];?>">
				</div>
			</div>
			<br>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" id="product_tags" name="product_tags" placeholder="Tags here" value="<?php echo $row["product_tag"];?>">
				</div>
			</div>
			  <input type="hidden" name="product_id" value="<?php echo $row["product_id"];?>">
			  
			  <button id="modify_product" name="modify_product" type="submit" class="btn btn-primary">Modify Product</button>
			  <button id="delete_product" name="delete_product" type="submit" class="btn btn-danger">Delete Product</button>
			</form>
			</div>
			<br>
			<br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>