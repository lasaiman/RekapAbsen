
<?php
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Jayapura');
    $tanggal = date('Y-m-d H:i:s');
    $q="UPDATE tlg SET tglup = '$tanggal' WHERE no=3
    "; mysqli_query($conn,$q);
if(!isset($_SESSION["user"])){
    $nilai=0;
    header("Location: login.php");
    exit;
}
$tampil=$_GET['tgl'];
$jumlah= count($tampil);
echo "tampil: ".$tampil[3]."jumlah: ".$jumlah;
$bulan=$_GET['bln'];
$tahun=$_GET['thn'];
$id_kyn=$_GET['id_kyn'];
$jml=$jumlah;
$sql2="SELECT * FROM absen WHERE id_kyn='$id_kyn' AND MONTH(tgl) ='$bulan' AND YEAR(tgl) ='$tahun'";
$hasil=mysqli_query($conn, $sql2); $kondisi=mysqli_num_rows($hasil);
if($kondisi>=1){
    $sql3="DELETE FROM absen WHERE id_kyn='$id_kyn' AND MONTH(tgl) ='$bulan' AND YEAR(tgl) ='$tahun'"; mysqli_query($conn, $sql3);
    for ($x=1; $x <=$jml ; $x++) { 
        // $tgl[$x]=$_GET['tgl'.$x];
        $ket=$tampil[$x];
        $sql="insert into absen (id_kyn,tgl,ket) values ('$id_kyn','".$tahun.'-'.$bulan.'-'.$x."','$ket')";
        mysqli_query($conn, $sql);
    }
    
}
else{ 
    for ($x=1; $x <=$jml ; $x++) { 
        // $tgl[$x]=$_GET['tgl'.$x];
        $ket=$tampil[$x];
        $sql="insert into absen (id_kyn,tgl,ket) values ('$id_kyn','".$tahun.'-'.$bulan.'-'.$x."','$ket')";
        mysqli_query($conn, $sql);
    }
}

header("Location: absen_pegawai.php");


