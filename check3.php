<?php
    error_reporting(0);
    $conn=mysqli_connect('localhost', 'root', '', 'locadata');
    $nik= mysqli_real_escape_string($conn, $_POST['nik']);
    $check_nik = mysqli_query($conn, "SELECT nik from data_penduduk WHERE nik = '$nik'");
    $check_nik2 = mysqli_query($conn, "SELECT nik from user WHERE nik = '$nik'");
    $check_num2 = mysqli_num_rows($check_nik);
    $check_num3 = mysqli_num_rows($check_nik2);
    if($nik != ""){
        if($check_num2==0){
            echo "NIK"." <b>".$nik."</b> "."<span style='color:red;'>tidak terdaftar sebagai warga RT 03/RW 01</span>";
        }else if($check_num3>0){
            echo "<span style='color:red;'>Warga dengan nik</span>"." <b>".$nik."</b> "."<span style='color:red;'>sudah memiliki akun yang terdaftar</span>";
        }else{
            echo "NIK"." <b>".$nik."</b> "."terdaftar sebagai warga RT 03/RW 01";
        }  
    }

?>