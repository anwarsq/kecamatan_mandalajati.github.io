<?php
    include('koneksi.php');

    $nama_username=$_SESSION['akun_username'];
    $sql= "SELECT * FROM keluhan_saran WHERE username_input='$nama_username' ORDER BY tanggal DESC";
    $result = $conn->query($sql);
    $result;
    
    foreach($result as $key=>$value){
      $user=$value['username_tanggapan'];
    }
    $sql2= "SELECT * FROM user WHERE username='$user'";
    $result2 = $conn->query($sql2);
    $result2;
    foreach($result2 as $key=>$value){
      $foto=$value['foto'];
    }

?>

<style>
  /* Style inputs, select elements and textareas */
  input[type=text], select, textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
  }

  /* Style the label to display next to the inputs */
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }

  /* Style the submit button */
  .submit {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  /* Style the container */
  .container {
    border-radius: 5px;
    background-color: #ffff;
    padding: 20px;
  }

  /* Floating column for labels: 25% width */
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }

  /* Floating column for inputs: 75% width */
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
</style>
<div class="row">
<?php
foreach($result as $key=>$value){?>
    <div class="col-md-12">
        <div class="container-fluid" style="background-color:#fff; margin:5px;padding:5px;">
            <div>
                <p>Tanggal laporan : <?php echo $value['tanggal'];?></p>
            </div>
            <div style="background-color:#F2F3F5; border-radius: 20px; margin:5px;">
              <div class="keluhan row" style="margin-left:20px;">
                  <h6 style="margin-right: 30px; width:150px;">Keluhan Anda </h6>
                  <span><?php echo ":"." ".$value['keluhan'];?></span>
              </div>
            </div>
            <div style="background-color:#F2F3F5; border-radius: 20px; margin:5px;">
              <div class="saran row" style="margin-left:20px;">
                  <h6 style="margin-right: 30px; width:150px;">Saran Anda </h6>
                  <span><?php echo ":"." ".$value['saran'];?></span>
              </div>
            </div>
            <div style="background-color:#F2F3F5; border-radius: 20px; margin:5px;">
              <div class="nama row" style="margin-left:20px;">
                  <h6 style="margin-right: 30px; width:150px;">Tanggapan </h6>
                  <span><?php echo ":"." ".$value['tanggapan'];?></span>
              </div>
            </div>
            <div style="background-color:#F2F3F5; border-radius: 20px; margin:5px;">
              <div class="nama row" style="margin-left:20px;">
                  <h6 style="margin-right: 30px; width:150px;">Ditanggapi oleh </h6>
                  <span><?php echo ":"." ".$value['username_tanggapan'];?></span>
              </div>
            </div>
            <div style="background-color:#F2F3F5; border-radius: 20px; margin:5px;">
              <div class="nama row" style="margin-left:20px;">
                  <h6 style="margin-r6ight: 30px; width:150px;">Status </h6>
                  <span><?php echo ":"." ".$value['status'];?></span>
              </div>
            </div>
            <div>
              <?php
                    echo
                    "<a id='ubah_status' data-toggle='modal' data-target='#ubah-status' data-id_keluhan='".$value['id_keluhan']."'"." data-status='".$value['status']."'".">
                        <button style='border-radius:8px;' class='btn btn-secondary btn-xs'><i class='fa fa-edit'></i>Tandai sebagai sudah dibaca</button>
                    </a>";
                  ?>
            </div>
        </div>
    </div>
<?php }?>
</div>


<!-- TANGGAPAN -->
<div  style="width:100%;"class="modal fade" id="ubah-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title" id="exampleModalScrollableTitle">Tandai sebagai sudah dibaca?</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form_ubah_status" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <input class="form-control" type="hidden" name="tanggapan" id="tanggapan" placeholder="Masukan tanggapan anda...">
                    <!-- <br> -->
                    <input type="hidden" id="id_keluhan" name="id_keluhan">
                    <input type="hidden" id="user_tanggapan" name="user_tanggapan">
                    <br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                    <input type="submit" class="btn btn-primary" name="submit" value="Ya">
                </div>
            </form>
        </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on("click", "#ubah_status", function() {
        var id_keluhan = $(this).data('id_keluhan');
        $("#modal-edit #id_keluhan").val(id_keluhan);
        // $("#modal-edit #tanggapan").val(tanggapan);

    })

    $(document).ready(function(e) {
        $("#form_ubah_status").on("submit", (function(e) {
        e.preventDefault();
        $.ajax({
            url:'ubah_status.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg) {
            $('.table').html(msg);
            }
        });
        window.location="?page=tanggapanKeluhan";
        }));
    });
</script>