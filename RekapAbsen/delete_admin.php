<?php
session_start();
require_once("config.php");
date_default_timezone_set('Asia/Jayapura');
    $tanggal = date('Y-m-d H:i:s');
    $q="UPDATE tlg SET tglup = '$tanggal' WHERE no=1
    "; mysqli_query($conn,$q);
$id=$_GET['username'];
$sql="delete from admin where username='$id'";
echo "id".$id;
// echo $id;
if(mysqli_query($conn,$sql)){
?><script>
document.location.href="tables.php";
</script>
<?php
}else{
echo "gagal hapus data" .$sql."".mysqli_error($conn);
}
?>