<?php
ob_start();
// BUAT KONEKSI KE DATABASE
include('koneksi.php');

$sql= "SELECT * FROM buat_ektp";
$result = $connection->query($sql);
$result;



?>
<div class="main">
    <div class="container-fluid" style="background-color:white; margin-bottom:10px; padding-bottom:10px; padding-top:10px;">
        <form id="form-ektp" action="buat_saw.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Dengan ini saya menyatakan bahwa data yang saya isikan sudah benar!');">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" required>
                <input type="hidden" value="<?php echo $_SESSION['akun_username'];?>" id="nama_username" name="nama_username">
                <input type="hidden" value="<?php echo $_SESSION['akun_email'];?>" id="email" name="email">

            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
            </div>
            <!-- <div class="form-group">
                <label for="nokk">No KK</label>
                <input type="number" class="form-control" id="nokk" name="nokk">
            </div> -->
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="nama_saksi">Nama Saksi</label>
                <input type="text" class="form-control" id="nama_saksi" name="nama_saksi" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div>
                <p><b>Unggah Dokumen</b></p>
                <hr>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="ktp_ahli">KTP Ahli Waris</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="ktp_ahli" name="ktp_ahli" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="fckk">Fotocopy KK</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="fckk" name="fckk" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="surat_kematian">Surat Kematian</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="surat_kematian" name="surat_kematian" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="ktp_saksi">KTP Saksi</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="ktp_saksi" name="ktp_saksi" required>
                        </div>
                    </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>