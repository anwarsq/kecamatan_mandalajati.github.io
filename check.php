<?php
    // $servername = "localhost";
    // $user = "root";
    // $password = "";
    // $dbname = "locadata";
    
    // // Create connection
    // $conn = new mysqli($servername, $user, $password, $dbname);
    error_reporting(0);
    $conn=mysqli_connect('localhost', 'root', '', 'mandalajati');
    $username= mysqli_real_escape_string($conn, $_POST['username']);
    $check = mysqli_query($conn, "SELECT username from user WHERE username = '$username'");
    $check_num = mysqli_num_rows($check);
    $check_len=strlen($username);
    if($username != ""){
        if($check_num>0){
            echo "Username"." <b>".$username."</b> "."<span style='color:red;'>sudah digunakan, harap gunakan uername lain</span>";
        }else if($check_len<3){
            echo "<span style='color:red;'>Gunakan username dengan minimal 3 karakter</span>";
        }
        else{
        echo "Username"." <b>".$username."</b> "."dapat digunakan"; 
        }
    }
    

?>