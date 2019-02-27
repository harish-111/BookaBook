<?php
include 'connect.php';
error_reporting(0);

    $coupon_id = $_POST["coupon_picked_disable"];
     $sqldel = "UPDATE discount_coupon SET coupon_status = 'inactive' WHERE coupon_id=$coupon_id";

    if ($conn->query($sqldel) === TRUE) {
        
        ?>
 
         <div class="alert alert-success text-center" role="alert">
        <p>Coupon Disabled Successfully. Redirecting...</p>
        <script>
          window.setTimeout(function() {
              window.location.assign('../../admindashboard.php');
          }, 2000);
          </script>
      </div>
      <?php
    }
  

    $conn->close();

    ?>
