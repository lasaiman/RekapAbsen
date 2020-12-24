<?php 
session_start();
require_once("config.php");
    if(!isset($_SESSION["user"])){
        $nilai=0;
        header("Location: ./login");
        exit;
    }
$tahun=$_GET['tahun'];
$sql_tahun="SELECT year(tgl) FROM absen GROUP BY year(tgl)";
$hasil_TAHUN=mysqli_query($conn,$sql_tahun);
                $sql="select * from absen";
                $hasil=mysqli_query($conn,$sql);
                $jumlah=mysqli_num_rows($hasil);
                // echo "Jumlah data ada : ".$jumlah;

$sql_nama="
select karyawan.nama_kyn FROM karyawan,absen
where karyawan.id_kyn=absen.id_kyn and absen.ket='TK'
group by karyawan.id_kyn
";

$sql_HTW="
SELECT id_kyn,   
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 01 , ket, NULL)) AS januari, COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 02 , ket, NULL)) AS februari,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 03 , ket, NULL)) AS maret,COUNT(IF( YEAR(tgl)      = '$tahun' AND MONTH(tgl)= 04 , ket, NULL)) AS april,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 05 , ket, NULL)) AS mei, COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 06 , ket, NULL)) AS juni,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 07 , ket, NULL)) AS juli,COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 08 , ket, NULL)) AS agustus,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 09 , ket, NULL)) AS september, COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 10 , ket, NULL)) AS oktober,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 11 , ket, NULL)) AS november,COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 12 , ket, NULL)) AS desember
FROM absen 
WHERE ket='HTW'
GROUP BY id_kyn
";
$sql_TM="
SELECT id_kyn,   
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 01 , ket, NULL)) AS januari, COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 02 , ket, NULL)) AS februari,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 03 , ket, NULL)) AS maret,COUNT(IF( YEAR(tgl)      = '$tahun' AND MONTH(tgl)= 04 , ket, NULL)) AS april,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 05 , ket, NULL)) AS mei, COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 06 , ket, NULL)) AS juni,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 07 , ket, NULL)) AS juli,COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 08 , ket, NULL)) AS agustus,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 09 , ket, NULL)) AS september, COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 10 , ket, NULL)) AS oktober,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 11 , ket, NULL)) AS november,COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 12 , ket, NULL)) AS desember
FROM absen 
WHERE ket='TM'
GROUP BY id_kyn
";
$sql_PSW="
SELECT id_kyn,   
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 01 , ket, NULL)) AS januari, COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 02 , ket, NULL)) AS februari,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 03 , ket, NULL)) AS maret,COUNT(IF( YEAR(tgl)      = '$tahun' AND MONTH(tgl)= 04 , ket, NULL)) AS april,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 05 , ket, NULL)) AS mei, COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 06 , ket, NULL)) AS juni,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 07 , ket, NULL)) AS juli,COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 08 , ket, NULL)) AS agustus,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 09 , ket, NULL)) AS september, COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 10 , ket, NULL)) AS oktober,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 11 , ket, NULL)) AS november,COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 12 , ket, NULL)) AS desember
FROM absen 
WHERE ket='PSW'
GROUP BY id_kyn
";
$sql_TK="
SELECT id_kyn,   
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 01 , ket, NULL)) AS januari, COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 02 , ket, NULL)) AS februari,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 03 , ket, NULL)) AS maret,COUNT(IF( YEAR(tgl)      = '$tahun' AND MONTH(tgl)= 04 , ket, NULL)) AS april,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 05 , ket, NULL)) AS mei, COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 06 , ket, NULL)) AS juni,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 07 , ket, NULL)) AS juli,COUNT(IF( YEAR(tgl)       = '$tahun' AND MONTH(tgl)= 08 , ket, NULL)) AS agustus,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 09 , ket, NULL)) AS september, COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 10 , ket, NULL)) AS oktober,
  COUNT(IF( YEAR(tgl) = '$tahun' AND MONTH(tgl)= 11 , ket, NULL)) AS november,COUNT(IF( YEAR(tgl)   = '$tahun' AND MONTH(tgl)= 12 , ket, NULL)) AS desember
FROM absen 
WHERE ket='TK'
GROUP BY id_kyn
";

