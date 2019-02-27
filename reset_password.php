<?php
include 'connect.php';
$login_constant=0;
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
    <link href="signup.css" rel="stylesheet">
    <title>BOOKaBOOK | Reset Password</title>

    <style type="text/css">
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
  </head>
    <body class="text-center">
      <form class="form-signin" action="reset_password_process.php" method="post">
        <img class="mb-4" src="logo.png" alt="" width="150" height="72">
        <h1 class="h5 mb-3 font-weight-normal">Enter the following details to Reset Password</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="user_email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputMobile" class="sr-only">Mobile Number</label>
        <input type="text" id="inputMobile" name="user_mobile" class="form-control" placeholder="Mobile Number" required>

        <button class="btn btn-lg btn-dark btn-block" type="submit">Reset Password</button>
        <br>
        <a href="signup.html" style="color:#000000;">Don't have an account? Sign Up here.</a>
        <br>
        <a href="login.php" style="color:#000000;">Back to Login</a>
        <br>
      <p class="mt-5 mb-3 text-muted">&copy; BOOKaBOOK 2018</p>
      </form>
    </body>
</html>


