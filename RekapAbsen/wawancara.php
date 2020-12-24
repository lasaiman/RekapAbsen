
<?php  
require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
      <form action="index.php"><button class="btn btn-primary" type="submit">Mode</button> Absensi Wawancara Calon Encripter 0.2</form>
      </div>
      <div class="card-body" style="display: flex;">
      
            
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for Nim..." name="cari">
                        <span class="input-group-append">
                          <button class="btn btn-primary" type="submit" value="Cari">
                            <i class="fa fa-search"></i>
                          </button>
                          <!-- <input class="btn btn-primary" type="submit" value="Cari" > -->
                          <?php 
                            if(isset($_GET['cari'])){
                              $cari = $_GET['cari'];
                              
                              $sql="select * from registrasi where nim like '%".$cari."%'";
                              $data=mysqli_query($conn,$sql);
                              
                            }
                            
                          ?>
                        </span>
                      </div>
                </div>
                <?php
                if(isset($_GET['cari'])){
                  while($d = mysqli_fetch_array($data)){ $nim=$d['nim'];
                ?>
                <div class="form-group">
                  <label for="">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;</label><label><?php echo $d['nama']; ?></label>
                </div>
              
               <div class="form-group">
                  <label>Partisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;</label><label><?php echo $d['partisi']; ?></label>
                  
                </div>
              
                <div class="form-group">
                  <label>No Telpon: &nbsp;</label><label><?php echo $d['hp']; ?></label>
                </div>
                  <?php 
                }}
                ?>
                  
            

              </form>
              <form  action="absen_Hadir.php?nim=<?php echo $nim ?>&& kat=1" method="post" name="nim"><?php?><input type="submit" value="Hadir" class="btn btn-primary"></form>
              <form  action="absen_Tidak.php?nim=<?php echo $nim ?>&& kat=1" method="post" name="nim"><?php?><input type="submit" value="Tidak" class="btn btn-primary"></form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="login.php">Login Page</a> -->
          <!---  <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
          
        </div>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
