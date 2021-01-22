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
        <form id="form-ektp" action="buat_domisilip.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Dengan ini saya menyatakan bahwa data yang saya isikan sudah benar!');">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" required>
                <input type="hidden" value="<?php echo $_SESSION['akun_username'];?>" id="nama_username" name="nama_username">
                <input type="hidden" value="<?php echo $_SESSION['akun_email'];?>" id="email" name="email">

            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div>
                <p><b>Unggah Dokumen</b></p>
                <hr>
                    <!-- <div class="row form-group">
                        <div class="col-md-3">
                            <label for="ktp_ahli">KTP Ahli Waris</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="ktp_ahli" name="ktp_ahli">
                        </div>
                    </div> -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="ktp_pemilik">KTP Pemilik Perusahaan</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="ktp_pemilik" name="ktp_pemilik" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="surat_izin">Surat Izin Tetangga</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="surat_izin" name="surat_izin" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="sertifikat_tempat">Sertifikat Tempat Usaha</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="sertifikat_tempat" name="sertifikat_tempat" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="sertifikat_tempat">Sertifikat Tempat Usaha</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="sertifikat_tempat" name="sertifikat_tempat" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="akta_notaris">Akta Notaris</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="akta_notaris" name="akta_notaris" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="bukti_lunas">Bukti Lunas PBB</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="bukti_lunas" name="bukti_lunas" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="pernyataan_pemilik">Pernyataan Pemilik Bangunan</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="pernyataan_pemilik" name="pernyataan_pemilik" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="pernyataan_sumur">Pernyataan Bersedia Membuat Sumur Resapan</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="pernyataan_sumur" name="pernyataan_sumur" required>
                        </div>
                    </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>