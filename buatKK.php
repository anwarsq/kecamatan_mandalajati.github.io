<?php
ob_start();
// BUAT KONEKSI KE DATABASE
include('koneksi.php');

$sql= "SELECT * FROM buat_ektp";
$result = $connection->query($sql);
$result;



?>
<script type="text/javascript">
    function statusChange(){
        var s1 = document.getElementById("status_penduduk");

        if(s1.value == ""){
            document.getElementById("doc1").style.display="none";
            // document.getElementById('kecamatan').style.display="none";
        }else if(s1.value == "penduduk"){
            // alert('anda penduduk asli');
            document.getElementById("doc1").style.display="none";
            document.getElementById('kecamatan').style.display="";
        }else{
            document.getElementById("doc1").style.display="";
            document.getElementById('kecamatan').style.display="none";
            document.getElementById("doc2").style.display="none";

        }
    }
    function asalChange(){
        var s1 = document.getElementById("asalKec");

        if(s1.value == ""){
            document.getElementById("doc2").style.display="none";
        }else if(s1.value == "Mandalajati"){
            document.getElementById("doc2").style.display="none";
        }else{
            document.getElementById("doc2").style.display="";
        }

        element.removeAttribute("required");     //turns required off
        element.required = false;                //turns required off through reflected attribute
        jQuery(element).removeAttr('required');  //turns required off
        $("#passfoto").removeAttr('required');
    }
    function alasanBuatKK(){
        var s1 = document.getElementById("alasan");
        if(s1.value == "hilang"){
            // document.getElementById("doc3").style.display="";
            document.getElementById("doc3").style.display="";
        }else if(s1.value == ""){
            document.getElementById("doc3").style.display="none";
        }else{
            document.getElementById("doc3").style.display="none";
            // document.getElementById("passphoto").element.required = true;
            

        }
    }
