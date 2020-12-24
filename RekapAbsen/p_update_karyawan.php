<?php
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Jayapura');
    $tanggal = date('Y-m-d H:i:s');
    $q="UPDATE tlg SET tglup = '$tanggal' WHERE no=2
    "; mysqli_query($conn,$q);
// require_once("../auth.php");
    if(!isset($_SESSION["user"])){
        header("Location: ../index.php");
        exit;
    }
    $nip        =$_POST['nip'];
    $nama       =$_POST['nama'];
    $tgllahir   =$_POST['dd/mm/yyyy'];
    $gender     =$_POST['gender'];
    $jabatan    =$_POST['jabatan'];
    $hp         =$_POST['hp'];
$sql="update karyawan set
nama_kyn='$nama',tgl_lahir='$tgllahir',gender='$gender',jabatan='$jabatan',no_tlp='$hp' where id_kyn='$nip'";
if(mysqli_query($conn,$sql)){
    echo "Berhasil update data ke database ";
    header("Location: index.php");
}else{
echo "Error:" .$sql."".mysqli_error($conn);
}