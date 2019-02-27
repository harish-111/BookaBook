<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Admin Panel</title>

    <style type="text/css">
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: auto;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    #modify_user{
      max-width: 1000px;
    }

    #admin_actions button{
      margin-top:5px;
    }
    .btn{
      margin: 5px;
    }
    </style>
  </head>
  <body>

    <?php

    include 'actions/connect.php';
    error_reporting(0);
    $sql = "SELECT * FROM product";
    ?>

    <!-- NAVBAR-TOP -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img class="navbar-brand img-fluid" src="../logo.png">
       <ul class="navbar-nav" style="position:absolute;right:20px;">
        <li class="nav-item">
          <button class="btn btn-dark text-light" onclick="location.reload()"role="button">Reload</button>
          <button class="btn btn-dark text-light" role="button">Admin Panel</button>
        </li>
      </ul>
  </nav>



  <section id="admin_actions" style="margin-top:20px;">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-6">
    			<h6>Product actions : </h6>
			      <a href="actions/demos/addproduct.php" class="btn btn-dark">Add a Product</a>
			      <a href="view_products.php" class="btn btn-dark">View all Products</a>
			      <button class="btn btn-dark" data-toggle="modal" data-target="#modify_product_modal">Edit/Delete a Product</button>
			      <a href="actions/demos/add_notification.php" class="btn btn-dark">Add Offer Notification</a>
			      <a href="actions/demos/remove_notification.php" class="btn btn-dark">Remove Offer Notification</a>
            <a href="actions/demos/order_products.php" class="btn btn-dark">Order Products</a>
    		</div>
        <div class="col-sm-6">
          <h6>Coupon-Related Actions : </h6>
            <button class="btn btn-dark" data-toggle="modal" data-target="#add_discount_coupon">Add Discount Coupon</button>
            <a href="show_discount_coupons.php" class="btn btn-dark">View all Discount Coupons</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#delete_coupon_modal">Disable a Discount Coupon</button>
            <button class="btn btn-dark" data-toggle="modal" data-target="#enable_coupon_modal">Enable a Discount Coupon</button>
        </div>

    		
    	</div>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <h6>User-Related Actions : </h6>
            <button class="btn btn-dark" data-toggle="modal" data-target="#view_registered_users">View Registered Users</button>
            <button class="btn btn-dark" data-toggle="modal" data-target="#modify_registered_users">Modify Registered Users Details</button>
            <button class="btn btn-dark" data-toggle="modal" data-target="#delete_registered_users">Remove Registered Users</button>
            <a href="vieworders.php" class="btn btn-dark">View Placed Orders</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#view_coupons">View All Coupons</button>
            <button class="btn btn-dark" data-toggle="modal" data-target="#view_contact_messages">View Contact Messages</button>
            <a href="sheetview.php" class="btn btn-dark">Sheet View</a>
        </div>
      	<div class="col-sm-6">
      		<h6>Footer actions : </h6>
		      <a href="actions/demos/editabout.php" class="btn btn-dark">Edit About content</a>
		      <a class="btn btn-dark" href="actions/demos/editcontactus.php">Edit Contact Us content</a>
		      <a class="btn btn-dark" href="actions/demos/editshippingpolicy.php">Edit Shipping Policy</a>
		      <a class="btn btn-dark" href="actions/demos/editreturnpolicy.php">Edit Return/Cancellation Policy content</a>
		      <a class="btn btn-dark" href="actions/demos/editprivacypolicy.php">Edit Privacy Policy content</a>
		      <a class="btn btn-dark" href="actions/demos/editterms.php">Edit Terms & Conditions content</a>
      	</div>
      </div>


      <hr>
      <div class="row">
        <div class="col-sm-6">
          <h6>Palette Actions : </h6>
            <a class="btn btn-dark" href="edit_palette.php">Edit Palette</a>
            <a class="btn btn-dark" href="view_palette.php">View Palette</a>
        </div>
        <div class="col-sm-6">
          
      </div>
      

    </div>
  </section>


  <!-- Add Product Modal -->

  <div class="modal fade" id="add_discount_coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_product_modal_label">Add a Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="actions/save_coupon_process.php" method="post">
        <div class="form-group row">
          <label for="inputCoupon" class="col-sm-2 col-form-label">Coupon Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputCoupon" name="inputCoupon" placeholder="Coupon Code">
          </div>
        </div>
        <div class="form-group row">
          <label for="couponType" class="col-sm-2 col-form-label">Type of coupon</label>
          <div class="col-sm-10">
          <select name="couponType">
            <option value="percent">Percent</option>
            <option value="price">Price</option>
          </select>
        </div>
        </div>
        <div class="form-group row">
          <label for="inputCouponValue" class="col-sm-2 col-form-label">Coupon Value</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="inputCouponValue" name="inputCouponValue" placeholder="Value of coupons">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNumberCoupons" class="col-sm-2 col-form-label">No. of Coupons</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="inputNumberCoupons" name="inputNumberCoupons" placeholder="No of coupons">
          </div>
        </div>
        
            <button type="submit" class="btn btn-dark">Save Coupon</button>
        
        
      </form>

        </div>
      </div>
    </div>
  </div>
