
<?php 
// error_reporting(0); //tambahkan ini 
session_start();

$bulan =$_GET['bulan'];
$tahun =$_GET['tahun'];
$id_kyn=$_GET['id_kyn'];
require_once("config.php");
    if(!isset($_SESSION["user"])){
        $nilai=0;
        header("Location: login.php");
        exit;
    }


    $sql="select * from karyawan where id_kyn= $id_kyn";
    $hasil=mysqli_query($conn, $sql);
    $jumlah = mysqli_num_rows($hasil);
    
    

//Draw Calendar
function draw_calendar($month,$year){

	// Draw table for Calendar 
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	// Draw Calendar table headings 
	$headings = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '<tr class="calendar-row">';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		$days_in_this_week++;
		
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{ 
				$showtoday='<strong class="overday">'.$list_day.'</strong>';
			}else
			{
				$showtoday=$list_day;
			}
			$calendar.= '<div class="day-number" style="font-size: 10px;">
			          <select name="tgl['.$list_day.']" id="jabatan" style="width: 100%;">
                  <option value="HTW">HTW</option>
                  <option value="TM ">TM </option>
                  <option value="PSW">PSW</option>
                  <option value="TK ">TK </option>
                </select>
      '.$showtoday.'</div>';
      

		// Draw table end
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>'; 
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	// Finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++): 
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
			
		endfor;
	endif;

	// Draw table final row
	$calendar.= '</tr>'; 
	// Draw table end the table 
	$calendar.= '</table>';
	
	// Finally all done, return result 
	return $calendar;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>warni</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>

		@charset "utf-8";
		/* CSS Document */
		html,body,form{ margin:0px; padding:0px; font-family:Ebrima, Arial, Helvetica, sans-serif; font-size:12px; color:#666; empty-cells:hide;}
		table.calendar{border-style: solid; border-width: 1px; border-width:1px; border-color:#666; -moz-box-shadow:0px 0px 4px #CCCCCC; -webkit-box-shadow:0px 0px 4px #CCCCCC; box-shadow:0px 0px 4px #CCCCCC; }
		tr.calendar-row  {  }
		td.calendar-day  { min-height:80px; position:relative; } * html div.calendar-day { height:80px; }
		td.calendar-day:hover  { background:#FFF; -moz-box-shadow:0px 0px 20px #eeeeee inset; -webkit-box-shadow:0px 0px 20px #eeeeee inset; box-shadow:0px 0px 20px #eeeeee inset; cursor:pointer;}
		td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
		td.calendar-day-head {font-weight:bold; text-shadow:0px 1px 0px #FFF;color:#666; text-align:center; width:64px; padding:12px 6px; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC; background: #ffffff;
		background: -moz-linear-gradient(top,  #ffffff 0%, #ededed 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#ededed));
		background: -webkit-linear-gradient(top,  #ffffff 0%,#ededed 100%);
		background: -o-linear-gradient(top,  #ffffff 0%,#ededed 100%);
		background: -ms-linear-gradient(top,  #ffffff 0%,#ededed 100%);
		background: linear-gradient(to bottom,  #ffffff 0%,#ededed 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
		}
		div.day-number{padding:6px; text-align:center; }
		/* shared */
		td.calendar-day, td.calendar-day-np {padding:5px; border-bottom:1px solid #DBDBDB; border-right:1px solid #DBDBDB; font-size:14px;background: #ffffff;
		background: -moz-linear-gradient(top,  #ffffff 0%, #f2f2f2 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#f2f2f2));
		background: -webkit-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
		background: -o-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
		background: -ms-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
		background: linear-gradient(to bottom,  #ffffff 0%,#f2f2f2 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 );
		}


		.overday{ color:#164b87; text-shadow:0px 1px 0px #FFF;}
		.currentday{background: #6cb7f3 !important;
		background: -moz-linear-gradient(top,  #6cb7f3 0%, #388be8 100%) !important;
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6cb7f3), color-stop(100%,#388be8)) !important;
		background: -webkit-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
		background: -o-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
		background: -ms-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
		background: linear-gradient(to bottom,  #6cb7f3 0%,#388be8 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6cb7f3', endColorstr='#388be8',GradientType=0 ) !important; color:#FFF  !important; font-weight:bold; -moz-box-shadow:0px 0px 18px #1F68BA inset; -webkit-box-shadow:0px 0px 18px #1F68BA inset; box-shadow:0px 0px 18px #1F68BA inset;
		}
		.currentday:hover{-moz-box-shadow:0px 0px 24px #074080 inset !important; -webkit-box-shadow:0px 0px 24px #074080 inset !important; box-shadow:0px 0px 24px #074080 inset !important;}

</style>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        <div class="form-group">
          <form action="#">
            <input type="text" name="id_kyn" value="<?php echo $id_kyn?>" style="display: none;">
          <table border="0" width="100%">
            <tr>
              <td>
                <!-- <p id="ansgka" >p</p> -->
                <!-- <col id="angka"> -->
                <!-- <label for="" id="angka"></label> -->
                <label>Bulan</label>
                <select name="bulan" id="bulan" style="width: 60%;">
                <?php 
                  for ($a=1; $a <=12 ; $a++) { 
                    if($a==$bulan){
                      ?><option selected value="<?php echo $a; ?>"><?php
                        if($a==1){echo"Januari";}
                        else if($a==2){echo"Februari";}else if($a==3){echo"Maret";}else if($a==4){echo"April";}else if($a==5){echo"Mei";}else if($a==6){echo"Juni";}
                        else if($a==7){echo"Juli";}else if($a==8){echo"Agustus";}else if($a==9){echo"September";}else if($a==10){echo"Oktober";}else if($a==11){echo"November";}else if($a==12){echo"Desember";}
                      ?></option><?php
                    }else{
                      ?><option value="<?php echo $a; ?>"><?php
                        if($a==1){echo"Januari";}
                        else if($a==2){echo"Februari";}else if($a==3){echo"Maret";}else if($a==4){echo"April";}else if($a==5){echo"Mei";}else if($a==6){echo"Juni";}
                        else if($a==7){echo"Juli";}else if($a==8){echo"Agustus";}else if($a==9){echo"September";}else if($a==10){echo"Oktober";}else if($a==11){echo"November";}else if($a==12){echo"Desember";}
                      ?></option><?php
                    }
                  }
                ?>
                  
                </select>
              </td>
              
              <?php while($row=mysqli_fetch_array($hasil)) { ?>
              <td >
                 <?php echo "Nama: ".$row['nama_kyn']; ?>
              </td>
							<td rowspan="3"><img height='100 %' src="images/<?php echo $row['foto']; ?>" border="0"/>
              </td>
					
            </tr>
            <tr>
              <td>
                <label>Tahun</label>
                <select name="tahun" id="" style="width: 60%; ">
                  <?php $y=$tahun+5; 
                 for ($x=$tahun-5; $x <$y ; $x++) { 
                      if($x==$tahun){ 
                        ?><option selected value="<?php echo $x; ?>"><?php echo $x; ?></option><?php
                      }else{
                        ?><option value="<?php echo $x; ?>"><?php echo $x; ?></option><?php
                      }
                    }

                  ?>
                </select>
              </td>
              <td>
                <?php echo "Nip: ".$row['id_kyn']; ?>
              </td>
            </tr>
            <?php } ?>
            <tr>
              <td><center><input type="submit" name="benar" value="Refresh"></center></td>
            </tr>
          </table>
          </form>
          
        </div>  
      
      </div>
      <div class="card-body">
        <form method="GET" action="reg_proses.php">
          <input type="text" name="jml" value="<?php echo count('tgl'.$list_day)?>" style="display: none;">
          <input type="text" name="bln" value="<?php echo $bulan?>" style="display: none;">
          <input type="text" name="thn" value="<?php echo $tahun?>" style="display: none;">
          <input type="text" name="id_kyn" value="<?php echo $id_kyn?>" style="display: none;">
          <?php echo draw_calendar($bulan,$tahun);?>
          <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="absen_pegawai.php">Batal</a>
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
</script>
</body>

</html>
