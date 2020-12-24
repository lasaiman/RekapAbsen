<?php
    require_once("config.php");
    $thn=$_GET['tahun'];
    $bln=$_GET['bulan'];
    $sql_tahun="SELECT year(tgl) FROM absen GROUP BY year(tgl)";
    $hasil_TAHUN=mysqli_query($conn,$sql_tahun);
//    $thn="2019";
   $tanggal = cal_days_in_month(CAL_GREGORIAN, $bln, $thn);
   $nama_bulan=null;
   $HTW[1000][12]=null;
   $TM[1000][12]=null;
   $PSW[1000][12]=null;
   $TK[1000][12]=null;
   $sql_ket="
    SELECT id_kyn,
	COUNT(IF( YEAR(tgl) = $thn and month(tgl)=$bln and ket='HTW', ket, NULL)) AS HTW,
    COUNT(IF( YEAR(tgl) = $thn and month(tgl)=$bln and ket='TM', ket, NULL)) AS TM,
    COUNT(IF( YEAR(tgl) = $thn and month(tgl)=$bln and ket='PSW', ket, NULL)) AS PSW,
    COUNT(IF( YEAR(tgl) = $thn and month(tgl)=$bln and ket='TK', ket, NULL)) AS TK
    FROM absen
    where year(tgl)=$thn and month(tgl)=$bln
    GROUP BY absen.id_kyn
    ";
    $h_ket=mysqli_query($conn,$sql_ket); $i=0;
    while($row_ket =mysqli_fetch_array($h_ket)){
        $HTW[$i][0]=$row_ket['HTW'];
        $TM[$i][1]=$row_ket['TM'];
        $PSW[$i][2]=$row_ket['PSW'];
        $TK[$i][3]=$row_ket['TK']; $i++;
    }
   switch($bln){
       case '1': $nama_bulan="Januari"; break;
       case '2': $nama_bulan="Februari"; break;
       case '3': $nama_bulan="Maret"; break;
       case '4': $nama_bulan="April"; break;
       case '5': $nama_bulan="Mei"; break;
       case '6': $nama_bulan="Juni"; break;
       case '7': $nama_bulan="Juli"; break;
       case '8': $nama_bulan="Agustus"; break;
       case '9': $nama_bulan="September"; break;
       case '10': $nama_bulan="Oktober"; break;
       case '11': $nama_bulan="November"; break;
       case '12': $nama_bulan="Desember"; break;
       default :$nama_bulan=""; break;
   }
    // echo "Jumlah hari pada bulan saat ini adalah <b>{$tanggal}</b>";
    $sql_tahun="SELECT year(tgl) FROM absen GROUP BY year(tgl)";
                    $sql="select * from absen";
                    $hasil=mysqli_query($conn,$sql);
                    $jumlah=mysqli_num_rows($hasil);
                    // echo "Jumlah data ada : ".$jumlah;
     $call1  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-01'";
     $call2  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-02'";
     $call3  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-03'";
     $call4  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-04'";
     $call5  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-05'";
     $call6  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-06'";
     $call7  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-07'";
     $call8  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-08'";
     $call9  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-09'";
     $call10 ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-10'";
    $call11  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-11'";
    $call12  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-12'";
    $call13  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-13'";
    $call14  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-14'";
    $call15  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-15'";
    $call16  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-16'";
    $call17  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-17'";
    $call18  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-18'";
    $call19  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-19'";
    $call20  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-20'";
    $call21  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-21'";
    $call22  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-22'";
    $call23  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-23'";
    $call24  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-24'";
    $call25  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-25'";
    $call26  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-26'";
    $call27  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-27'";
    $call28  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-28'";
    $call29  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-29'";
    $call30  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-30'";
    $call31  ="select karyawan.id_kyn,karyawan.nama_kyn,absen.ket FROM karyawan,absen where karyawan.id_kyn=absen.id_kyn and absen.tgl='$thn-$bln-31'";

    $call_1 =mysqli_query($conn,$call1);  $jumlah=mysqli_num_rows($call_1);
    $call_2 =mysqli_query($conn,$call2);
    $call_3 =mysqli_query($conn,$call3);
    $call_4 =mysqli_query($conn,$call4);
    $call_5 =mysqli_query($conn,$call5);
    $call_6 =mysqli_query($conn,$call6);
    $call_7 =mysqli_query($conn,$call7);
    $call_8 =mysqli_query($conn,$call8);
    $call_9 =mysqli_query($conn,$call9);
    $call_10=mysqli_query($conn,$call10);
    $call_11=mysqli_query($conn,$call11);
    $call_12=mysqli_query($conn,$call12);
    $call_13=mysqli_query($conn,$call13);
    $call_14=mysqli_query($conn,$call14);
    $call_15=mysqli_query($conn,$call15);
    $call_16=mysqli_query($conn,$call16);
    $call_17=mysqli_query($conn,$call17);
    $call_18=mysqli_query($conn,$call18);
    $call_19=mysqli_query($conn,$call19);
    $call_20=mysqli_query($conn,$call20);
    $call_21=mysqli_query($conn,$call21);
    $call_22=mysqli_query($conn,$call22);
    $call_23=mysqli_query($conn,$call23);
    $call_24=mysqli_query($conn,$call24);
    $call_25=mysqli_query($conn,$call25);
    $call_26=mysqli_query($conn,$call26);
    $call_27=mysqli_query($conn,$call27);
    $call_28=mysqli_query($conn,$call28);
    $call_29=mysqli_query($conn,$call29);    
    $call_30=mysqli_query($conn,$call30);    
    $call_31=mysqli_query($conn,$call31);    

    $tgl_1[1000][12]=null;  $tgl_2[1000][12]=null; $tgl_3[1000][12]=null;  $tgl_4[1000][12]=null; $tgl_5[1000][12]=null;
    $tgl_6[1000][12]=null;  $tgl_7[1000][12]=null; $tgl_8[1000][12]=null;  $tgl_9[1000][12]=null; $tgl_10[1000][12]=null;
    $tgl_11[1000][12]=null;  $tgl_12[1000][12]=null; $tgl_13[1000][12]=null;  $tgl_14[1000][12]=null; $tgl_15[1000][12]=null;
    $tgl_16[1000][12]=null;  $tgl_17[1000][12]=null; $tgl_18[1000][12]=null;  $tgl_19[1000][12]=null; $tgl_20[1000][12]=null;
    $tgl_21[1000][12]=null;  $tgl_22[1000][12]=null; $tgl_23[1000][12]=null;  $tgl_24[1000][12]=null; $tgl_25[1000][12]=null;
    $tgl_26[1000][12]=null;  $tgl_27[1000][12]=null; $tgl_28[1000][12]=null;  $tgl_29[1000][12]=null; $tgl_30[1000][12]=null; $tgl_31[1000][12]=null;
    
    $i=0;

    while($row_tgl1 =mysqli_fetch_array($call_1 )) { $tgl_1 [$i][0]=$row_tgl1 ['id_kyn']; $tgl_1 [$i][1]=$row_tgl1 ['nama_kyn']; $tgl_1 [$i][2]=$row_tgl1 ['ket']; $i++; } $i=0; 
    while($row_tgl2 =mysqli_fetch_array($call_2 )) { $tgl_2 [$i][0]=$row_tgl2 ['id_kyn']; $tgl_2 [$i][1]=$row_tgl2 ['nama_kyn']; $tgl_2 [$i][2]=$row_tgl2 ['ket']; $i++; } $i=0;
    while($row_tgl3 =mysqli_fetch_array($call_3 )) { $tgl_3 [$i][0]=$row_tgl3 ['id_kyn']; $tgl_3 [$i][1]=$row_tgl3 ['nama_kyn']; $tgl_3 [$i][2]=$row_tgl3 ['ket']; $i++; } $i=0;
    while($row_tgl4 =mysqli_fetch_array($call_4 )) { $tgl_4 [$i][0]=$row_tgl4 ['id_kyn']; $tgl_4 [$i][1]=$row_tgl4 ['nama_kyn']; $tgl_4 [$i][2]=$row_tgl4 ['ket']; $i++; } $i=0;
    while($row_tgl5 =mysqli_fetch_array($call_5 )) { $tgl_5 [$i][0]=$row_tgl5 ['id_kyn']; $tgl_5 [$i][1]=$row_tgl5 ['nama_kyn']; $tgl_5 [$i][2]=$row_tgl5 ['ket']; $i++; } $i=0;
    while($row_tgl6 =mysqli_fetch_array($call_6 )) { $tgl_6 [$i][0]=$row_tgl6 ['id_kyn']; $tgl_6 [$i][1]=$row_tgl6 ['nama_kyn']; $tgl_6 [$i][2]=$row_tgl6 ['ket']; $i++; } $i=0;
    while($row_tgl7 =mysqli_fetch_array($call_7 )) { $tgl_7 [$i][0]=$row_tgl7 ['id_kyn']; $tgl_7 [$i][1]=$row_tgl7 ['nama_kyn']; $tgl_7 [$i][2]=$row_tgl7 ['ket']; $i++; } $i=0;
    while($row_tgl8 =mysqli_fetch_array($call_8 )) { $tgl_8 [$i][0]=$row_tgl8 ['id_kyn']; $tgl_8 [$i][1]=$row_tgl8 ['nama_kyn']; $tgl_8 [$i][2]=$row_tgl8 ['ket']; $i++; } $i=0;
    while($row_tgl9 =mysqli_fetch_array($call_9 )) { $tgl_9 [$i][0]=$row_tgl9 ['id_kyn']; $tgl_9 [$i][1]=$row_tgl9 ['nama_kyn']; $tgl_9 [$i][2]=$row_tgl9 ['ket']; $i++; } $i=0;
    while($row_tgl10=mysqli_fetch_array($call_10)) { $tgl_10[$i][0]=$row_tgl10['id_kyn']; $tgl_10[$i][1]=$row_tgl10['nama_kyn']; $tgl_10[$i][2]=$row_tgl10['ket']; $i++; } $i=0;
    while($row_tgl11=mysqli_fetch_array($call_11)) { $tgl_11[$i][0]=$row_tgl11['id_kyn']; $tgl_11[$i][1]=$row_tgl11['nama_kyn']; $tgl_11[$i][2]=$row_tgl11['ket']; $i++; } $i=0;
    while($row_tgl12=mysqli_fetch_array($call_12)) { $tgl_12[$i][0]=$row_tgl12['id_kyn']; $tgl_12[$i][1]=$row_tgl12['nama_kyn']; $tgl_12[$i][2]=$row_tgl12['ket']; $i++; } $i=0;
    while($row_tgl13=mysqli_fetch_array($call_13)) { $tgl_13[$i][0]=$row_tgl13['id_kyn']; $tgl_13[$i][1]=$row_tgl13['nama_kyn']; $tgl_13[$i][2]=$row_tgl13['ket']; $i++; } $i=0;
    while($row_tgl14=mysqli_fetch_array($call_14)) { $tgl_14[$i][0]=$row_tgl14['id_kyn']; $tgl_14[$i][1]=$row_tgl14['nama_kyn']; $tgl_14[$i][2]=$row_tgl14['ket']; $i++; } $i=0;
    while($row_tgl15=mysqli_fetch_array($call_15)) { $tgl_15[$i][0]=$row_tgl15['id_kyn']; $tgl_15[$i][1]=$row_tgl15['nama_kyn']; $tgl_15[$i][2]=$row_tgl15['ket']; $i++; } $i=0;
    while($row_tgl16=mysqli_fetch_array($call_16)) { $tgl_16[$i][0]=$row_tgl16['id_kyn']; $tgl_16[$i][1]=$row_tgl16['nama_kyn']; $tgl_16[$i][2]=$row_tgl16['ket']; $i++; } $i=0;
    while($row_tgl17=mysqli_fetch_array($call_17)) { $tgl_17[$i][0]=$row_tgl17['id_kyn']; $tgl_17[$i][1]=$row_tgl17['nama_kyn']; $tgl_17[$i][2]=$row_tgl17['ket']; $i++; } $i=0;
    while($row_tgl18=mysqli_fetch_array($call_18)) { $tgl_18[$i][0]=$row_tgl18['id_kyn']; $tgl_18[$i][1]=$row_tgl18['nama_kyn']; $tgl_18[$i][2]=$row_tgl18['ket']; $i++; } $i=0;
    while($row_tgl19=mysqli_fetch_array($call_19)) { $tgl_19[$i][0]=$row_tgl19['id_kyn']; $tgl_19[$i][1]=$row_tgl19['nama_kyn']; $tgl_19[$i][2]=$row_tgl19['ket']; $i++; } $i=0;
    while($row_tgl20=mysqli_fetch_array($call_20)) { $tgl_20[$i][0]=$row_tgl20['id_kyn']; $tgl_20[$i][1]=$row_tgl20['nama_kyn']; $tgl_20[$i][2]=$row_tgl20['ket']; $i++; } $i=0;
    while($row_tgl21=mysqli_fetch_array($call_21)) { $tgl_21[$i][0]=$row_tgl21['id_kyn']; $tgl_21[$i][1]=$row_tgl21['nama_kyn']; $tgl_21[$i][2]=$row_tgl21['ket']; $i++; } $i=0;
    while($row_tgl22=mysqli_fetch_array($call_22)) { $tgl_22[$i][0]=$row_tgl22['id_kyn']; $tgl_22[$i][1]=$row_tgl22['nama_kyn']; $tgl_22[$i][2]=$row_tgl22['ket']; $i++; } $i=0;
    while($row_tgl23=mysqli_fetch_array($call_23)) { $tgl_23[$i][0]=$row_tgl23['id_kyn']; $tgl_23[$i][1]=$row_tgl23['nama_kyn']; $tgl_23[$i][2]=$row_tgl23['ket']; $i++; } $i=0;
    while($row_tgl24=mysqli_fetch_array($call_24)) { $tgl_24[$i][0]=$row_tgl24['id_kyn']; $tgl_24[$i][1]=$row_tgl24['nama_kyn']; $tgl_24[$i][2]=$row_tgl24['ket']; $i++; } $i=0;
    while($row_tgl25=mysqli_fetch_array($call_25)) { $tgl_25[$i][0]=$row_tgl25['id_kyn']; $tgl_25[$i][1]=$row_tgl25['nama_kyn']; $tgl_25[$i][2]=$row_tgl25['ket']; $i++; } $i=0;
    while($row_tgl26=mysqli_fetch_array($call_26)) { $tgl_26[$i][0]=$row_tgl26['id_kyn']; $tgl_26[$i][1]=$row_tgl26['nama_kyn']; $tgl_26[$i][2]=$row_tgl26['ket']; $i++; } $i=0;
    while($row_tgl27=mysqli_fetch_array($call_27)) { $tgl_27[$i][0]=$row_tgl27['id_kyn']; $tgl_27[$i][1]=$row_tgl27['nama_kyn']; $tgl_27[$i][2]=$row_tgl27['ket']; $i++; } $i=0;
    while($row_tgl28=mysqli_fetch_array($call_28)) { $tgl_28[$i][0]=$row_tgl28['id_kyn']; $tgl_28[$i][1]=$row_tgl28['nama_kyn']; $tgl_28[$i][2]=$row_tgl28['ket']; $i++; } $i=0;
    while($row_tgl29=mysqli_fetch_array($call_29)) { $tgl_29[$i][0]=$row_tgl29['id_kyn']; $tgl_29[$i][1]=$row_tgl29['nama_kyn']; $tgl_29[$i][2]=$row_tgl29['ket']; $i++; } $i=0;
    while($row_tgl30=mysqli_fetch_array($call_30)) { $tgl_30[$i][0]=$row_tgl30['id_kyn']; $tgl_30[$i][1]=$row_tgl30['nama_kyn']; $tgl_30[$i][2]=$row_tgl30['ket']; $i++; } $i=0;
    while($row_tgl31=mysqli_fetch_array($call_31)) { $tgl_31[$i][0]=$row_tgl31['id_kyn']; $tgl_31[$i][1]=$row_tgl31['nama_kyn']; $tgl_31[$i][2]=$row_tgl31['ket']; $i++; } $i=0;
   
