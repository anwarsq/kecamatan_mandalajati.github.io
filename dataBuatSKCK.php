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

if($_SESSION['akun_level'] == "admin"){
if(isset($_POST['submit'])){
    if($_POST['filter_kelurahan'] == "Semua"){
        $sql= "SELECT * FROM buat_skck";
        $result = $connection->query($sql);
        $result;
    }else{
        $kelurahan=$_POST['filter_kelurahan'];
        $sql= "SELECT * FROM buat_skck WHERE kelurahan='$kelurahan'";
        $result = $connection->query($sql);
        $result;
    }

}else{
    $sql= "SELECT * FROM buat_skck";
    $result = $connection->query($sql);
    $result;
}
}else{
    if(isset($_POST['submit'])){
        if($_POST['filter_kelurahan'] == "Semua"){
            $sql= "SELECT * FROM buat_skck";
            $result = $connection->query($sql);
            $result;
        }else{
            $kelurahan=$_POST['filter_kelurahan'];
            $sql= "SELECT * FROM buat_skck WHERE kelurahan='$kelurahan'";
            $result = $connection->query($sql);
            $result;
        }
    
    }else{
        $sql= "SELECT * FROM buat_skck WHERE input_by='$nama_username'";
        $result = $connection->query($sql);
        $result;
    } 
}



$sql2= "SELECT DISTINCT kelurahan FROM buat_skck";
$result2 = $connection->query($sql2);
$result2;
    
if($_SESSION['akun_level'] == "admin"){
?>
<!-- <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-2" style="text-align:right;">
        <p>Filter Kelurahan :</p>
    </div>
    <div class="col-md-4">
        <form action="" method="POST">
            <div class="row" style="margin-right:1%;">
                <div class="col-md-9">
                    <select name="filter_kelurahan" id="filter_kelurahan" class="form-control">
                        <option value="Semua">-- Semua Kelurahan --</option>
                    <?php
                        foreach($result2 as $key=>$value){?>
                        <option value="<?php echo $value['kelurahan'];?>"><?php echo $value['kelurahan'];?></option>
                    <?php
                        }
                    ?>
                        
                    </select>
                </div>
                <div class="col-md-3" style="text-align:left;">
                <button type="submit" name="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
            
        </form>
    </div>
</div> -->
                    <?php } ?>