<!-- DISABLE A COUPON -->
  <div class="modal fade" id="delete_coupon_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title" id="modify_product_modal_label">Disable a Coupon</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="actions/demos/disable_coupon.php" method="post">
        <div class="form-group">
          <label for="coupon_id_disable">Coupon Code</label>
          <small id="coupon_id_disable" class="form-text text-muted">Select the coupon which is to be disabled.</small>
          <select class="custom-select" id="coupon_picked_disable" name="coupon_picked_disable">
          <option selected>Select a coupon</option>
          <?php 
          $sql_fetch_coupons = "SELECT * FROM discount_coupon WHERE coupon_status='active'";
        $result_fetch_coupons = $conn->query($sql_fetch_coupons);
        if ($result_fetch_coupons->num_rows > 0) {
          // output data of each row
          while($row = $result_fetch_coupons->fetch_assoc()) {
            {
              ?>
              <option value="<?php echo $row['coupon_id'];?>">
                <h5 class="card-title"><?php echo $row["coupon_code"];?></h5>
              </option> 
                <?php
            }
          }
        }       
        ?>

        </select>
        
        </div>
        
                <button type="submit" class="btn btn-primary">Continue</button>
      </form>

      
        </div>
      </div>
    </div>
  </div>

  <!-- ENABLE COUPON -->
  <div class="modal fade" id="enable_coupon_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title" id="enable_coupon_modal_label">Enable a Coupon</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="actions/demos/enable_coupon.php" method="post">
        <div class="form-group">
          <label for="coupon_id_enable">Coupon Code</label>
          <small id="coupon_id_enable" class="form-text text-muted">Select the coupon which is to be enabled.</small>
          <select class="custom-select" id="coupon_picked_enable" name="coupon_picked_enable">
          <option selected>Select a coupon</option>
          <?php 
          $sql_fetch_coupons_enable = "SELECT * FROM discount_coupon WHERE coupon_status='inactive'";
        $result_fetch_coupons_enable = $conn->query($sql_fetch_coupons_enable);
        if ($result_fetch_coupons_enable->num_rows > 0) {
          // output data of each row
          while($row = $result_fetch_coupons_enable->fetch_assoc()) {
            {
              ?>
              <option value="<?php echo $row['coupon_id'];?>">
                <h5 class="card-title"><?php echo $row["coupon_code"];?></h5>
              </option> 
                <?php
            }
          }
        }       
        ?>

        </select>
        
        </div>
        
                <button type="submit" class="btn btn-primary">Continue</button>
      </form>

      
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW ALL PRODUCTS -->
  <div class="modal fade" id="view_product_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">All Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" style="overflow-x:auto;">
          
          <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Subcategory</th>
            <th>Product Description</th>
            <th>Product Size 01</th>
            <th>Product Price 01</th>
            <th>Product Units 01</th>
            <th>Product Size 02</th>
            <th>Product Price 02</th>
            <th>Product Units 02</th>
            <th>Product Size 03</th>
            <th>Product Price 03</th>
            <th>Product Units 03</th>
            <th>Product Size 04</th>
            <th>Product Price 04</th>
            <th>Product Units 04</th>
            <th>Product Size 05</th>
            <th>Product Price 05</th>
            <th>Product Units 05</th>
            
        </tr>
          
          <?php
    $sql_product = "SELECT * FROM product";
    $result = $conn->query($sql_product);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          ?>
            <tr>
                                <td><?php echo $row['product_id'];?></td>
                                <td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['product_category'];?></td>
                                <td><?php echo $row['product_subcategory'];?></td>
                                <td><?php echo $row['product_description'];?></td>
                                <td><?php echo $row['product_size_01'];?></td>
                                <td><?php echo $row['product_price_01'];?></td>
                                <td><?php echo $row['product_units_01'];?></td>
                                <td><?php echo $row['product_size_02'];?></td>
                                <td><?php echo $row['product_price_02'];?></td>
                                <td><?php echo $row['product_units_02'];?></td>
                                <td><?php echo $row['product_size_03'];?></td>
                                <td><?php echo $row['product_price_03'];?></td>
                                <td><?php echo $row['product_units_03'];?></td>
                                <td><?php echo $row['product_size_04'];?></td>
                                <td><?php echo $row['product_price_04'];?></td>
                                <td><?php echo $row['product_units_04'];?></td>
                                <td><?php echo $row['product_size_05'];?></td>
                                <td><?php echo $row['product_price_05'];?></td>
                                <td><?php echo $row['product_units_05'];?></td>
                                
                    </tr>
          <?php
        }
    } else {
        echo "0 results";
    }
    ?>
      </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modify Product Modal -->

  <!-- Edit/Delete Module Modal -->
  <div class="modal fade" id="modify_product_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title" id="modify_product_modal_label">Edit/Delete a Product</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="actions/demos/modifyproduct.php" method="post">
        <div class="form-group">
          <label for="product_id">Product Name</label>
          <small id="product_id" class="form-text text-muted">Select the product which is to be modified.</small>
          <select class="custom-select" id="product_id" name="product_id">
          <option selected>Select a product</option>
          <?php 
        $result1 = $conn->query($sql);
        if ($result1->num_rows > 0) {
          // output data of each row
          while($row = $result1->fetch_assoc()) {
            {
              ?>
              <option value="<?php echo $row['product_id'];?>">
                <h5 class="card-title"><?php echo $row["product_name"];?></h5>
              </option> 
                <?php
            }
          }
        }       
        ?>

        </select>
        
        </div>
        
                <button type="submit" class="btn btn-primary">Continue</button>
      </form>

      
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="view_registered_users" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Registered Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          
          <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date of Birth</th>
        </tr>
          
          <?php
    $sql_user = "SELECT * FROM registered_user";
    $result = $conn->query($sql_user);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<tr><td>'.$row['user_id'].'</td><td>'.$row['user_name'].'</td><td>'.$row['user_email'].'</td><td>'.$row['user_mobile'].'</td><td>'.$row['user_dob'].'</td></tr>';
        }
    } else {
        echo "0 results";
    }
    ?>
      </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODIFY REGISTERED USERS -->

  <div class="modal fade" id="modify_registered_users" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" id="modify_user">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Registered Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          
          <table style="width: auto;">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
          
          <?php
    $sql_user = "SELECT * FROM registered_user";
    $result = $conn->query($sql_user);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<tr><form action="'.$_SERVER["PHP_SELF"].'" method="post"><input type="hidden" value="'.$row['user_id'].'" name="user_id">';
          echo '<td>'.$row['user_id'].'</td><td><input type="text" name="user_name" value="'.$row['user_name'].'"></td><td><input type="text" name="user_email" value="'.$row['user_email'].'"</td><td><input type="text" name="user_mobile" value="'.$row['user_mobile'].'"></td><td><input type="submit" value="Modify" class="btn btn-dark"><input type="hidden" value="1" name="modify_user"></td></form></tr>';
        }
    } else {
        echo "0 results";
    }
    ?>
      </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  
    if($_POST['modify_user']==1)
    {
      $user_modified_id = $_POST['user_id'];
      $user_modified_name = $_POST['user_name'];
      $user_modified_email = $_POST['user_email'];
      $user_modified_mobile = $_POST['user_mobile'];
      $sql_modify_user = "UPDATE registered_user SET user_name='$user_modified_name', user_mobile='$user_modified_mobile', user_email='$user_modified_email' WHERE user_id = $user_modified_id";
      if ($conn->query($sql_modify_user) === TRUE) {
          ?>

          <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            User Details Modified.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          </div>
          <?php
          $modified_value=0;

      } else {
          echo "Error updating record: " . $conn->error;
      } 
    }

  ?>


  <!-- DELETE A USER -->

  <div class="modal fade" id="delete_registered_users" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" id="modify_user">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Registered Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          
          <table style="width: auto;">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
          
          <?php
    $sql_user_2 = "SELECT * FROM registered_user";
    $result = $conn->query($sql_user_2);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<tr><form action="'.$_SERVER["PHP_SELF"].'" method="post"><input type="hidden" value="'.$row['user_id'].'" name="user_id">';
          echo '<td>'.$row['user_id'].'</td><td>'.$row['user_name'].'</td><td>'.$row['user_email'].'</td><td>'.$row['user_mobile'].'</td><td><input type="submit" value="Delete" class="btn btn-danger"><input type="hidden" value="1" name="delete_user"></td></form></tr>';
        }
    } else {
        echo "0 results";
    }
    ?>
      </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  
    if($_POST['delete_user']==1)
    {
      $user_delete_id = $_POST['user_id'];
      
      $sql_delete_user = "DELETE FROM registered_user WHERE user_id = $user_delete_id";
      if ($conn->query($sql_delete_user) === TRUE) {
          ?>

          <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            User Details Deleted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          </div>
          <?php
          $delete_user=0;

      } else {
          echo "Error updating record: " . $conn->error;
      } 
    }

  ?>

  <!-- VIEW PLACED ORDERS -->
  <div class="modal fade" id="view_placed_orders" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Placed Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" style="overflow-x:auto;">
          
                <table style="margin:10px;">
                
                  <tr>
                        <th>Order ID</th>
                        <th>User Email</th>
                        <th>Order Items</th>
                        <th>Item Sizes</th>
                        <th>Item Prices</th>
                        <th>Items Quantity</th>
                        <th>Shipping Address</th>
                        <th>Contact Number</th>
                        <th>Total Price</th>
                        <th>Order PLaced On</th>
                        <th>Order Status</th>
                  </tr>
                <?php
               
                $sql_fetch_order_details = "SELECT * FROM placed_order";

                $result = $conn->query($sql_fetch_order_details);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['order_id'];?></td>
                                <td><?php echo $row['user_email'];?></td>
                                <td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['product_size'];?></td>
                                <td><?php echo $row['product_price'];?></td>
                                <td><?php echo $row['product_quantity'];?></td>
                                <td><?php echo $row['shipping_address'];?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><?php echo $row['order_price'];?></td>
                                <td><?php echo $row['order_datetime'];?></td>
                                <td><?php echo $row['payment_status'];?></td>
                            </tr>
                        <?php
                    }
                }
                 ?>

             </table>
          
        </div>
      </div>
    </div>
  </div>


  <!-- VIEW COUPONS-->
  <div class="modal fade" id="view_coupons" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">All Coupons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" style="overflow-x:auto;">
          
                <table style="margin:10px;">
                
                  <tr>
                        <th>Coupon ID</th>
                        <th>Coupon Code</th>
                        <th>Coupon Type</th>
                        <th>Coupon Value</th>
                        <th>No. of Coupons</th>
                  </tr>
                <?php
               
                $sql_fetch_coupon_details = "SELECT * FROM discount_coupon";

                $result_coupon = $conn->query($sql_fetch_coupon_details);

                if ($result_coupon->num_rows > 0) {
                    // output data of each row
                    while($row = $result_coupon->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['coupon_id'];?></td>
                                <td><?php echo $row['coupon_code'];?></td>
                                <td><?php echo $row['coupon_type'];?></td>
                                <td><?php echo $row['coupon_value'];?></td>
                                <td><?php echo $row['coupon_number'];?></td>
                            </tr>
                        <?php
                    }
                }
                 ?>

             </table>
          
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MESSAGES-->
  <div class="modal fade" id="view_contact_messages" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Contact Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" style="overflow-x:auto;">
          
                <table style="margin:10px;">
                
                  <tr>
                        <th>Message ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Message</th>
                  </tr>
                <?php
               
                $sql_fetch_messages = "SELECT * FROM contact_us_messages";

                $result_messages = $conn->query($sql_fetch_messages);

                if ($result_messages->num_rows > 0) {
                    // output data of each row
                    while($row = $result_messages->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['contact_message_id'];?></td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['user_email'];?></td>
                                <td><?php echo $row['user_message'];?></td>
                            </tr>
                        <?php
                    }
                }
                 ?>

             </table>
          
        </div>
      </div>
    </div>
  </div>


