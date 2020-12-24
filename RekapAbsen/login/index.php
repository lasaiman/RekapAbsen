<?php
session_start();
require_once("../config.php");
$kondisi=false;
    if(isset($_SESSION["user"])){
      // if($_SESSION["level"]=="1"){
        header('Location: ../index.php');
        exit;
      // }
    }
    if(isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        // echo "test: ".$user.$pass;
        $query = "SELECT * FROM admin where username = 
        '$user' and password = '$pass'";
        $hasil = $conn->query($query);
        if($hasil->num_rows == 1){
            // $mhs= mysqli_fetch_assoc($query);
            while($data = $hasil->fetch_object()) {
                $_SESSION['user'] = true;
                $_SESSION['level'] = $data->level;      
                $_SESSION['nama'] = $data->nama;
                $_SESSION['username'] = $data->username;
                $_SESSION['password'] = $data->password;
                if($_SESSION['level']=="1"){
                    header('Location: ../loading.php');
                    exit;
                }
            }
        }
        $kondisi=true;
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="#">
					<span class="login100-form-title p-b-5">
						Admin
					</span>
					<span class="login100-form-title p-b-30">
						<img src="../icon/jayanegara.png" alt="" width="100pt;">
						<!-- <i class="zmdi zmdi-font"></i> -->
					</span>

					<div class="wrap-input100 validate-input">
						<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c"> -->
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login" type="submit">
								Login
							</button>
						</div>
					</div>

                    <?php
                    if($kondisi){
                        ?>
                            <h6 style="color: red; text-align: center; padding-top: 5%; 
                            ">Maaf Anda Bukan Admin..!!</h6>
						<?php
                    }

                    ?>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>