?>
<html>
    <head>
        <title>table</title>
        <link rel="stylesheet" href="">
        <style>
            table {
              font-family: Arial, Helvetica, sans-serif;
              color: rgb(0, 0, 0);
              font-size: 9pt;
              background: #000000;
              border: #ccc 1px solid;
              -webkit-print-color-adjust: exact;
            }
            
            table th {
              padding: 2px 2px;
              border-left:1px solid #e0e0e0;
              border-bottom: 1px solid #e0e0e0;
              background: #ededed;
            }
            
            table th:first-child{  
              border-left:none;  
            }
            
            table tr {
              text-align: center;
              padding-left: 10px;
            }
            
            table td:first-child {
              text-align: left;
              padding-left: 10px;
              border-left: 0;
            }
            
            table td {
                font-size: 5pt;
              padding: 2px 2px;
              border-top: 1px solid #ffffff;
              border-bottom: 1px solid #e0e0e0;
              border-left: 1px solid #e0e0e0;
              background: #fafafa;
              background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
              background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
            }
            
            table tr:last-child td {
              border-bottom: 0;
            }
            
            table tr:last-child td:first-child {
              -moz-border-radius-bottomleft: 3px;
              -webkit-border-bottom-left-radius: 3px;
              border-bottom-left-radius: 3px;
            }
            
            table tr:last-child td:last-child {
              -moz-border-radius-bottomright: 3px;
              -webkit-border-bottom-right-radius: 3px;
              border-bottom-right-radius: 3px;
            }
            
            table tr:hover td {
              background: #f2f2f2;
              background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
              background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
            }
        </style>
    </head>
    <body>
        <div>
            <div>
                <!-- YEAR(tgl) = '$tahun' -->
                
                <form action="#" method="GET"> Bulan & Tahun
                <select name="bulan" id="bln" onchange="this.form.submit();">
                        <option value="1" <?php if($bln==1){ echo "selected";}?> >Januari</option>
                        <option value="2" <?php if($bln==2){ echo "selected";}?> >Februari</option>
                        <option value="3" <?php if($bln==3){ echo "selected";}?> >Maret</option>
                        <option value="4" <?php if($bln==4){ echo "selected";}?> >April</option>
                        <option value="5" <?php if($bln==5){ echo "selected";}?> >Mei</option>
                        <option value="6" <?php if($bln==6){ echo "selected";}?> >Juni</option>
                        <option value="7" <?php if($bln==7){ echo "selected";}?> >Juli</option>
                        <option value="8" <?php if($bln==8){ echo "selected";}?> >Agustus</option>
                        <option value="9" <?php if($bln==9){ echo "selected";}?> >September</option>
                        <option value="10" <?php if($bln==10){ echo "selected";}?>>Oktober</option>
                        <option value="11" <?php if($bln==11){ echo "selected";}?>>November</option>
                        <option value="12" <?php if($bln==12){ echo "selected";}?>>Desember</option>
                </select>
                <select name="tahun" id="th" onchange="this.form.submit();">
                    <?php
                        while($row_TAHUN=mysqli_fetch_array($hasil_TAHUN)){ 
                            ?><option value="<?php echo $row_TAHUN['year(tgl)'];?>" <?php if($thn==$row_TAHUN['year(tgl)']){ echo "selected";} ?> ><?php echo $row_TAHUN['year(tgl)'];?></option><?php
                        }
                    ?>
                </select> <a href="absen_pegawai.php">Back</a>
                </form>
                <a href="print_absen_harian.php?tahun=<?=$thn?>&bulan=<?=$bln?>" target="blank">Print</a>
            </div>
            <div>
                <table border="1">
                    <thead>
                        <tr>
                            <th rowspan="3" >No</th>
                            <th rowspan="3" >Nip</th>
                            <th rowspan="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th colspan="<?=$tanggal?>"><?php echo $nama_bulan." / ".$thn; ?></th>
                            <th colspan="4">Jumlah</th>
                        </tr>
                        <tr>
                            <?php for ($x=1; $x <=$tanggal; $x++) { 
                                echo "<th>".$x."</th>";
                            } ?>
                            <th>HTW</th>
                            <th>TM</th>
                            <th>PSW</th>
                            <th>TK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($tanggal==28){$no=1;
                        
                            for($i=0;$i<$jumlah;$i++){ 
                                ?> <tr>
                                    <td style="font-size: 9pt;"><?php echo $no; ?></td>       <td style="font-size: 9pt;" ><?php echo $tgl_1[$i][0];?></td>    <td style="font-size: 9pt; text-align:left;" ><?php echo $tgl_1[$i][1];?></td>
                                    <td><?php echo $tgl_1 [$i][2];?></td>   <td><?php echo $tgl_2 [$i][2];?></td>   <td><?php echo $tgl_3 [$i][2];?></td>
                                    <td><?php echo $tgl_4 [$i][2];?></td>   <td><?php echo $tgl_5 [$i][2];?></td>   <td><?php echo $tgl_6 [$i][2];?></td>
                                    <td><?php echo $tgl_7 [$i][2];?></td>   <td><?php echo $tgl_8 [$i][2];?></td>   <td><?php echo $tgl_9 [$i][2];?></td>
                                    <td><?php echo $tgl_10[$i][2];?></td>   <td><?php echo $tgl_11[$i][2];?></td>   <td><?php echo $tgl_12[$i][2];?></td>
                                    <td><?php echo $tgl_13[$i][2];?></td>   <td><?php echo $tgl_14[$i][2];?></td>   <td><?php echo $tgl_15[$i][2];?></td>
                                    <td><?php echo $tgl_16[$i][2];?></td>   <td><?php echo $tgl_17[$i][2];?></td>   <td><?php echo $tgl_18[$i][2];?></td>
                                    <td><?php echo $tgl_19[$i][2];?></td>   <td><?php echo $tgl_20[$i][2];?></td>   <td><?php echo $tgl_21[$i][2];?></td>
                                    <td><?php echo $tgl_22[$i][2];?></td>   <td><?php echo $tgl_23[$i][2];?></td>   <td><?php echo $tgl_24[$i][2];?></td>
                                    <td><?php echo $tgl_25[$i][2];?></td>   <td><?php echo $tgl_26[$i][2];?></td>   <td><?php echo $tgl_27[$i][2];?></td>
                                    <td><?php echo $tgl_28[$i][2];?></td>  
                                    <td style="font-size: 7pt;" ><?php echo $HTW[$i][0];?></td>  <td style="font-size: 7pt;" ><?php echo $TM[$i][1];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $PSW[$i][2];?></td>  <td style="font-size: 7pt;" ><?php echo $TK[$i][3];?></td>
                                </tr> <?php $no++;
                            }
                        }else if($tanggal==29){  $no=1;
                            for($i=0;$i<$jumlah;$i++){
                                ?> <tr>
                                    <td style="font-size: 9pt;"><?php echo $no; ?></td>       <td style="font-size: 9pt;" ><?php echo $tgl_1[$i][0];?></td>    <td style="font-size: 9pt; text-align:left;" ><?php echo $tgl_1[$i][1];?></td>
                                    <td><?php echo $tgl_1 [$i][2];?></td>   <td><?php echo $tgl_2 [$i][2];?></td>   <td><?php echo $tgl_3 [$i][2];?></td>
                                    <td><?php echo $tgl_4 [$i][2];?></td>   <td><?php echo $tgl_5 [$i][2];?></td>   <td><?php echo $tgl_6 [$i][2];?></td>
                                    <td><?php echo $tgl_7 [$i][2];?></td>   <td><?php echo $tgl_8 [$i][2];?></td>   <td><?php echo $tgl_9 [$i][2];?></td>
                                    <td><?php echo $tgl_10[$i][2];?></td>   <td><?php echo $tgl_11[$i][2];?></td>   <td><?php echo $tgl_12[$i][2];?></td>
                                    <td><?php echo $tgl_13[$i][2];?></td>   <td><?php echo $tgl_14[$i][2];?></td>   <td><?php echo $tgl_15[$i][2];?></td>
                                    <td><?php echo $tgl_16[$i][2];?></td>   <td><?php echo $tgl_17[$i][2];?></td>   <td><?php echo $tgl_18[$i][2];?></td>
                                    <td><?php echo $tgl_19[$i][2];?></td>   <td><?php echo $tgl_20[$i][2];?></td>   <td><?php echo $tgl_21[$i][2];?></td>
                                    <td><?php echo $tgl_22[$i][2];?></td>   <td><?php echo $tgl_23[$i][2];?></td>   <td><?php echo $tgl_24[$i][2];?></td>
                                    <td><?php echo $tgl_25[$i][2];?></td>   <td><?php echo $tgl_26[$i][2];?></td>   <td><?php echo $tgl_27[$i][2];?></td>
                                    <td><?php echo $tgl_28[$i][2];?></td>   <td><?php echo $tgl_29[$i][2];?></td>   
                                    <td style="font-size: 7pt;" ><?php echo $HTW[$i][0];?></td>  <td style="font-size: 7pt;" ><?php echo $TM[$i][1];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $PSW[$i][2];?></td>  <td style="font-size: 7pt;" ><?php echo $TK[$i][3];?></td> 
                                </tr> <?php $no++;
                            }
                        }else if($tanggal==30){   $no=1;
                            for($i=0;$i<$jumlah;$i++){
                                ?> <tr>
                                    <td style="font-size: 9pt;"><?php echo $no; ?></td>       <td style="font-size: 9pt;" ><?php echo $tgl_1[$i][0];?></td>    <td style="font-size: 9pt; text-align:left;" ><?php echo $tgl_1[$i][1];?></td>
                                    <td><?php echo $tgl_1 [$i][2];?></td>   <td><?php echo $tgl_2 [$i][2];?></td>   <td><?php echo $tgl_3 [$i][2];?></td>
                                    <td><?php echo $tgl_4 [$i][2];?></td>   <td><?php echo $tgl_5 [$i][2];?></td>   <td><?php echo $tgl_6 [$i][2];?></td>
                                    <td><?php echo $tgl_7 [$i][2];?></td>   <td><?php echo $tgl_8 [$i][2];?></td>   <td><?php echo $tgl_9 [$i][2];?></td>
                                    <td><?php echo $tgl_10[$i][2];?></td>   <td><?php echo $tgl_11[$i][2];?></td>   <td><?php echo $tgl_12[$i][2];?></td>
                                    <td><?php echo $tgl_13[$i][2];?></td>   <td><?php echo $tgl_14[$i][2];?></td>   <td><?php echo $tgl_15[$i][2];?></td>
                                    <td><?php echo $tgl_16[$i][2];?></td>   <td><?php echo $tgl_17[$i][2];?></td>   <td><?php echo $tgl_18[$i][2];?></td>
                                    <td><?php echo $tgl_19[$i][2];?></td>   <td><?php echo $tgl_20[$i][2];?></td>   <td><?php echo $tgl_21[$i][2];?></td>
                                    <td><?php echo $tgl_22[$i][2];?></td>   <td><?php echo $tgl_23[$i][2];?></td>   <td><?php echo $tgl_24[$i][2];?></td>
                                    <td><?php echo $tgl_25[$i][2];?></td>   <td><?php echo $tgl_26[$i][2];?></td>   <td><?php echo $tgl_27[$i][2];?></td>
                                    <td><?php echo $tgl_28[$i][2];?></td>   <td><?php echo $tgl_29[$i][2];?></td>   <td><?php echo $tgl_30[$i][2];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $HTW[$i][0];?></td>  <td style="font-size: 7pt;" ><?php echo $TM[$i][1];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $PSW[$i][2];?></td>  <td style="font-size: 7pt;" ><?php echo $TK[$i][3];?></td>
                                </tr> <?php $no++;
                            }
                        }else{  $no=1;
                            for($i=0;$i<$jumlah;$i++){
                                ?> <tr>
                                    <td style="font-size: 9pt;"><?php echo $no; ?></td>       <td style="font-size: 9pt;" ><?php echo $tgl_1[$i][0];?></td>    <td style="font-size: 9pt; text-align:left;" ><?php echo $tgl_1[$i][1];?></td>
                                    <td><?php echo $tgl_1 [$i][2];?></td>   <td><?php echo $tgl_2 [$i][2];?></td>   <td><?php echo $tgl_3 [$i][2];?></td>
                                    <td><?php echo $tgl_4 [$i][2];?></td>   <td><?php echo $tgl_5 [$i][2];?></td>   <td><?php echo $tgl_6 [$i][2];?></td>
                                    <td><?php echo $tgl_7 [$i][2];?></td>   <td><?php echo $tgl_8 [$i][2];?></td>   <td><?php echo $tgl_9 [$i][2];?></td>
                                    <td><?php echo $tgl_10[$i][2];?></td>   <td><?php echo $tgl_11[$i][2];?></td>   <td><?php echo $tgl_12[$i][2];?></td>
                                    <td><?php echo $tgl_13[$i][2];?></td>   <td><?php echo $tgl_14[$i][2];?></td>   <td><?php echo $tgl_15[$i][2];?></td>
                                    <td><?php echo $tgl_16[$i][2];?></td>   <td><?php echo $tgl_17[$i][2];?></td>   <td><?php echo $tgl_18[$i][2];?></td>
                                    <td><?php echo $tgl_19[$i][2];?></td>   <td><?php echo $tgl_20[$i][2];?></td>   <td><?php echo $tgl_21[$i][2];?></td>
                                    <td><?php echo $tgl_22[$i][2];?></td>   <td><?php echo $tgl_23[$i][2];?></td>   <td><?php echo $tgl_24[$i][2];?></td>
                                    <td><?php echo $tgl_25[$i][2];?></td>   <td><?php echo $tgl_26[$i][2];?></td>   <td><?php echo $tgl_27[$i][2];?></td>
                                    <td><?php echo $tgl_28[$i][2];?></td>   <td><?php echo $tgl_29[$i][2];?></td>   <td><?php echo $tgl_30[$i][2];?></td>
                                    <td><?php echo $tgl_31[$i][2];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $HTW[$i][0];?></td>  <td style="font-size: 7pt;" ><?php echo $TM[$i][1];?></td>
                                    <td style="font-size: 7pt;" ><?php echo $PSW[$i][2];?></td>  <td style="font-size: 7pt;" ><?php echo $TK[$i][3];?></td>
                                </tr> <?php $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        
        </div>
    </body>
</html>