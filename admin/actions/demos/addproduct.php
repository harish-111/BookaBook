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

?>

	<div class="container" style="margin-top: 25px; margin-bottom: 25px;">
	 <form action="addproductprocess.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" class="form-control" id="product_category" name="product_category" placeholder="Product Category" >
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="product_subcategory" name="product_subcategory" placeholder="Product Sub-Category" >
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" >
		</div>
		<div class="form-group">
			 
<div id="sample">
        <script type="text/javascript" src="../nicEdit.js"></script>
        <script type="text/javascript">
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>
        <textarea class="form-control" id="product_description" name="product_description" rows="4">Product Description Here</textarea>
        <br />
      </div>

		</div>
		<div class="form-group">
			<input type="file" class="form-control" id="product_imgurl_01" name="product_imgurl_01" placeholder="Image 01" >
		</div>
		<div class="form-group">
			<input type="file" class="form-control" id="product_imgurl_02" name="product_imgurl_02" placeholder="Image 02" >
		</div>
		<div class="form-group">
			<input type="file" class="form-control" id="product_imgurl_03" name="product_imgurl_03" placeholder="Image 03" >
		</div>
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_01" name="product_size_01" placeholder="Size 01" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_01" name="product_price_01" placeholder="Price for Size 01" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_01" name="product_units_01" placeholder="Number of Units of Size 01" >
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_02" name="product_size_02" placeholder="Size 02" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_02" name="product_price_02" placeholder="Price for Size 02" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_02" name="product_units_02" placeholder="Number of Units of Size 02" >
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_03" name="product_size_03" placeholder="Size 03" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_03" name="product_price_03" placeholder="Price for Size 03" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_03" name="product_units_03" placeholder="Number of Units of Size 03" >
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_04" name="product_size_04" placeholder="Size 04" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_04" name="product_price_04" placeholder="Price for Size 04" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_04" name="product_units_04" placeholder="Number of Units of Size 04" >
			</div>
		</div>
		<br>
		<div class="form-row">
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_size_05" name="product_size_05" placeholder="Size 05" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_price_05" name="product_price_05" placeholder="Price for Size 05" >
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" id="product_units_05" name="product_units_05" placeholder="Number of Units of Size 05" >
			</div>
		</div>
		<br>   
		<button type="submit" name="submit_product" class="btn btn-success">Save changes</button>
		<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
		</form>
	</div>
</body>
</html>