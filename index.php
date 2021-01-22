<?php
ob_start();
session_start();
if(!isset($_SESSION['akun_id'])){?>
  <!-- header("location: login.php"); -->
  <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MANDALAJATI - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <img style="width:100%;" src="img/logo.png" alt="">
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/portal_kecamatan_mandalajati">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Formulir
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Formulir</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="width:110%;">
          <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=BuatKTP">Pembuatan KTP</a>
            <a class="collapse-item" href="?page=BuatKK">Pembuatan KK</a>
            <a class="collapse-item" href="?page=BuatSKCK">Pembuatan SKCK/SKKB</a>
            <a class="collapse-item" href="?page=BuatSAW">Pembuatan Surat Ahli Waris</a>
            <a class="collapse-item" href="?page=BuatDomisiliP">Pembuatan Domisili Perusahaan</a>
            <a class="collapse-item" href="?page=BuatSIM">Pembuatan Surat Izin Menetap</a>
            <a class="collapse-item" href="?page=BuatSPK">Pembuatan Surat Pindah Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     <!-- Heading -->
     <div class="sidebar-heading">
        Pages
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="width:110%;">
          <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=dataBuatKTP">Pembuatan KTP</a>
            <a class="collapse-item" href="?page=dataBuatKK">Pembuatan KK</a>
            <a class="collapse-item" href="?page=dataBuatSKCK">Pembuatan SKCK/SKKB</a>
            <a class="collapse-item" href="?page=dataBuatSAW">Pembuatan Surat Ahli Waris</a>
            <a class="collapse-item" href="?page=dataBuatDomisiliP">Pembuatan Domisili Perusahaan</a>
            <a class="collapse-item" href="?page=dataBuatSIM">Pembuatan Surat Izin Menetap</a>
            <a class="collapse-item" href="?page=dataBuatSPK">Pembuatan Surat Pindah Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <a class="collapse-item" href="login.php">Login</a>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
            $page = @$_GET['page'];
            if($page == ""){
              include "home.php";
            }else{
              echo "<div class='container' style='text-align:center; background-color:#ffff;'>
                    <h3>SILAKAN LOGIN TERLEBIH DAHULU</h3>
                    <a href='login.php'>Login disini</a>
              </div>";
            }
          ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <small>Rancangan tugas akhir</small>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>

</body>

</html>

<?php
} else{
include "config.php";
$nama_username=$_SESSION['akun_username'];



// $sql2="SELECT * FROM keluhan_saran WHERE username_input='$nama_username'";

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MANDALAJATI - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <img style="width:100%;" src="img/logo.png" alt="">
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/portal_kecamatan_mandalajati">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <?php if($_SESSION['akun_level'] == "admin"){?>
      <!-- <li class="nav-item active">
        <a class="nav-link" href="?page=register">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Register</span></a>
      </li> -->
      <li class="nav-item active">
      <a class="nav-link" href="?page=userPage">
      <i class="fas fa-user"></i>
          <span>Users</span></a>
      </li>
      <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Formulir
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Formulir</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="width:110%;">
          <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=BuatKTP">Pembuatan KTP</a>
            <a class="collapse-item" href="?page=BuatKK">Pembuatan KK</a>
            <a class="collapse-item" href="?page=BuatSKCK">Pembuatan SKCK/SKKB</a>
            <a class="collapse-item" href="?page=BuatSAW">Pembuatan Surat Ahli Waris</a>
            <a class="collapse-item" href="?page=BuatDomisiliP">Pembuatan Domisili Perusahaan</a>
            <a class="collapse-item" href="?page=BuatSIM">Pembuatan Surat Izin Menetap</a>
            <a class="collapse-item" href="?page=BuatSPK">Pembuatan Surat Pindah Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     <!-- Heading -->
     <div class="sidebar-heading">
        Pages
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="width:110%;">
          <div class="bg-light py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=dataBuatKTP">Pembuatan KTP</a>
            <a class="collapse-item" href="?page=dataBuatKK">Pembuatan KK</a>
            <a class="collapse-item" href="?page=dataBuatSKCK">Pembuatan SKCK/SKKB</a>
            <a class="collapse-item" href="?page=dataBuatSAW">Pembuatan Surat Ahli Waris</a>
            <a class="collapse-item" href="?page=dataBuatDomisiliP">Pembuatan Domisili Perusahaan</a>
            <a class="collapse-item" href="?page=dataBuatSIM">Pembuatan Surat Izin Menetap</a>
            <a class="collapse-item" href="?page=dataBuatSPK">Pembuatan Surat Pindah Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
              <?php if($_SESSION['akun_level']=='umum'){?>
                <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php foreach($result2 as $key=>$value){echo $value['jumlah'];}?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Tanggapan Terhadap Keluhan dan Saran Anda
                </h6>
                
                        <?php 
                          foreach($result as $key=>$value){
                            echo "
                            <a class='dropdown-item d-flex align-items-center' id='message_tanggapan'  href='?page=tanggapanKeluhan' data-target='#message-tanggapan' data-id_keluhan='".$value['id_keluhan']."'"." data-id_tanggapan='".$value['tanggapan']."'".">
                              <div class='dropdown-list-image mr-3'>
                                <img class='rounded-circle' src='images/".$value['foto']."' alt=''>
                                <div class='status-indicator bg-success'></div>
                              </div>
                              <div>
                                <div class='text-truncate'>".$value['tanggapan']."
                                </div>
                                <div class='small text-gray-500'>".$value['username_tanggapan']."
                                </div>
                              </div>
                            </a>
                            <a id='tanggap_keluhan' data-toggle='modal' data-target='#tanggap-keluhan' data-id_keluhan='".$value['id_keluhan']."'"." data-user_tanggapan='".$_SESSION['akun_username']."'".">
                            </a>";
                            
                          }  
                          if($check_num == 0){
                            echo "                            <a class='dropdown-item d-flex align-items-center' id='message_tanggapan'  href='?page=tanggapanKeluhan' data-target='#message-tanggapan' data-id_keluhan='".$value['id_keluhan']."'"." data-id_tanggapan='".$value['tanggapan']."'".">
                            <div>
                              <div class='text-truncate'>No unread message!
                              </div>
                              <div class='small text-gray-500'>Sistem
                              </div>
                            </div>
                          </a>";
                          }else{
                            
                          }          
                        ?>
                
                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
              </div>
            </li>
                        <?php }?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['akun_nama'];?></span>
                <img class="img-profile rounded-circle" src="images/<?php echo $_SESSION['akun_foto'];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a> -->
                <a class="dropdown-item" href="?page=dataUser">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Akun Saya
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
            
            <?php
          $page = @$_GET['page'];
          if($page == ""){
          }else if($page == "BuatKTP"){
            echo "Formulir Pembuatan KTP";
          }else if($page =="BuatKK"){
            echo "Formulir Pembuatan KK";
          }else if($page=="BuatSKCK"){
            echo "Formulir Pembuatan SKCK/SKKB";
          }else if($page=="BuatSAW"){
            echo "Formulir Pembuatan Surat Ahli Waris";
          }else if($page=="BuatDomisiliP"){
            echo "Formulir Pembuatan Domisili Perusahaan";
          }else if($page=="BuatSIM"){
            echo "Formulir Pembuatan Surat Izin Menetap";
          }else if($page=="BuatSPK"){
            echo "Formulir Pembuatan Surat Pindah Keluar";
          }else if($page=="dataBuatKTP"){
            echo "Data Pengajuan Pembuatan EKTP";
          }
          else if($page=="dataBuatKK"){
            echo "Data Pengajuan Pembuatan KK";
          }
          else if($page=="dataBuatSKCK"){
            echo "Data Pengajuan Pembuatan SKCK";
          }
          else if($page=="dataBuatSAW"){
            echo "Data Pengajuan Pembuatan Surat Ahli Waris";
          }
          else if($page=="userPage"){
            echo "Data Pengguna";
          }

        ?>
            </h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <?php
          // HALAMAN FORM 
            $page = @$_GET['page'];
            if($page == ""){
              include "home.php";
            }
            else if($page == "register"){
              include "register.php";
            }
            else if($page == "userPage"){
              include "user.php";
            }
            else if($page == "BuatKTP"){
              include "buatKTP.php";
            }
            else if($page == "BuatKK"){
              include "buatKK.php";
            }
            else if($page == "BuatSKCK"){
              include "buatSKCK.php";
            }
            else if($page == "BuatSAW"){
              include "buatSAW.php";
            }
            else if($page == "BuatDomisiliP"){
              include "buatDomisiliP.php";
            }
            else if($page=="BuatSIM"){
              include "buatSIM.php";
            }
            else if($page=="BuatSPK"){
              include "buatSPK.php";
            }
            // HALAMAN DATA
            
            else if($page == "dataBuatKTP"){
              include "dataBuatKTP.php";
            }
            else if($page == "dataBuatKK"){
              include "dataBuatKK.php";
            }
            else if($page == "dataBuatSKCK"){
              include "dataBuatSKCK.php";
            }
            else if($page == "tulisArtikel"){
              include "tulisArtikel.php";
            }else if($page == "editAbout"){
              include "editAbout.php";
            }
            else if($page == "dataBuatSAW"){
              include "dataBuatSAW.php";
            }
            else if($page == "dataBuatDomisiliP"){
              include "dataBuatDomisiliP.php";
            }
            else if($page=="dataBuatSIM"){
              include "dataBuatSIM.php";
            }
            else if($page=="dataBuatSPK"){
              include "dataBuatSPK.php";
            }
          ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <small>Rancangan tugas akhir | Yufia Rusmalina | NDUT</small>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- TANGGAPAN -->
<div  style="width:100%;"class="modal fade" id="tanggap-keluhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Form Tanggapan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form_tanggapan" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <label for="tanggapan" style="color:#fff; font-weight:bold;">Tanggapan :</label>
                    <input class="form-control" type="text" name="tanggapan" id="tanggapan" placeholder="Masukan tanggapan anda...">
                    <!-- <br> -->
                    <input type="hidden" id="id_keluhan" name="id_keluhan">
                    <input type="hidden" id="user_tanggapan" name="user_tanggapan">
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                </div>
            </form>
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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>

  <script type="text/javascript">

  $(document).ready(function(){
      $('#mytable td.status').each(function(){
          if ($(this).text() == 'sehat') {
              $(this).css('background-color','#53FCBA');
          }else if ($(this).text() == 'sakit') {
              $(this).css('background-color','#FE776D');
          }
      });
  });

// KELUHAN
    $(document).on("click", "#message_tanggapan", function() {
      
        var id_keluhan = $(this).data('id_keluhan');
        var user_tanggapan = $(this).data('user_tanggapan');
        // $("#modal-edit #id_keluhan").val(id_keluhan);
        // $("#modal-edit #user_tanggapan").val(user_tanggapan);
        // $("#modal-edit #tanggapan").val(tanggapan);
        // alert(id_keluhan);
        e.preventDefault();
        $.ajax({
            url:'tanggapan.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg) {
            $('.table').html(msg);
            }
        });
        window.location="?page=keluhanDanSaran";
    })

    $(document).ready(function(e) {
        $("#form_tanggapan").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url:'input_tanggapan.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg) {
            $('.table').html(msg);
            }
        });
        window.location="?page=keluhanDanSaran";
        }));
    });

  </script>
</body>

</html>
  <?php }?>
