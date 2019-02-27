<?php
include 'connect.php';
session_start();
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

    <title>BOOKaBOOK | Signup Process</title>
  </head>
  <body>
    <?php

    $username = $_POST['user_name'];
    $useremail = $_POST['user_email'];
    $userdob = $_POST['user_dob'];
    $userpassword = $_POST['user_password'];
    $usermobile = $_POST['user_mobile'];
    $flag=0;

    $sql_signup = "SELECT user_email FROM registered_user";
    $result = $conn->query($sql_signup);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           if($useremail == $row['user_email'])
           {
             $flag=1;
           } else {
            $flag=0;
           }
         }
       }

           if($flag==1)
           {
            ?>
            <div class="alert alert-danger" role="alert">
                An account with the same email already exists. Failed to create a new account.
                <a href="signup.html" class="btn btn-dark">Back</a>
            </div>
            <?php
            } else {
            $sql_insert = "INSERT INTO registered_user(user_name, user_dob, user_email, user_password, user_mobile) VALUES('$username','$userdob','$useremail','$userpassword','$usermobile')";
            
                if($conn->query($sql_insert) === TRUE)
                {
                  ?>
                  <div class="alert alert-success" role="alert">
                    Account created successfully.
                    <a class="btn btn-dark" href="login.php">Go to Login</a>
                  </div>
                  <?php
                } else {
                   ?>
                  <div class="alert alert-danger" role="alert">
                    Something went wrong.
                    <?php echo $conn->error;?>
                    <a href="index.php" class="btn btn-dark">Back</a>
                  </div>
                <?php
                }
           }
       
    $conn->close();
    ?>
</body>
</html>