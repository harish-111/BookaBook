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


// Reading form values

$product_category=$_POST["product_category"];
$product_subcategory=$_POST["product_subcategory"];
$product_name=$_POST["product_name"];
$product_description=$_POST["product_description"];

$product_price_01=$_POST["product_price_01"];
$product_size_01=$_POST["product_size_01"];
$product_units_01=$_POST["product_units_01"];

$product_price_02=$_POST["product_price_02"];
$product_size_02=$_POST["product_size_02"];
$product_units_02=$_POST["product_units_02"];

$product_price_03=$_POST["product_price_03"];
$product_size_03=$_POST["product_size_03"];
$product_units_03=$_POST["product_units_03"];

$product_price_04=$_POST["product_price_04"];
$product_size_04=$_POST["product_size_04"];
$product_units_04=$_POST["product_units_04"];

$product_price_05=$_POST["product_price_05"];
$product_size_05=$_POST["product_size_05"];
$product_units_05=$_POST["product_units_05"];



$sql1 = "SELECT product_name FROM product";
	$result1 = $conn->query($sql1);
	$flag=0;
	if ($result1->num_rows > 0) {
    // output data of each row
    	while($row = $result1->fetch_assoc()) {
       		if($row["product_name"]==$product_name)
       			$flag=1;
    	}
	}

	if($flag==1)
		{
			?>
    	<div class="alert alert-danger text-center" role="alert">
			  <p>A product with that name already exists. Cannot create a new Product.</p>
			  <a class="btn btn-primary" href="../../admindashboard.php" role="button">Back to Panel</a>
		</div>
		<?php
		} else {

$currentDir = getcwd();
    $uploadDirectory = "../uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    //first file

    $fileName1 = $_FILES['product_imgurl_01']['name'];
    $product_imgurl_01 = $fileName1;
    $fileSize1 = $_FILES['product_imgurl_01']['size'];
    $fileTmpName1  = $_FILES['product_imgurl_01']['tmp_name'];
    $fileType1 = $_FILES['product_imgurl_01']['type'];
    $fileExtension1 = strtolower(end(explode('.',$fileName1)));

    $uploadPath1 = $uploadDirectory . basename($fileName1); 

    //second file

    $fileName2 = $_FILES['product_imgurl_02']['name'];
    $product_imgurl_02 = $fileName2;
    $fileSize2 = $_FILES['product_imgurl_02']['size'];
    $fileTmpName2  = $_FILES['product_imgurl_02']['tmp_name'];
    $fileType2 = $_FILES['product_imgurl_02']['type'];
    $fileExtension2 = strtolower(end(explode('.',$fileName2)));

    $uploadPath2 = $uploadDirectory . basename($fileName2); 

    //third file

    $fileName3 = $_FILES['product_imgurl_03']['name'];
    $product_imgurl_03 = $fileName3;
    $fileSize3 = $_FILES['product_imgurl_03']['size'];
    $fileTmpName3  = $_FILES['product_imgurl_03']['tmp_name'];
    $fileType3 = $_FILES['product_imgurl_03']['type'];
    $fileExtension3 = strtolower(end(explode('.',$fileName3)));

    $uploadPath3 = $uploadDirectory . basename($fileName3); 

   
        if ($fileSize1 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if ($fileSize2 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if ($fileSize3 > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        
            $didUpload1 = move_uploaded_file($fileTmpName1, $uploadPath1);

            if ($didUpload1) {
                echo "The file " . basename($fileName1) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }

            $didUpload2 = move_uploaded_file($fileTmpName2, $uploadPath2);

            if ($didUpload2) {
                echo "The file " . basename($fileName2) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }

            $didUpload3 = move_uploaded_file($fileTmpName3, $uploadPath3);

            if ($didUpload3) {
                echo "The file " . basename($fileName3) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }


		$sql = "INSERT INTO product (product_category, product_subcategory, product_name, product_description, product_imgurl_01, product_imgurl_02, product_imgurl_03, product_size_01, product_price_01, product_units_01, product_size_02, product_price_02, product_units_02, product_size_03, product_price_03, product_units_03, product_size_04, product_price_04, product_units_04, product_size_05, product_price_05, product_units_05) VALUES ('$product_category', '$product_subcategory', '$product_name', '$product_description', '$product_imgurl_01', '$product_imgurl_02', '$product_imgurl_03', '$product_size_01', '$product_price_01', '$product_units_01', '$product_size_02', '$product_price_02', '$product_units_02', '$product_size_03', '$product_price_03', '$product_units_03','$product_size_04', '$product_price_04', '$product_units_04', '$product_size_05', '$product_price_05', '$product_units_05')";

		if ($conn->query($sql) === TRUE) {
		    ?>

		    <div class="alert alert-success text-center" role="alert">
			  <p>Product Added Successfully. Redirecting...</p>
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

	}
$conn->close();
?>

	<div class="container">
	 <form action="#" method="post">
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
			 <textarea class="form-control" id="product_description" name="product_description" rows="4">Product Description Here</textarea>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="product_imgurl_01" name="product_imgurl_01" placeholder="Image URL 01" >
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="product_imgurl_02" name="product_imgurl_02" placeholder="Image URL 02" >
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="product_imgurl_03" name="product_imgurl_03" placeholder="Image URL 03" >
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