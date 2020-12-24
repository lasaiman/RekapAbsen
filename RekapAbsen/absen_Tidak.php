<?php
    session_start();
    require_once("config.php");
        if(!isset($_SESSION["user"])){
            $nilai=0;
            header("Location: login.php");
            exit;
        }
    $hadir="Hadir";
    $nim=$_GET['nim'];
    $kat=$_GET['kat'];
    echo "data".$kat;
    if($kat==1){
        $sql="update absen set wawancara='$hadir' where nim='$nim'";
        if(mysqli_query($conn,$sql)){
            echo "Berhasil update data ke database: ".$nim.$hadir;
            header("Location: wawancara.php");
        }else{
        echo "Error:" .$sql."".mysqli_error($conn);
        }
    }
    else if($kat==2){
        $sql="update absen set hari1='$hadir' where nim='$nim'";
        if(mysqli_query($conn,$sql)){
            echo "Berhasil update data ke database: ".$nim.$hadir;
            header("Location: absen1.php");
        }else{
        echo "Error:" .$sql."".mysqli_error($conn);
        }
    }
    else if($kat==3){
        $sql="update absen set hari2='$hadir' where nim='$nim'";
        if(mysqli_query($conn,$sql)){
            echo "Berhasil update data ke database: ".$nim.$hadir;
            header("Location: absen2.php");
        }else{
        echo "Error:" .$sql."".mysqli_error($conn);
        }
    }
?>