$hasil_HTW=mysqli_query($conn,$sql_HTW);
$hasil_TM=mysqli_query($conn,$sql_TM);
$hasil_PSW=mysqli_query($conn,$sql_PSW);
$hasil_TK=mysqli_query($conn,$sql_TK);
$hasil_NAMA=mysqli_query($conn,$sql_nama);
$jumlah_2=mysqli_num_rows($hasil_HTW);
// echo "Jumlah data ada_2 : ".$jumlah_2;

$array_HTW[1000][12]=null; $array_TM[1000][12]=null; $array_PSW[1000][12]=null; $array_TK[1000][12]=null; $array_NAMA[1000][12]=null; 

$i=0;
while($row_HTW=mysqli_fetch_array($hasil_HTW)){ 
    $array_HTW[$i][0]  = $row_HTW['id_kyn'];
    $array_HTW[$i][1]  = $row_HTW['januari'];
    $array_HTW[$i][2]  = $row_HTW['februari'];
    $array_HTW[$i][3]  = $row_HTW['maret'];
    $array_HTW[$i][4]  = $row_HTW['april'];
    $array_HTW[$i][5]  = $row_HTW['mei'];
    $array_HTW[$i][6]  = $row_HTW['juni'];
    $array_HTW[$i][7]  = $row_HTW['juli'];
    $array_HTW[$i][8]  = $row_HTW['agustus'];
    $array_HTW[$i][9]  = $row_HTW['september'];
    $array_HTW[$i][10] = $row_HTW['oktober'];
    $array_HTW[$i][11] = $row_HTW['november'];
    $array_HTW[$i][12] = $row_HTW['desember']; $i++;
}

$i=0;
while($row_TM=mysqli_fetch_array($hasil_TM)){ 
    $array_TM[$i][0]  = $row_TM['id_kyn'];
    $array_TM[$i][1]  = $row_TM['januari'];
    $array_TM[$i][2]  = $row_TM['februari'];
    $array_TM[$i][3]  = $row_TM['maret'];
    $array_TM[$i][4]  = $row_TM['april'];
    $array_TM[$i][5]  = $row_TM['mei'];
    $array_TM[$i][6]  = $row_TM['juni'];
    $array_TM[$i][7]  = $row_TM['juli'];
    $array_TM[$i][8]  = $row_TM['agustus'];
    $array_TM[$i][9]  = $row_TM['september'];
    $array_TM[$i][10] = $row_TM['oktober'];
    $array_TM[$i][11] = $row_TM['november'];
    $array_TM[$i][12] = $row_TM['desember']; $i++;
}

$i=0;
while($row_PSW=mysqli_fetch_array($hasil_PSW)){ 
    $array_PSW[$i][0]  = $row_PSW['id_kyn'];
    $array_PSW[$i][1]  = $row_PSW['januari'];
    $array_PSW[$i][2]  = $row_PSW['februari'];
    $array_PSW[$i][3]  = $row_PSW['maret'];
    $array_PSW[$i][4]  = $row_PSW['april'];
    $array_PSW[$i][5]  = $row_PSW['mei'];
    $array_PSW[$i][6]  = $row_PSW['juni'];
    $array_PSW[$i][7]  = $row_PSW['juli'];
    $array_PSW[$i][8]  = $row_PSW['agustus'];
    $array_PSW[$i][9]  = $row_PSW['september'];
    $array_PSW[$i][10] = $row_PSW['oktober'];
    $array_PSW[$i][11] = $row_PSW['november'];
    $array_PSW[$i][12] = $row_PSW['desember']; $i++;
}

$i=0;
while($row_TK=mysqli_fetch_array($hasil_TK)){ 
    $array_TK[$i][0]  = $row_TK['id_kyn'];
    $array_TK[$i][1]  = $row_TK['januari'];
    $array_TK[$i][2]  = $row_TK['februari'];
    $array_TK[$i][3]  = $row_TK['maret'];
    $array_TK[$i][4]  = $row_TK['april'];
    $array_TK[$i][5]  = $row_TK['mei'];
    $array_TK[$i][6]  = $row_TK['juni'];
    $array_TK[$i][7]  = $row_TK['juli'];
    $array_TK[$i][8]  = $row_TK['agustus'];
    $array_TK[$i][9]  = $row_TK['september'];
    $array_TK[$i][10] = $row_TK['oktober'];
    $array_TK[$i][11] = $row_TK['november'];
    $array_TK[$i][12] = $row_TK['desember']; $i++;
}
$i=0;

while($row_NAMA=mysqli_fetch_array($hasil_NAMA)){ 
    $array_NAMA[$i][0]  = $row_NAMA['nama_kyn']; $i++;
}
$i=0;

