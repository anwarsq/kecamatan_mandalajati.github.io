<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <?php 
    if(isset($_SESSION['akun_id']) && $_SESSION['akun_level']=="admin"){?>
  <div class="container" style="margin-top:-50px;">
    <?php }else{ ?>
      <div class="container">

    <?php } ?>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form name="form" action="tambah_user.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
                <!-- <div id="feedback2">here</div> -->
                <input  type="hidden" id="id_user" name="id_user">
              </div>
              <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" name="nik" class="form-control" id="nik" required>
                  <!-- <div id="feedback3"></div> -->
              </div>
              <div class="form-group">
                  <label for="username2">username</label>
                  <input type="text" name="username" class="form-control" id="username" required>
                  <div id="feedback"></div>
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <?php
              if(isset($_SESSION['akun_id']) && $_SESSION['akun_level']=="admin"){?>
                <div class="form-group">
                  <label for="level">Level Akun</label>
                  <select name="level" id="level" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <?php
              }else{?>
                <div class="form-group">
                <input type="hidden" name="level" class="form-control" id="level" value="user" required>
                </div>
            <?php }?>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                  <input type="checkbox" class="form-checkbox"> Show password
              </div>
              <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto" required>
              </div>
              <div class="form-group">
                <input class="btn btn-primary btn-user btn-block" type="submit" value="Simpan">
              </div>
              </form>
              <hr>
              <?php if(!isset($_SESSION['akun_id'])){?>

              <div class="text-center">
                <a class="small" href="login.php">Sudah punya akun? Login!</a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-3"></div>
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
  <script type="text/javascript">
    $(document).ready(function(){
    $('#feedback').load('check.php').show();
    $('#username').keyup(function(){
        $.post('check.php', {username: form.username.value}, 
        function(result){
            $('#feedback').html(result).show();
        });
    });
    
});


$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
  </script>

</body>

</html>