<div class="row horizontal">
    <div class="col-md-12">
    <!-- <a id='tambah_data' data-toggle='modal' data-target='#tambah-data'><button style='border-radius:8px;' class='btn btn-success btn-xs'><i class='fa fa-plus'></i>Tambah Data</button></a> -->
        <div class="container-fluid" style="background-color: white; border-radius: 10px; width: 250%">
            <span class="row">
                <p class="table-title">Data Penduduk</p>
                
                    <input style=" margin:10px; float:left;" type="text" id="myInput" onkeyup="cariNama()" placeholder="Cari nama..." title="Type in a name">
                    <input style=" margin:10px; float:right;" type="text" id="kk" onkeyup="cariKK()" placeholder="Cari KK..." title="Tulis KK">
            </span>
            <span>*Tekan shift lalu putar tombol <i>scroll</i> pada mouse untuk menggeser tabel ke kanan dan kiri atau gunakan <i>scrollbar</i> di bawah tabel</span>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <!-- <th scope="col">Kelurahan</th> -->
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NO KK</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <!-- <th scope="col">Umur</th> -->
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Agama</th>
                    <!-- <th scope="col">Status Kawin</th> -->
                    <th scope="col">Alamat</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Tanggal Input</th>
                    <th scope="col">Pengantar RT/RW</th>
                    <th scope="col">FC KK</th>
                    <th scope="col">Pass Photo</th>
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
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['nik'];?></td>
                        <td><?php echo $row['nokk'];?></td>
                        <td><?php echo $row['tpt_lahir'];?></td>
                        <td><?php echo $row['tgl_lahir'];?></td>

                        <?php $dari = new DateTime($row['tgl_lahir']);
                                $ke   = new DateTime('today');
                                $umur=$dari->diff($ke)->y;?>
                        <!-- <td ?php if($umur>45){echo "style='color:red'";}?>>?php $from = new DateTime($row['tgl_lahir']);
                                $to   = new DateTime('today');
                                echo $from->diff($to)->y;?></td> -->

                        <td><?php echo $row['jns_kelamin'];?></td>
                        <td><?php echo $row['pekerjaan'];?></td>
                        <td><?php echo $row['agama'];?></td>
                        <td><?php echo $row['alamat'];?></td>
                        <td><?php echo $row['keperluan'];?></td>
                        <td><?php echo $row['tanggal_input'];?></td>
                        <td><?php if($row['pengantar_rt'] !=""){?><a href="images/<?php echo $row['pengantar_rt'];?>">Lihat Surat Pengantar</a><?php }else{echo "Tidak ada surat pengantar";}?></td>
                        <td><?php if($row['fc_kk'] !=""){?><a href="images/<?php echo $row['fc_kk'];?>">Lihat FC KK</a><?php }else{echo "Tidak ada FC KK";}?></td>
                        <td><?php if($row['pass_photo'] !=""){?><a href="images/<?php echo $row['pass_photo'];?>">Lihat Pass Photo</a><?php }else{echo "Tidak ada pass photo";}?></td>
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
                                if($row['status']!="Diterima"){echo "<a id='edit_data' data-toggle='modal' data-target='#edit-data' data-id_data='".$row['id']."'"."data-status='".$row['status']."'"."data-id_data2='".$row['id_data']."'"."data-nama='".$row['nama']."'"."data-nik='".$row['nik']."'"."data-nokk='".$row['nokk']."'"."data-tempat_lahir='".$row['tpt_lahir']."'"."data-tgl_lahir='".$row['tgl_lahir']."'"."data-pekerjaan='".$row['pekerjaan']."'"."data-agama='".$row['agama']."'".">
                                <button style='border-radius:8px;' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Ubah</button>
                                </a>";
                                }
                            }else{
                                if($row['status']!="Diterima"){echo "<a id='edit_status' data-toggle='modal' data-target='#edit-status' data-id_data='".$row['id']."'"."data-status='".$row['status']."'".">
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
                <input type="hidden" name="email" value="<?php echo $_SESSION['akun_email'];?>">
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
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" required>
                <input  type="hidden" id="id_data" name="id_data">
            </div>
            <div class="form-group">
                <label for="nokk">No KK</label>
                <input type="text" name="nokk" class="form-control" id="nokk" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
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
                <label for="pendidikan">Pendidikan</label>
                <select class="dropdown form-control" id = "pendidikan" name="pendidikan">
                    <option value="" disabled>Pilih Pendidikan terakhir</option>
                    <option value = "Tidak Sekolah">Tidak Sekolah</option>
                    <option value = "SD">SD</option>
                    <option value = "SMP">SMP</option>
                    <option value = "SMA">SMA</option>
                    <option value = "Strata 1">Strata 1</option>
                    <option value = "Strata 2">Strata 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" required>
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

<!-- MODAL HAPUS DATA PENDUDUK -->

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
                <label for="nip">Yakin anda akan menghapus data penduduk dengan nama <p name="nama" id="nama"></p> </label>
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
            <!-- <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <select name="tanggal" id="tanggal">
                    <option value="">Pilih tanggal</option>
                    <?php for($d = 1; $d <=31; $d++){?>
                    <option value="<?php echo $d; ?>"><?php echo $d;?></option>
                    <?php } ?>
                </select>
                <select name="bulan" id="bulan">
                    <option value="">Pilih bulan</option>
                    <?php for($m = 1; $m <=12; $m++){?>
                    <?php $nama_bulan= array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')?>
                    <option value="<?php echo $m; ?>"><?php echo $nama_bulan[$m-1];?></option>
                    <?php } ?>
                </select>
                <select name="tahun" id="tahun">
                    <option value="">Pilih tahun</option>
                    <?php for($y = date('Y'); $y >=1900; $y--){?>
                    <option value="<?php echo $y; ?>"><?php echo $y;?></option>
                    <?php } ?>
                </select>
            </div> -->
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="dd">Pendidikan</label>
                <select class="dropdown form-control" id = "pendidikan" name="pendidikan">
                    <option value="" disabled>Pilih Pendidikan terakhir</option>
                    <option value = "Tidak Sekolah">Tidak Sekolah</option>
                    <option value = "SD">SD</option>
                    <option value = "SMP">SMP</option>
                    <option value = "SMA">SMA</option>
                    <option value = "Strata 1">Strata 1</option>
                    <option value = "Strata 2">Strata 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" required>
            </div>
            <!-- <div class="form-group">
                <label for="status_kawin">Status Kawin</label>
                <select class="dropdown form-control" id = "status_kawin" name="status_kawin">
                    <option value = "kawin">kawin</option>
                    <option value = "belum kawin">belum kawin</option>
                    <option value = "cerai">cerai</option>
                    <option value = "cerai mati">cerai mati</option>
                </select>
            </div> -->
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
// EDIT DATA PENDUDUK
$(document).on("click", "#edit_data", function() {
    var id_data = $(this).data('id_data');
    var nama = $(this).data('nama');
    var nik = $(this).data('nik');
    var nokk = $(this).data('nokk');
    var tempat_lahir = $(this).data('tempat_lahir');
    var tgl_lahir = $(this).data('tgl_lahir');
    var pekerjaan = $(this).data('pekerjaan');
    var pendidikan = $(this).data('pendidikan');
    var agama = $(this).data('agama');
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nik").val(nik);
    $("#modal-edit #nokk").val(nokk);
    $("#modal-edit #tempat_lahir").val(tempat_lahir);
    $("#modal-edit #tgl_lahir").val(tgl_lahir);
    $("#modal-edit #pekerjaan").val(pekerjaan);
    $("#modal-edit #pendidikan").val(pendidikan);
    $("#modal-edit #agama").val(agama);    
})
$(document).ready(function(e) {
    $("#form_edit_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'`edit_data_skck`.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatSKCK";
    }));
});

//ubah status
$(document).on("click", "#edit_status", function() {
    var id_data = $(this).data('id_data');
    var status = $(this).data('status');
  
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #status_pengajuan").val(status);
    // alert(id_data);
   
})
$(document).ready(function(e) {
    $("#form_edit_status").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_status_skck.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatSKCK";
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

// TAMBAH DATA PENDUDUK
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
    td = tr[i].getElementsByTagName("td")[2];
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

