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
  <link href="signup.css" rel="stylesheet">
  <title>BookaBook | Login</title>

  <style type="text/css">
  html,
  body {
    height: 100%;
  }

  .form-container {
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
<body>
  <?php
  if(isset($_POST['login_process']))
  {
    $userpassword = $_POST['user_password'];
    $useremail = $_POST['user_email'];
    $sql_login = "SELECT * FROM registered_user WHERE user_email = '$useremail' AND user_password = '$userpassword'";
    $result = $conn->query($sql_login);
    if ($result->num_rows > 0) {
                // output data of each row
      while($row = $result->fetch_assoc()) {

        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['cart_initial']=1;

        ?>
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
          <p><strong>Login Successful!</strong></p>
          <p>Redirecting...</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <script>
          window.setTimeout(function() {
            window.location.assign('index.php');
          }, 2000);
        </script>
        <?php
      }
    }
    else {
      ?>
      <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
        <p><strong>Invalid Credentials.</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }

  }


  ?>
  <div class="text-center form-container">
       <div class="col-sm-4">
          <a href="index.php">Go Home</a>
        </div>
        <div class="col-sm-4">
          <img src="logo.png" alt="" width="220" height="80">
        </div>
        <div class="col-sm-4">
          <!-- <a href="login.php">Login</a> -->
        </div>
      </div>

    <form class="form-signin" action="#" method="post">


      <!-- <a href="http://www.BookaBook.in"><img class="mb-4" src="logo.png" alt="" width="150" height="72"></a> -->
      <h1 class="h5 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="user_email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="user_password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-dark btn-block" type="submit" name="login_process">Sign in</button><br>
      <a href="signup.html" style="color:#000000;">Don't have an account? Sign Up here.</a><br>
      <a href="reset_password.php" style="color:#000000;">Forgot Password? Click here.</a>
      <p class="mt-5 mb-3 text-muted">&copy; BookaBook 2018</p>
    </form>
  </div>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->



  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="myScript.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>


