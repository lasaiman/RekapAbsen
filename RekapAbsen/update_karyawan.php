<?php 
session_start();
require_once("config.php");
    if(!isset($_SESSION["user"])){
        $nilai=0;
        header("Location: login.php");
        exit;
    }
    $id_kyn=$_GET['id_kyn'];
    $sql="select * from karyawan where id_kyn= $id_kyn";
    $hasil=mysqli_query($conn, $sql);
    $jumlah = mysqli_num_rows($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Create-by: Warni Paengko</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Admin Create-by: Warni Paengko</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
                <!-- ======================================================================================================== -->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="tables.php">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="absen_pegawai.php">
          <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Absen Pegawai</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="add_pegawai.php">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">Add Pegawai</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="add_admin.php">
            <i class="fa fas fa-user"></i>
            <span class="nav-link-text">Add Admin</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.php">Navbar</a>
            </li>
          </ul>
        </li>
        <!-- ======================================================================================================== -->
          
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product Page</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Update Data Pegawai</h1>
        </div> 
         
         <div class="col-md-8">
            
<form method="post" action="p_update_karyawan.php" enctype="multipart/form-data">
<?php
    while($row=mysqli_fetch_array($hasil)){
    ?>
  <div class="form-group">
    <label>Nip</label>
    <input type="text" class="form-control" name="nip" value="<?php echo $row['id_kyn'];?>" >
  </div>

  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control"  name="nama" value="<?php echo $row['nama_kyn'];?>">
  </div>
  <div class="form-group">
    <label for="">Tanggal Lahir</label><br>
      <input class="form-control"  type="date" name="dd/mm/yyyy" id="tgllahir" value="<?php echo $row['tgl_lahir'];?>" />
  </div>
 <div class="form-group" style="display: flex;">
    <label>Jenis Kelamin :</label>
    <div style="display: flex;">
      <label for="" style="padding-left: 30px; padding-right: 30px;" >Laki-laki</label >
      <input  type="radio"  name="gender" value="Laki-laki" <?php if($row['gender']=="Laki-laki"){echo 'checked';} ?> >
      <label for="" style="padding-left: 30px; padding-right: 30px;">Perempuan</label>
      <input type="radio" name="gender" value="Perempuan"   <?php if($row['gender']=="Perempuan"){echo 'checked';} ?> >
    </div>
  </div>
  <div class="form-group">
    <label>Jabatan</label>
    <select name="jabatan" id="">
      <option value="anggota">Anggota</option>
      <option value="Bendahara">Bendahara</option>
      <option value="Sekertaris">Sekertris</option>
    </select>
  </div>
  <div class="form-group">
    <label>Telepon</label>
    <input type="text" class="form-control" name="hp" value="<?php echo $row['no_tlp'];?>">
  </div>

  <button type="submit" class="btn btn-primary" name="reg_p">Submit</button>
    <?php } ?>
</form> 

         </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
