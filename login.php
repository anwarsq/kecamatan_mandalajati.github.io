<?php
ob_start();
session_start();
if(isset($_SESSION['akun_id'])) header("location: index.php");
include "config.php";

if(isset($_POST['submit_login'])){
    $username=$_POST['username'];
    $pass=hash('sha256',md5($_POST['password']));
    $sql_login= mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password='$pass' AND aktif='1'");
    $sql_login2= mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password='$pass' AND aktif='0'");
    $sql_login3= mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $sql_login4= mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND aktif='1'");
    $sql_login5= mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND aktif='0'");



    if(mysqli_num_rows($sql_login2)>0 | mysqli_num_rows($sql_login5)>0){
      echo '<div class="alert alert-warning" style="text-align:center;">
      Akun anda belum di aktivasi, silakan <a href="https://mail.google.com" target="_blank">cek email</a> anda
      </div>';
    }else if(mysqli_num_rows($sql_login)>0){
        $row_akun = mysqli_fetch_array($sql_login);
        $_SESSION['akun_id']=$row_akun['id_user'];
        $_SESSION['akun_username']=$row_akun['username'];
        $_SESSION['akun_level']=$row_akun['level'];
        $_SESSION['akun_nama']=$row_akun['nama'];
        $_SESSION['akun_email']=$row_akun['email'];
        $_SESSION['akun_nik']=$row_akun['nik'];
        $_SESSION['akun_nokk']=$row_akun['no_kk'];
        $_SESSION['akun_foto']=$row_akun['foto'];
        header("location:index.php");
    
    }else if(empty(mysqli_num_rows($sql_login3))){
      echo '<div class="alert alert-warning" style="text-align:center;">
      Anda belum memiliki akun yang terdaftar, silakan <a href="register.php">daftar akun</a>
      </div>';
    }else if(!empty(mysqli_num_rows($sql_login3)) && mysqli_num_rows($sql_login4)>0){
      header("location:login.php?login-gagal");
    }
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

  <title>PORTAL - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .bg-login{
      background-image:url("https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80");
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
  </style>

</head>

<body class="bg-gradient-secondary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Portal Kecamatan Mandalajati</h1>
                    <!-- <?php
                      foreach($result as $key=>$value){
                        echo $value['password'];
                      }
                    ?> -->
                  </div>
                  <form class="user login100-form validate-form" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <?php
                        if(isset($_GET['login-gagal'])){
                    ?>
                    <div>
                        <p style="color:red;">Periksa kembali username atau password yang anda masukan!</p>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <!-- <button class="login100-form-btn" type="submit" name="submit_login"> -->
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="submit_login">
                      Login
                    </button>
                    <!-- <hr> -->
                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small" href="register.php">Buat Akun!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>
