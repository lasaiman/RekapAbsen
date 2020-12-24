<?php
    session_start();
    require_once 'config.php';
    if(isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        echo "test: ".$user.$pass;
        $query = "SELECT * FROM admin where username = 
        '$user' and password = '$pass'";
        $hasil = $conn->query($query);
        if($hasil->num_rows == 1){
            // $mhs= mysqli_fetch_assoc($query);
            while($data = $hasil->fetch_object()) {
                $_SESSION['user'] = true;
                $_SESSION['level'] = $data->level;      
                $_SESSION['nama'] = $data->nama;
                $_SESSION['username'] = $data->username;
                $_SESSION['password'] = $data->password;
                if($_SESSION['level']=="1"){
                    header('Location: index.php');
                    exit;
                }
            }
        }
        header('Location: login/');
    }


