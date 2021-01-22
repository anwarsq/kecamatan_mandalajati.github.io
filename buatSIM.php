<?php
ob_start();
// BUAT KONEKSI KE DATABASE
include('config.php');
?>
<div class="main">
    <div class="container-fluid" style="background-color:white; margin-bottom:10px; padding-bottom:10px; padding-top:10px;">
        <form id="form-sim" action="buat_sim.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Dengan ini saya menyatakan bahwa data yang saya isikan sudah benar!');">
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
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
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
                            <label for="fc_ktp">Fotocopy KTP</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="fc_ktp" name="fc_ktp" required>
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
                            <label for="surat_pindah">Surat Pindah Kota Asal</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="surat_pindah" name="surat_pindah" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="surat_jaminan">Surat Jaminan Bertempat Tinggal</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="surat_jaminan" name="surat_jaminan" required>
                        </div>
                    </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>