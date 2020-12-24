<?php
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Jayapura');
    $tanggal = date('Y-m-d H:i:s');
    $q="UPDATE tlg SET tglup = '$tanggal' WHERE no=2
    "; mysqli_query($conn,$q);
$id=$_GET['id_kyn'];
$sql="delete from karyawan where id_kyn=$id";
if(mysqli_query($conn,$sql)){
?><script>
document.location.href="index.php";
</script>
<?php
}else{
echo "gagal hapus data" .$sql."".mysqli_error($conn);
}
?>