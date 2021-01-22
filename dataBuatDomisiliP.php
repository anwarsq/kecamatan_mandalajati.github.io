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
    $sql= "SELECT * FROM buat_surat_domisili";
    $result = $conn->query($sql);
    $result;
}else{
$sql= "SELECT * FROM buat_surat_domisili WHERE input_by='$nama_username'";
$result = $conn->query($sql);
$result;
}
$sql2= "SELECT DISTINCT kelurahan FROM buat_ektp";
$result2 = $conn->query($sql2);
$result2;

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
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">KTP Pemilik</th>
                    <th scope="col">Surat Izin Tetangga</th>
                    <th scope="col">Sertifikat Tempat Usaha</th>
                    <th scope="col">Akta Notaris</th>
                    <th scope="col">Bukti Lunas PBB</th>
                    <th scope="col">Pernyataan Pemilik Bangunan</th>
                    <th scope="col">Pernyatan Sumur Resapan</th>
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
                        <td><?php echo $row['nama_perusahaan'];?></td>
                        <td><?php echo $row['alamat'];?></td>
                        <td><?php echo $row['tanggal_input'];?></td>
                        <td><?php if($row['ktp_pemilik'] !=""){?><a href="images/<?php echo $row['ktp_pemilik'];?>">Lihat KTP</a><?php }else{echo "Tidak ada KTP";}?></td>
                        <td><?php if($row['surat_izin_tetangga'] !=""){?><a href="images/<?php echo $row['surat_izin_tetangga'];?>">Lihat KTP</a><?php }else{echo "Tidak ada KTP";}?></td>
                        <td><?php if($row['sertifikat_tempat_usaha'] !=""){?><a href="images/<?php echo $row['sertifikat_tempat_usaha'];?>">Lihat Sertifikat</a><?php }else{echo "Tidak ada";}?></td>
                        <td><?php if($row['akta_notaris'] !=""){?><a href="images/<?php echo $row['akta_notaris'];?>">Lihat Akta</a><?php }else{echo "Tidak ada";}?></td>
                        <td><?php if($row['bukti_lunas_pbb'] !=""){?><a href="images/<?php echo $row['bukti_lunas_pbb'];?>">Lihat Bukti</a><?php }else{echo "Tidak ada";}?></td>
                        <td><?php if($row['pernyataan_pemilik_bangunan'] !=""){?><a href="images/<?php echo $row['pernyataan_pemilik_bangunan'];?>">Lihat Pernyataan</a><?php }else{echo "Tidak ada";}?></td>
                        <td><?php if($row['pernyataan_sumur_resapan'] !=""){?><a href="images/<?php echo $row['pernyataan_sumur_resapan'];?>">Lihat Pernyataan</a><?php }else{echo "Tidak ada";}?></td>

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
                                if($row['status']!="Diterima"){echo "<a id='edit_data' data-toggle='modal' data-target='#edit-data' data-id_data='".$row['id']."'"."data-status='".$row['status']."'"."data-id_data2='".$row['id_data']."'"."data-nama='".$row['nama']."'"."data-alamat='".$row['alamat']."'"."data-nama_perusahaan='".$row['nama_perusahaan']."'".">
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
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required></textarea>
                <input type="hidden" name="id_data2" id="id_data2" required>
                <input type="hidden" name="input_by" id="input_by" required>
   

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
                <input type="hidden" name="id_data" class="form-control" id="id_data" required>

            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea type="text" name="alamat" class="form-control" id="alamat" required></textarea>
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
    var alamat = $(this).data('alamat');
    var nama_perusahaan = $(this).data('nama_perusahaan');    
    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #nama").val(nama);
    $("#modal-edit #nik").val(nik);
    $("#modal-edit #alamat").text(alamat);    
    $("#modal-edit #nama_perusahaan").val(nama_perusahaan);  
})
$(document).ready(function(e) {
    $("#form_edit_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_domisili.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatDomisiliP";
    }));
});

//ubah status
$(document).on("click", "#edit_status", function() {
    var id_data = $(this).data('id_data');
    var status = $(this).data('status');
    var keterangan = $(this).data('keterangan');
    var id_data2 = $(this).data('id_data2');
    var input_by = $(this).data('input_by');

    $("#modal-edit #id_data").val(id_data);
    $("#modal-edit #keterangan").val(keterangan);
    $("#modal-edit #id_data2").val(id_data2);
    $("#modal-edit #status_pengajuan").val(status);
    $("#modal-edit #input_by").val(input_by);

    // alert(id_data);
   
})
$(document).ready(function(e) {
    $("#form_edit_status").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'edit_data_status_domisili.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location="?page=dataBuatDomisiliP";
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

// function cariKK() {
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("kk");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[3];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }

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

