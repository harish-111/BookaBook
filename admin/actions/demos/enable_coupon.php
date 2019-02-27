<?php
include 'connect.php';
error_reporting(0);

    $coupon_id = $_POST["coupon_picked_enable"];
     $sqldel = "UPDATE discount_coupon SET coupon_status = 'active' WHERE coupon_id=$coupon_id";

    if ($conn->query($sqldel) === TRUE) {
        
        ?>
 
         <div class="alert alert-success text-center" role="alert">
        <p>Coupon Enabled Successfully. Redirecting...</p>
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
