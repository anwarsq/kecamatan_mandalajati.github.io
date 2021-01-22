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
include("config.php");
$nama_username=$_SESSION['akun_username'];
if($_SESSION['akun_level'] == "admin"){
    $sql= "SELECT * FROM buat_spk";
    $result = $conn->query($sql);
    $result;
}else{
$sql= "SELECT * FROM buat_spk WHERE input_by='$nama_username'";
$result = $conn->query($sql);
$result;
}

?>

<div class="row horizontal">
    <div class="col-md-12">
    <!-- <a id='tambah_data' data-toggle='modal' data-target='#tambah-data'><button style='border-radius:8px;' class='btn btn-success btn-xs'><i class='fa fa-plus'></i>Tambah Data</button></a> -->
        <div class="container-fluid" style="background-color: white; border-radius: 10px; width: 350%">
            <span class="row">
                <p class="table-title">Kolom Pencarian</p>
                    <input style=" margin:10px; float:left;" type="text" id="idData" onkeyup="cariId()" placeholder="Cari ID..." title="Type in a name">
                    <input style=" margin:10px; float:left;" type="text" id="myInput" onkeyup="cariNama()" placeholder="Cari nama..." title="Type in a name">
                    <!-- <input style=" margin:10px; float:right;" type="text" id="kk" onkeyup="cariKK()" placeholder="Cari KK..." title="Tulis KK"> -->
            </span>
            <span>*Tekan shift lalu putar tombol <i>scroll</i> pada mouse untuk menggeser tabel ke kanan dan kiri atau gunakan <i>scrollbar</i> di bawah tabel</span>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Data</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Alamat Asal</th>
                    <th scope="col">Alamat Tujuan</th>
                    <th scope="col">Tangal Input</th>
                    <th scope="col">FC KK</th>
                    <th scope="col">FC KTP</th>
                    <th scope="col">Surat Pengantar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
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
                        <td><?php echo $row['id_data'];?></td>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['nik'];?></td>
                        <td><?php echo $row['pekerjaan'];?></td>
                        <td><?php echo $row['alamat_asal'];?></td>
                        <td><?php echo $row['alamat_tujuan'];?></td>
                        <td><?php echo $row['tanggal_input'];?></td>

                        <td><?php if($row['fc_kk'] !=""){?><a href="images/<?php echo $row['fc_kk'];?>">Lihat KK</a><?php }else{echo "Tidak ada KK";}?></td>
                        <td><?php if($row['fc_ktp'] !=""){?><a href="images/<?php echo $row['fc_ktp'];?>">Lihat KTP</a><?php }else{echo "Tidak ada KTP";}?></td>
                        <td><?php if($row['surat_pengantar'] !=""){?><a href="images/<?php echo $row['surat_pengantar'];?>">Lihat Surat</a><?php }else{echo "Tidak ada";}?></td>
                        <td id="col_status" <?php if($row['status']=='Baru'){
                            echo "style='color:black'";
                            }else if($row['status']=='Diproses' OR $row['status']=='Diterima'){
                                echo "style='background-color:#5EE6B1'";
                            }else{
                                echo "style='background-color:red'";
                            }?>><?php echo $row['status'];?></td>
                        <td><?php echo $row['keterangan'];?></td>
                        <?php 
                            echo 
                            "<td align='center'>";
                            if($_SESSION['akun_level'] != "admin"){
                                if($row['status']!="Diterima"){echo "<a id='edit_data' data-toggle='modal' data-target='#edit-data' data-id_data='".$row['id']."'"."data-status='".$row['status']."'"."data-id_data2='".$row['id_data']."'"."data-nama='".$row['nama']."'"."data-nik='".$row['nik']."'"."data-pekerjaan='".$row['pekerjaan']."'"."data-alamat_asal='".$row['alamat_asal']."'"."data-input_by='".$row['input_by']."'"."data-alamat_tujuan='".$row['alamat_tujuan']."'".">
                                <button style='border-radius:8px;' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Ubah</button>
                                </a>";
                                }
                            }else{
                                if($row['status']!="Diterima"){echo "<a id='edit_status' data-toggle='modal' data-target='#edit-status' data-id_data='".$row['id']."'"."data-status='".$row['status']."'"."data-id_data2='".$row['id_data']."'"."data-input_by='".$row['input_by']."'".">
                                <button style='border-radius:8px;' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Ubah Status</button>
                                </a>";
                                } 
                            }
                                if($row['status']=="Diterima" AND $_SESSION['akun_level']=="admin"){
                            echo "<a id='hapus_data' data-toggle='modal' data-target='#hapus-data' data-id_data='".$row['id']."'".">
                                <button style='border-radius:8px;' class='btn btn-danger btn-xs'><i class='fa fa-delete'></i>Hapus</button>
                            </a>
                            </td>";}
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

<!-- Modal pop up edit status -->
<div class="modal fade" id="edit-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Ubah Status Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="form_edit_status" enctype="multipart/form-data">
        <div class="modal-body" id="modal-edit">
            <div class="form-group">
                <label for="status_pengajuan">Status Pengajuan</label>
                <select name="status_pengajuan" id="status_pengajuan" class="form-control">
                    <option value="Baru">Baru</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
                <input type="hidden" name="id_data" class="form-control" id="id_data" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                <input type="hidden" name="id_data2" id="id_data2" required>
                <input type="hidden" name="input_by" id="input_by" required>
                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['akun_email'];?>" required>

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
                <input  type="hidden" id="id_data2" name="id_data2">

                <input  type="hidden" id="input_by" name="input_by">

            </div>

            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="alamat_asal">Alamat Asal</label>
                <textarea type="text" name="alamat_asal" class="form-control" id="alamat_asal" required></textarea>
            </div>
            <div class="form-group">
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <textarea type="text" name="alamat_tujuan" class="form-control" id="alamat_tujuan" required></textarea>
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
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
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
    var id_data2 = $(this).data('id_data2');
    var nama = $(this).data('nama');
    var nik = $(this).data('nik');
    var pekerjaan = $(this).data('pekerjaan');
    var alamat_asal = $(this).data('alamat_asal');
    var alamat_tujuan = $(this).data('alamat_tujuan');
    var input_by = $(this).data('input_by');
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nik").val(nik);
    $("#modal-edit #pekerjaan").val(pekerjaan);
    $("#modal-edit #alamat_asal").text(alamat_asal); 
    $("#modal-edit #alamat_tujuan").text(alamat_tujuan); 
    $("#modal-edit #input_by").val(input_by);   
    $("#modal-edit #id_data2").val(id_data2);    


})
$(document).ready(function(e) {
    $("#form_edit_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_spk.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatSPK";
    }));
});

//ubah status
$(document).on("click", "#edit_status", function() {
    var id_data = $(this).data('id_data');
    var status = $(this).data('status');
    var id_data2 = $(this).data('id_data2');
    var input_by = $(this).data('input_by');
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #id_data2").val(id_data2);
    $("#modal-edit #input_by").val(input_by);
    $("#modal-edit #status_pengajuan").val(status);
    // alert(id_data);
   
})
$(document).ready(function(e) {
    $("#form_edit_status").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_status_spk.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatSPK";
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

function cariId() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("idData");
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

function cariNama() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
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

