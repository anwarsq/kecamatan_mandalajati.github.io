<?php
    // $servername = "localhost";
    // $user = "root";
    // $password = "";
    // $dbname = "locadata";
    
    // // Create connection
    // $conn = new mysqli($servername, $user, $password, $dbname);
    error_reporting(0);
    $conn=mysqli_connect('localhost', 'root', '', 'locadata');
    $nama= mysqli_real_escape_string($conn, $_POST['nama']);
    $check_nama = mysqli_query($conn, "SELECT nama from data_penduduk WHERE nama = '$nama'");
    $check_nama2 = mysqli_query($conn, "SELECT nama from user WHERE nama = '$nama'");
    $check_num2 = mysqli_num_rows($check_nama);
    $check_num3 = mysqli_num_rows($check_nama2);
    if($nama != ""){
        if($check_num2==0){
            echo "Nama"." <b>".$nama."</b> "."<span style='color:red;'>tidak terdaftar sebagai warga RT 03/RW 01. Gunakan nama lengkap</span>";
        }else if($check_num3>0){
            echo "<span style='color:red;'>Warga dengan nama</span>"." <b>".$nama."</b> "."<span style='color:red;'>sudah memiliki akun yang terdaftar</span>";
        }else{
            echo "Nama"." <b>".$nama."</b> "."terdaftar sebagai warga RT 03/RW 01";
        }  
    }

?>