?>
<html>
    <head>
        <title>table</title>
        <link rel="stylesheet" href="style_table.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <div>
            <!-- YEAR(tgl) = '$tahun' -->
                Data Tahun 
                <form action="#" method="GET">
                <select name="tahun" id="th" onchange="this.form.submit();">
                    <?php
                        while($row_TAHUN=mysqli_fetch_array($hasil_TAHUN)){ 
                            ?><option value="<?php echo $row_TAHUN['year(tgl)'];?>"><?php echo $row_TAHUN['year(tgl)'];?></option><?php
                        }
                    ?>
                    
                </select> <a href="absen_pegawai.php">Back</a>
                </form>
                <br>
                <a href="table_absen2.php?tahun=<?=$tahun?>"><img src="icon/panah.png" width="50px;" alt=""></a>
                <br>
                <a href="print.php?tahun=<?=$tahun?>" target="blank">Print</a>
            </div>
            <div class="table">
                <table border="0">
                    <thead>
                        <tr>
                            <th colspan="51">REKAPITULASI ABSEN<br>DINAS TENAGA KERJA DAN TRANSMIGRASI PROVINSI MALUKU</th>
                        </tr>
                        <tr>
                            <th rowspan="3">No</th>
                            <th rowspan="3">Nip</th>
                            <th rowspan="3" width="100px">Nama</th>
                            <th colspan="48"><?php echo $tahun ?></th>
                        </tr>
                        <tr>
                            <th colspan="4">Janunari</th>
                            <th colspan="4">Februari</th>
                            <th colspan="4">Maret</th>
                            <th colspan="4">April</th>
                            <th colspan="4">Mei</th>
                            <th colspan="4">Juni</th>
                            <!-- <th colspan="4">Juli</th>
                            <th colspan="4">Agustus</th>
                            <th colspan="4">September</th>
                            <th colspan="4">Oktober</th>
                            <th colspan="4">November</th>
                            <th colspan="4">Desember</th> -->
                        </tr>
                        <tr>
                            <?php
                            for ($i=1; $i <=6 ; $i++) { 
                                ?>
                                    <th>HTW</th>
                                    <th>TM</th>
                                    <th>PSW</th>
                                    <th>TK</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $y=1;
                            for ($x=0; $x < $jumlah_2; $x++) { ?>
                                <tr>
                                    <td><?php echo $y; ?></td>
                                    <td><?php echo $array_HTW   [$x][0]; ?></td>
                                    <td style="text-align: left; width: 200px;"><?php echo $array_NAMA  [$x][0]; ?></td>
                                    <td><?php echo $array_HTW   [$x][1]; ?></td>
                                    <td><?php echo $array_TM    [$x][1]; ?></td>
                                    <td><?php echo $array_PSW   [$x][1]; ?></td>
                                    <td><?php echo $array_TK    [$x][1]; ?></td>
                                    <td><?php echo $array_HTW   [$x][2]; ?></td>
                                    <td><?php echo $array_TM    [$x][2]; ?></td>
                                    <td><?php echo $array_PSW   [$x][2]; ?></td>
                                    <td><?php echo $array_TK    [$x][2]; ?></td>
                                    <td><?php echo $array_HTW   [$x][3]; ?></td>
                                    <td><?php echo $array_TM    [$x][3]; ?></td>
                                    <td><?php echo $array_PSW   [$x][3]; ?></td>
                                    <td><?php echo $array_TK    [$x][3]; ?></td>
                                    <td><?php echo $array_HTW   [$x][4]; ?></td>
                                    <td><?php echo $array_TM    [$x][4]; ?></td>
                                    <td><?php echo $array_PSW   [$x][4]; ?></td>
                                    <td><?php echo $array_TK    [$x][4]; ?></td>
                                    <td><?php echo $array_HTW   [$x][5]; ?></td>
                                    <td><?php echo $array_TM    [$x][5]; ?></td>
                                    <td><?php echo $array_PSW   [$x][5]; ?></td>
                                    <td><?php echo $array_TK    [$x][5]; ?></td>
                                    <td><?php echo $array_HTW   [$x][6]; ?></td>
                                    <td><?php echo $array_TM    [$x][6]; ?></td>
                                    <td><?php echo $array_PSW   [$x][6]; ?></td>
                                    <td><?php echo $array_TK    [$x][6]; ?></td>
                                </tr>        

                        <?php $y++; }
                        ?>
                      </tbody>
                </table>
            </div>
        </div>
    </body>
</html>