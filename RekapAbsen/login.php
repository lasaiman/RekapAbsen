<?php 
session_start();
require_once("config.php");
    if(isset($_SESSION["user"])){
      // if($_SESSION["level"]=="1"){
        header('Location: index.php');
        exit;
      // }
    }
    $nm=$_GET['username'];
    $pass=$_GET['password'];
    echo "ini".$nm.$pass;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="tambahan/bootstrap.min.css">
  <link rel="stylesheet" href="tambahan/style.css">
</head>

<body class="bg-dar">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="get" action="#" name="login">
           
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control"  type="text"  name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label><div style="display: flex;">
            <input class="form-control"  type="password" name="password" id="passwordfield" style="width: 90%">
            <img class="glyphicon glyphicon-eye-open" src="tambahan/mata.png" alt="" 
            style="width: 10%; height: 100%; padding-top: 5%;"> </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <!-- <input class="form-check-input" type="checkbox"> Remember Password</label> -->
            </div>
          </div>
        

          <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.php">Register an Account</a> -->
       <!--   <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src='tambahan/jquery-1.11.1.min.js'></script>
<script src='tambahan/bootstrap.min.js'></script>
<script  src="tambahan/script.js"></script>
</body>

</html>