<!-- VIEW SHEET ORDERS -->
  <div class="modal fade" id="view_sheet_orders" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
        <h5 class="modal-title">Placed Orders | Sheet View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" style="overflow-x:auto; width: 100%;">
          
                <table style="margin:10px;">
                
                  <tr>
                        <th>Delivery Customer Name</th>
                        <th>Delivery Contact Email</th>
                        <th>Delivery Contact Number</th>
                        <th>Delivery Address Line-1</th>
                        <th>Delivery Address Line-2</th>
                        <th>Delivery Landmark</th>
                        <th>Delivery Pincode</th>
                        <th>Delivery City</th>
                        <th>Delivery State</th>
                  </tr>
                <?php
               
                $sql_fetch_order_details = "SELECT * FROM placed_order WHERE payment_status='SUCCESS'";

                $result = $conn->query($sql_fetch_order_details);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['deliver_to'];?></td>
                                <td><?php echo $row['user_email'];?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><?php echo $row['shipping_address'];?></td>
                                <td><?php echo "---";?></td>
                                <td><?php echo $row['landmark_address'];?></td>
                                <td><?php echo $row['delivery_pincode'];?></td>
                                <td><?php echo $row['delivery_city'];?></td>
                                <td><?php echo $row['delivery_state'];?></td>
                            </tr>
                        <?php
                    }
                }
                 ?>

             </table>
          
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>