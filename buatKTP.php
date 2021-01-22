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
        <form id="form-ektp" action="buat_ektp.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Dengan ini saya menyatakan bahwa data yang saya isikan sudah benar!');">
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
                <label for="nokk">No KK</label>
                <input type="number" class="form-control" id="nokk" name="nokk" required>
            </div>
            <div class="form-group">
                <label for="tptLahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tptLahir" name="tptLahir" required>
            </div>
            <div class="form-group">
                <label for="tglLahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tglLahir" name="tglLahir" required>
            </div>
            <div class="form-group">
                <label for="jnsKelamin">Jenis Kelamin</label>
                <!-- <input type="text" name="jnsKelamin" id="jnsKelamin"> -->
                <select name="jnsKelamin" id="jnsKelamin" class="form-control" required>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" required>
            </div>
            <div class="form-group">
                <label for="kawin">Status Kawin</label>
                <select name="kawin" id="kawin" class="form-control" required>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <select name="kelurahan" id="kelurahan" class="form-control" required>
                    <option value="Jatihandap">Jatihandap</option>
                    <option value="Karang Pamulang">Karang Pamulang</option>
                    <option value="Pasirimpun">Pasirimpun</option>
                    <option value="Sindangjaya">Sindangjaya</option>
                </select>
            </div>
            <div>
                <p><b>Unggah Dokumen</b></p>
                <hr>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="pengantar">Pengantar RT/RW</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="pengantar" name="pengantar" required>
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
                            <label for="passfoto">Pass Photo 3x4</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="passfoto" name="passfoto" required>
                        </div>
                    </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>