<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 10px;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #dddddd;
  }
  .table-title{
    padding-top:10px;
  }

  .info a {
    color: #ffff; 
    } /* CSS link color */

    .horizontal {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  width: 100%;
    }
    /* #col_status{
        cursor:pointer;
    }        
    #col_status:hover{
        background-color:yellow;
    } */

</style>
<?php  
ob_start();

if(!isset($_SESSION['akun_id'])) header("location: login.php");
// include "config.php";
include("koneksi.php");
$nama_username=$_SESSION['akun_username'];

    $sql= "SELECT * FROM user WHERE level='admin'";
    $result = $connection->query($sql);
    $result;




$sql2= "SELECT DISTINCT level FROM user";
$result2 = $connection->query($sql2);
$result2;
    
?>

<div class="row horizontal">
    <div class="col-md-12">
    <!-- <a id='tambah_data' data-toggle='modal' data-target='#tambah-data'><button style='border-radius:8px;' class='btn btn-success btn-xs'><i class='fa fa-plus'></i>Tambah Data</button></a> -->
        <div class="container-fluid" style="background-color: white; border-radius: 10px; width: 100%">
            <span class="row">
                <p class="table-title">Kolom Pencarian</p>
                    <input style=" margin:10px; float:left;" type="text" id="myInput" onkeyup="cariNama()" placeholder="Cari nama..." title="Type in a name">
                    <input style=" margin:10px; float:right;" type="text" id="kk" onkeyup="cariKK()" placeholder="Cari Username..." title="Tulis KK">
                    <div style="margin-left:30%; font-weight:bold;">
                        <a class="nav-link" href="?page=register">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Daftarkan User Baru</span></a>
                    </div>
            </span>
            <span>*Tekan shift lalu putar tombol <i>scroll</i> pada mouse untuk menggeser tabel ke kanan dan kiri atau gunakan <i>scrollbar</i> di bawah tabel</span>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Status</th>
                    <th scope="col">Foto</th>
                    <th scope="col">*</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $num = 1;
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $num++;?></th>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['level'];?></td>
                        <td><?php if($row['aktif'] == "1"){echo "Aktif";}else{echo "Nonaktif";}?></td>

                        <td><?php if($row['foto'] !=""){?><img style="height:50px;" src="images/<?php echo $row['foto'];?>"/><?php }else{echo "Tidak ada";}?></td>
                       
                        <?php 
                            echo 
                            "<td align='center'>";
                            if($_SESSION['akun_level'] == "admin"){
                                echo "<a id='edit_data' data-toggle='modal' data-target='#edit-data' data-id_data='".$row['id_user']."'"."data-nama='".$row['nama']."'"."data-nik='".$row['nik']."'"."data-username='".$row['username']."'"."data-email='".$row['email']."'"."data-level='".$row['level']."'".">
                                <button style='border-radius:8px;' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Ubah</button>
                                </a>";
                                
                            }

                        ?>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='18' style='text-align:center; text-wight:bold;'>Data atas nama anda tidak ditemukan<td><tr>";
                    }
                    // $conn->close();
                    ?>
                </tbody>
            </table>                
        </div>
    </div>
</div>


<!-- Modal pop up edit data -->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Form Perubahan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="form_edit_data" enctype="multipart/form-data">
        <div class="modal-body" id="modal-edit">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" required>
                <input  type="hidden" id="id_data" name="id_data">
            </div>
            <!-- <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div> -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
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

<!-- MODAL HAPUS DATA -->

<div class="modal fade" id="hapus-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="form_hapus_data" enctype="multipart/form-data">
        <div class="modal-body" id="modal-edit">
        
            <div class="form-group">
                <label for="nip">Yakin anda akan menghapus data dengan nama <p name="nama" id="nama"></p> </label>
                <!-- <label for="nip">NIP : <p name="nip" id="nip"></p> </label> -->
                <input  type="hidden" id="id_data" name="id_data">
                <!-- <input type="text" name="nama" class="form-control" id="nama" required> -->
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
        <input type="submit" class="btn btn-primary" name="submit" value="Yakin">
        </div>
        </form>
    </div>
    </div>
</div>

 <!-- MODAL TAMBAH DATA -->

<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="form-tambah" enctype="multipart/form-data">
        <div class="modal-body" id="modal-edit">
        <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" id="nik" name="nik" class="form-control" required>
                <div id="feed"></div>
            </div>
            <div class="form-group">
                <label for="no_kk">No KK</label>
                <input type="number" id="no_kk" name="no_kk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="dropdown form-control" id = "jenis_kelamin" name="jenis_kelamin">
                    <option value = "laki-laki">Laki-Laki</option>
                    <option value = "perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" required>
            </div>
            <div class="form-group">
                <label for="status_kawin">Status Kawin</label>
                <select class="dropdown form-control" id = "status_kawin" name="status_kawin">
                    <option value = "kawin">kawin</option>
                    <option value = "belum kawin">belum kawin</option>
                    <option value = "cerai">cerai</option>
                    <option value = "cerai mati">cerai mati</option>
                </select>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>
<script type="text/javascript">

// EDIT DATA 
$(document).on("click", "#edit_data", function() {
    var id_data = $(this).data('id_data');
    var nama = $(this).data('nama');
    var nik = $(this).data('nik');
    var username = $(this).data('username');
    var email = $(this).data('email');
    var level = $(this).data('level');  
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nik").val(nik);
    $("#modal-edit #username").val(username);
    $("#modal-edit #email").val(email);
    $("#modal-edit #level").val(level);
})
$(document).ready(function(e) {
    $("#form_edit_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_user.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=userPage";
    }));
});

//ubah status
$(document).on("click", "#edit_status", function() {
    var id_data = $(this).data('id_data');
    var status = $(this).data('status');
    var id_data2 = $(this).data('id_data2');

  
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #id_data2").val(id_data2);

    $("#modal-edit #status_pengajuan").val(status);
    // alert(id_data);
   
})
$(document).ready(function(e) {
    $("#form_edit_status").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_status.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatKTP";
    }));
});
// HAPUS DATA
$(document).on("click", "#hapus_data", function() {

    var nama = $(this).data('nama');
    var id = $(this).data('id_data');
    $("#modal-edit #nama").text(nama);
    $("#modal-edit #id_data").val(id);
})

// $(document).on("click", "#hapus_data", function() {
//     var id = $(this).data('id_data');
//     // var nama = $(this).data('nama');
//     var nama = 'tes';

//     // var username = $(this).data('username');
//     $("#modal-hapus #id_data").val(id);
//     $("#modal-hapus #nama").val(nama);
  
//     // $("#modal-hapus #username").val(username);

// })

$(document).ready(function(e) {
    $("#form_hapus_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'hapus_data_penduduk.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataPenduduk";
    }));
});

// TAMBAH DATA 
$(document).ready(function(e) {
    $("#form-tambah").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'tambah_data.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataPenduduk";
    }));
    
});


function cariNama() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function cariKK() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("kk");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).ready(function(){
    $('#feed').load('cekData.php').show();
    $('#nik').keyup(function(){
        $.post('cekData.php', {nik: form.nik.value}, 
        function(result){
            $('#feed').html(result).show();
        });
    });
});
</script>

