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
if(isset($_POST["modify_product"]))
{
    $product_id=$_POST['product_id'];
    $product_category=$_POST["product_category"];
    $product_subcategory=$_POST["product_subcategory"];
    $product_name=$_POST["product_name"];
    $product_description=$_POST["product_description"];
    $product_tag=$_POST["product_tags"];

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


    $sqlupd = "UPDATE product SET product_category ='$product_category', product_subcategory = '$product_subcategory', product_name = '$product_name', product_description = '$product_description', product_size_01 = '$product_size_01', product_price_01 = '$product_price_01', product_units_01 = '$product_units_01', product_size_02 = '$product_size_02', product_price_02 = '$product_price_02', product_units_02 = '$product_units_02', product_size_03 = '$product_size_03', product_price_03 = '$product_price_03', product_units_03 = '$product_units_03', product_size_04 = '$product_size_04', product_price_04 = '$product_price_04', product_units_04 = '$product_units_04', product_size_05 = '$product_size_05', product_price_05 = '$product_price_05', product_units_05 = '$product_units_05', product_tag = '$product_tag' WHERE product_id=$product_id";

    if ($conn->query($sqlupd) === TRUE) {
        
        ?>
 
        <div class="alert alert-success text-center" role="alert">
        <p>Product Modified Successfully. Redirecting...</p>
        <script>
          window.setTimeout(function() {
              window.location.assign('../../admindashboard.php');
          }, 2000);
          </script>
      </div>

<?php
    } else {

        ?>
        <div class="alert alert-danger" role="alert">
        <p>Something went wrong.</p>
        <p><?php echo $conn->error; ?></p>
        <a class="btn btn-primary" href="index.php" role="button">Back to Panel</a>
      </div>
      <?php
    }
  } else if(isset($_POST["delete_product"]))
  {
     $product_id = $_POST["product_id"];
     $sqldel = "DELETE FROM product WHERE product_id=$product_id";

    if ($conn->query($sqldel) === TRUE) {
        
        ?>
 
         <div class="alert alert-success text-center" role="alert">
        <p>Product Deleted Successfully. Redirecting...</p>
        <script>
          window.setTimeout(function() {
              window.location.assign('../../admindashboard.php');
          }, 2000);
          </script>
      </div>
      <?php
    }
  }

    $conn->close();

    ?>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>