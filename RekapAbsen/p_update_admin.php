<?php
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Jayapura');
    $tanggal = date('Y-m-d H:i:s');
    $q="UPDATE tlg SET tglup = '$tanggal' WHERE no=1
    "; mysqli_query($conn,$q);
// require_once("../auth.php");
    if(!isset($_SESSION["user"])){
        header("Location: ../index.php");
        exit;
    }
    $username   =$_POST['username'];
    $nama       =$_POST['nama'];
    $level      =$_POST['level'];
    $password   =$_POST['password'];
$sql="update admin set
username='$username',nama='$nama',level='$level',password='$password' where username='$username'";
if(mysqli_query($conn,$sql)){
    echo "Berhasil update data ke database ";
    header("Location: tables.php");
}else{
echo "Error:" .$sql."".mysqli_error($conn);
}