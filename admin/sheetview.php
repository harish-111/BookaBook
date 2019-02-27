<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Admin Panel</title>

    <style type="text/css">
      body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {     
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #4b5366;        
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .show-entries select.form-control {        
        width: 60px;
        margin: 0 5px;
    }
    .table-filter .filter-group {
        float: right;
        margin-left: 15px;
    }
    .table-filter input, .table-filter select {
        height: 34px;
        border-radius: 3px;
        border-color: #ddd;
        box-shadow: none;
    }
    .table-filter {
        padding: 5px 0 15px;
        border-bottom: 1px solid #e9e9e9;
        margin-bottom: 5px;
    }
    .table-filter .btn {
        height: 34px;
    }
    .table-filter label {
        font-weight: normal;
        margin-left: 10px;
    }
    .table-filter select, .table-filter input {
        display: inline-block;
        margin-left: 5px;
    }
    .table-filter input {
        width: 200px;
        display: inline-block;
    }
    .filter-group select.form-control {
        width: 110px;
    }
    .filter-icon {
        float: right;
        margin-top: 7px;
    }
    .filter-icon i {
        font-size: 18px;
        opacity: 0.7;
    }   
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }   
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
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
          <button class="btn btn-dark text-light" onclick="location.reload()" role="button">Reload</button>
          <a href="admindashboard.php" class="btn btn-dark text-light">Admin Panel</a>
        </li>
      </ul>
  </nav>

      

<!-- VIEW SHEET ORDERS -->
        

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">                      
                        <a href="#" class="btn btn-primary" onclick="location.reload()"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="#" class="btn btn-info" onclick="exportTableToExcel('tblData')"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>
                    </div>
                </div>
            </div>
        
           <table class="table table-striped table-hover" id="tblData">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Delivery Customer Name</th>
                        <th>Delivery Contact Email</th>
                        <th>Delivery Contact Number</th>
                        <th>Delivery Address Line-1</th>
                        <th>Delivery Address Line-2</th>
                        <th>Delivery Landmark</th>
                        <th>Delivery Pincode</th>
                        <th>Delivery City</th>
                        <th>Delivery State</th>
                        <th>Order Details</th>
                        <th>Send Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
               
                $sql_fetch_order_details = "SELECT * FROM placed_order WHERE payment_status='SUCCESS' OR payment_status='Cash on Delivery' ORDER BY order_id DESC";

                $result = $conn->query($sql_fetch_order_details);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['order_id'];?></td>
                                <td><?php echo $row['deliver_to'];?></td>
                                <td><?php echo $row['user_email'];?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><?php echo $row['shipping_address'];?></td>
                                <td><?php echo "---";?></td>
                                <td><?php echo $row['landmark_address'];?></td>
                                <td><?php echo $row['delivery_pincode'];?></td>
                                <td><?php echo $row['delivery_city'];?></td>
                                <td><?php echo $row['delivery_state'];?></td>
                                <td><b>Product Name : </b><?php echo $row['product_name'];?><br>
                                <b>Product Size: </b><?php echo $row['product_size'];?><br>
                                <b>Product Price : </b><?php echo $row['product_price'];?><br>
                                <b>Product_Quantity : </b><?php echo $row['product_quantity'];?><br>
                                <b>Order Total : </b>Rs. <?php echo $row['order_price'];?><br>
                                <b>Order Placed On : </b><?php echo $row['order_datetime'];?><br>
                                <b>Payment/Order ID : </b><?php echo $row['payment_id'];?>
                                <?php if($row['coupon_code']!=="")
                                {
                                    ?>
                        <br><b>Coupon Applied : </b><?php echo $row['coupon_code'];?>
                                    <?php
                                }
                                ?>
                                <?php if($row['payment_status']=='Cash on Delivery')
                                {
                                    ?>
                        <br><b>Order Type : Cash On Delivery</b>
                                    <?php
                                }
                                ?>
                                </td>
                           <td>
                            <?php if($row['courier_name']!=="")
                                {
                                    ?>
                                    <br><b>Courier : </b><?php echo $row['courier_name'];?>
                                    <br><b>Docket ID : </b><?php echo $row['docket_id'];?>
                                    <?php
                                }
                                else{
                                    ?>
                                    <form action="sendDocketID.php" method="post">
                                            <input type="hidden" name="contact_number" value="<?php echo $row['contact_number'];?>">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                                            <input type="hidden" name="deliver_to" value="<?php echo $row['deliver_to'];?>">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Courier : </span>
                                              </div>
                                              <select name="pick_courier">
                                                <option value="dtdc">DTDC</option>
                                                <option value="delhivery">DELHIVERY</option>
                                                <option value="fedex">FEDEX</option>
                                            </select>
                                            </div> 
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Docket ID : </span>
                                              </div>
                                              <input type="text" name="docket_id" class="form-control">
                                            </div>        
                                            <input type="submit" class="btn btn-dark text-center" style="background-color: #343a40; color:#fff;" name="submit_message_request">
                                        </form>
                                        <?php
                                }
                                        ?>
                                      
                                </td>
                            </tr>
                        <?php
                    }
                }
                 ?>
                </tbody>
            </table>
            
<script type="text/javascript">
   function exportTableToExcel(tableID, filename = 'sheet_view_orders'){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
} 
</script>


        </div>          
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

