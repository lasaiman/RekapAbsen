<?php
    session_start();
    require_once("config.php");
    $nip        =$_POST['nip'];
    $nama       =$_POST['nama'];
    $tgllahir   =$_POST['dd/mm/yyyy'];
    $gender     =$_POST['gender'];
    $jabatan    =$_POST['jabatan'];
    $hp         =$_POST['hp'];
    $foto = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    
   echo "data".$nip.$nama.$tgllahir.$gender.$jabatan.$hp.$foto.$tmp;     


    
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;

    // Set path folder tempat menyimpan fotonya
    $path = "images/".$fotobaru;
    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
        // Proses simpan ke Database
        $query = "INSERT INTO karyawan(id_kyn,nama_kyn,tgl_lahir,gender,jabatan,no_tlp,foto)
                        VALUES('".$nip."', '".$nama."', '".$tgllahir."', '".$gender."'
                        , '".$jabatan."', '".$hp."', '".$fotobaru."')";
                        $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("Location:add_pegawai.php");
                // header("Location:formulir.php?nim=$nim");
            }else{
                // Jika Gagal, Lakukan :
                header("Location:index.php");
                echo "eror 1";
                }
        }else{
        // Jika gambar gagal diupload, Lakukan :
        header("Location:index.php");
        echo "eror 2 gagal uplod foto";
        }
?>