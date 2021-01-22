<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php
         include "config.php";
         $token=$_GET['t'];
         $sql_cek=mysqli_query($conn,"SELECT * FROM user WHERE token='".$token."' and aktif='0'");
         $jml_data=mysqli_num_rows($sql_cek);
         if ($jml_data>0) {
             //update data users aktif
             mysqli_query($conn,"UPDATE user SET aktif='1' WHERE token='".$token."' and aktif='0'");
             echo '<div class="alert alert-success" style="text-align:center;">
                            Akun anda sudah aktif, silahkan <a href="login.php">Login</a>
                        </div>';
         }else{
            $sql_cek2=mysqli_query($conn,"SELECT * FROM user WHERE token='".$token."' and aktif='1'");
            $jml_data2=mysqli_num_rows($sql_cek2);
            if ($jml_data2>0) {
                                        //data tidak di temukan
                                        echo '<div class="alert alert-warning" style="text-align:center;">
                                        Akun anda sudah pernah diaktivasi, silahkan <a href="login.php">Login</a>
                                        </div>';
            }else{
                                    //data tidak di temukan
                                    echo '<div class="alert alert-warning" style="text-align:center;>
                                    Invalid Token!
                                    </div>';
            }
                   }
    ?>
</div>
</body>
</html>