</script>
<div class="main">
    <div class="container-fluid" style="background-color:white; margin-bottom:10px; padding-bottom:10px; padding-top:10px;">
        <form id="form-ektp" action="buat_kk.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Dengan ini saya menyatakan bahwa data yang saya isikan sudah benar!');">
            <div class="form-group">
                <label for="status_penduduk">Apakah Anda Penduduk Asli Bandung? <span class="req">*</span></label>
                <select name="status_penduduk" id="status_penduduk" class="form-control" onchange="statusChange()" required>
                    <option value="">--Jawaban--</option>
                    <option value="pendatang">Tidak</option>
                    <option value="penduduk">Ya</option>
                </select>
            </div>
            <div class="form-group" id="kecamatan">
                <label for="asalKec">Apakah Anda berasal dari Kecamatan Mandalajati? <span class="req">*</span></label>
                <select name="asalKec" id="asalKec" class="form-control" onchange="asalChange()" required>
                    <option value="">--Jawaban--</option>
                    <option value="Mandalajati">Ya</option>
                    <option value="Luar Mandalajati">Tidak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alasan">Alasan Membuat KK  <span class="req">*</span></label>
                <select name="alasan" id="alasan" class="form-control" onchange="alasanBuatKK()" required>
                    <option value="">--Jawaban--</option>
                    <option value="buat baru">Buat Baru</option>
                    <option value="hilang">Hilang</option>
                    <option value="perpanjangan">Perpanjangan</option>
                    <option value="pembaharuan">Pembaharuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat <span class="req">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="kelurahan">Kelurahan <span class="req">*</span></label>
                <select name="kelurahan" id="kelurahan" class="form-control" required>
                    <option value="Jatihandap">Jatihandap</option>
                    <option value="Karang Pamulang">Karang Pamulang</option>
                    <option value="Pasirimpun">Pasirimpun</option>
                    <option value="Sindangjaya">Sindangjaya</option>
                </select>
                <input type="hidden" name="nama_username" value="<?php echo $_SESSION['akun_username'];?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['akun_email'];?>">

            </div>
            <div class="form-group">
                <div style="background-color:#113263; padding-top: 5px; padding-bottom:0.5px; text-align:center;">
                    <p style="color:#fff"><b>Daftar Anggota Keluarga</b></p>
                </div>
                <hr>
                <table class="table table-bordered" id="dynamic_field">
                <tr><td colspan="2">Kepala Keluarga : </td></tr>
                    <tr>
                        <td>
                            <!--div class="top-row"-->
                            <div class="field-wrap">
                                <label>
                                    Nama : <span class="req">*</span>
                                </label>
                                <input class="form-control" type="text" required autocomplete="off" name="nama[]" required/>
                            </div>
                            
                            <div class="field-wrap">
                                <label>
                                    NIK :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="nik[]" required/>
                            </div>
                            
                            <div class="field-wrap">
                                <label>
                                    Jenis Kelamin :<span class="req">*</span>
                                </label>
                                <select name="jnsKelamin[]" id="" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <!-- <input class="form-control" type="text"required autocomplete="off" name="jnsKelamin[]"/> -->
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Tempat Lahir :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="tptLahir[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Tanggal Lahir :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="date"required autocomplete="off" name="tglLahir[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Agama :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="agama[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Pendidikan<span class="req">*</span>
                                </label>
                                <select name="pendidikan[]" id="" class="form-control" required>
                                    <option value="Tidak/Blm Sekolah">Tidak/Blm Sekolah</option>
                                    <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                    <option value="Strata I">Strata I</option>
                                    <option value="Strata II">Strata II</option>
                                </select>
                                <!-- <input class="form-control" type="text"required autocomplete="off" name="pendidikan[]"/> -->
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Pekerjaan :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="jnsPekerjaan[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Status Perkawinan :<span class="req">*</span>
                                </label>
                                <select name="statusKawin[]" id="" class="form-control" required>
                                    <option value="Tidak/Belum Kawin">Tidak/Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                    <option value="Cerai Hiduo">Cerai Hiduo</option>
                                </select>
                                <!-- <input class="form-control" type="text"required autocomplete="off" name="statusKawin[]"/> -->
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Status Hubungan Dalam Keluarga :<span class="req">*</span>
                                </label>
                                <select name="stsHubKeluarga[]" id="" class="form-control" required>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <!-- <input class="form-control" type="text"required autocomplete="off" name="stsHubKeluarga[]"/> -->
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Kewarganegaraan :<span class="req">*</span>
                                </label>
                                <select name="kewarganegaraan[]" id="" class="form-control" required>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                                <!-- <input class="form-control" type="text"required autocomplete="off" name="kewarganegaraan[]"/> -->
                            </div>

                            <div class="field-wrap">
                                <label>
                                    No Passpor :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text" autocomplete="off" name="noPaspor[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    No KITAP :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text" autocomplete="off" name="noKitap[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Nama Ayah :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="namaAyah[]" required/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Nama Ibu :<span class="req">*</span>
                                </label>
                                <input class="form-control" type="text"required autocomplete="off" name="namaIbu[]" required/>
                            </div>

                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>
                    </tr>
                </table>
            </div>
            <div>
                <div style="background-color:#113263; padding-top: 5px; padding-bottom:0.5px; text-align:center;">
                <p style="color:#fff"><b>Unggah Dokumen</b></p>
                </div>
                <hr>
                    <div class="row form-group" id="doc2">
                        <div class="col-md-2">
                            <label for="suratPindah">Surat Pindah Dari Kecamatan</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="suratPindah" name="suratPindah">
                        </div>
                    </div>
                    <div class="row form-group" id="doc1">
                        <div class="col-md-2">
                            <label for="SIMB">Surat Izin Menetap di Bandung :</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="SIMB" name="SIMB">
                        </div>
                    </div>
                    <div class="row form-group" id="doc3">
                        <div class="col-md-2">
                            <label for="suratHilang">Surat Kehilangan</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="suratHilang" name="suratHilang">
                        </div>
                    </div>
                    <div class="row form-group" id="passphoto">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="baris'+i+'"><td colspan="2">Anggota :</td></tr><tr id="row'+i+'"><td> <div class="field-wrap"><label>Nama : <span class="req">*</span></label><input class="form-control" type="text" required autocomplete="off" name="nama[]"/></div><div class="field-wrap"><label>NIK :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="nik[]"/></div><div class="field-wrap"><label>Jenis Kelamin :<span class="req">*</span></label><select name="jnsKelamin[]" id="" class="form-control"><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select></div><div class="field-wrap"><label>Tempat Lahir :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="tptLahir[]"/></div><div class="field-wrap"><label>Tanggal Lahir :<span class="req">*</span></label><input class="form-control" type="date"required autocomplete="off" name="tglLahir[]"/></div><div class="field-wrap"><label>Agama :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="agama[]"/></div><div class="field-wrap"><label>Pendidikan<span class="req">*</span></label><select name="pendidikan[]" id="" class="form-control"><option value="Tidak/Blm Sekolah">Tidak/Blm Sekolah</option><option value="SLTA/Sederajat">SLTA/Sederajat</option><option value="Strata I">Strata I</option><option value="Strata II">Strata II</option><option value="Strata II">Strata II</option></select></div><div class="field-wrap"><label>Pekerjaan :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="jnsPekerjaan[]"/></div><div class="field-wrap"><label>Status Perkawinan :<span class="req">*</span></label><select name="statusKawin[]" id="" class="form-control"><option value="Tidak/Belum Kawin">Tidak/Belum Kawin</option><option value="Kawin">Kawin</option><option value="Cerai Mati">Cerai Mati</option><option value="Cerai Hiduo">Cerai Hiduo</option></select></div><div class="field-wrap"><label>Status Hubungan Dalam Keluarga :<span class="req">*</span></label><select name="stsHubKeluarga[]" id="" class="form-control"><option value="Kepala Keluarga">Kepala Keluarga</option><option value="Anak">Anak</option><option value="Istri">Istri</option><option value="Lainnya">Lainnya</option></select></div><div class="field-wrap"><label>Kewarganegaraan :<span class="req">*</span></label><select name="kewarganegaraan[]" id="" class="form-control"><option value="WNI">WNI</option><option value="WNA">WNA</option></select></div><div class="field-wrap"><label>No Passpor :<span class="req">*</span></label><input class="form-control" type="text" autocomplete="off" name="noPaspor[]"/></div><div class="field-wrap"><label>No KITAP :<span class="req">*</span></label><input class="form-control" type="text" autocomplete="off" name="noKitap[]"/></div><div class="field-wrap"><label>Nama Ayah :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="namaAyah[]"/></div><div class="field-wrap"><label>Nama Ibu :<span class="req">*</span></label><input class="form-control" type="text"required autocomplete="off" name="namaIbu[]"/></div></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                // i--;
                var button_id = $(this).attr("id");
                // i-button_id;
                $("#row"+button_id+"").remove();
                $("#baris"+button_id+"").remove();

            });
        });

    
    </script>