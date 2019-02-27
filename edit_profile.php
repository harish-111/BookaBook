<?php
include 'connect.php';
session_start();
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BOOKaBOOK | Edit Profile</title>
  </head>
  <body>
    <div class="container text-center">
    <?php

    $contactNumber = $_POST['contactNumber'];
    $userDate = $_POST['userDate'];
    $userEmail = $_POST['userEmail'];
    $userStreet = $_POST['inputStreet'];
    $userState = $_POST['inputState'];
    $userCity = $_POST['inputCity'];
    $userZip = $_POST['inputZip'];
    $flag=0;

    $sql_signup = "SELECT user_email FROM registered_user";
    $result = $conn->query($sql_signup);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           if($userEmail == $row['user_email'])
           {
             $flag=1;
           } else {
            $flag=0;
           }
         }
       }

           if($flag==1)
           {
              
            $sql_update = "UPDATE registered_user SET user_mobile = '$contactNumber', user_dob = '$userDate', user_street = '$userStreet', user_state = '$userState', user_city = '$userCity', user_zip = '$userZip' WHERE user_email = '$userEmail'";
            
                if($conn->query($sql_update) === TRUE)
                {
                  ?>
                  <div class="alert alert-success" role="alert">
                    <strong>Details updated successfully.</strong><br>Redirecting to profile...
                    <script>
                      window.setTimeout(function() {
                              window.location.assign('user_profile.php');
                      }, 2000);
                    </script>
                  </div>
                  <?php
                } else {
                   ?>
                  <div class="alert alert-danger" role="alert">
                    <strong>Something went wrong.</strong><br>Redirecting to profile...
                    <script>
                      window.setTimeout(function() {
                              window.location.assign('user_profile.php');
                      }, 2000);
                    </script>
                  </div>
                <?php
                }
            
            } else {
              ?>
                <div class="alert alert-danger" role="alert">
                   Something went wrong. Try again later.
                    <a href="user_profile.php" class="btn btn-dark">Back to profile</a>
                </div>
              <?php
            
           }
       
    $conn->close();
    ?>
    </div>
</body>
</html>