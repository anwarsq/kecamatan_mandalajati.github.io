<?php
ob_start();
// BUAT KONEKSI KE DATABASE
include('koneksi.php');

$sql= "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC";
$result = $connection->query($sql);
$result;

?>

<style>
.content{
    text-align: justify;
}

     .info-box{
         /* margin:40px; */
         border-style: solid;
         border-width: 1px;
         height:300px;
         /* border-radius:20px; */
     }
     #berita{
       height:600px;
       overflow-y: scroll;
       overflow-x:hidden;
     }
 </style>
<div class="main">
    <h3 style="text-align:center">Selamat Datang Di Portal Kecamatan Mandalajati</h3>
    <div class="container-fluid" style="background-color:white; margin-bottom:10px; padding-bottom:10px; padding-top:10px;">
        <div class="cotent-container">
            <h5>ABOUT 
            <!-- ?php if(isset($_SESSION['akun_id']) AND $_SESSION['akun_level'] == "admin"){
                    echo "<button style='border-radius:8px; margin-left:10px;' class='btn btn-success btn-xs'><i class='fa fa-edit'></i><a href='?page=editAbout' style='color:white'>Ubah</a></button>";}?> -->
                    </h5>
            <hr>
            <div class="content">
            <div class="bg-info p-5 rounded text-white" style="font-size:20px;">
            <b><p style="text-align:center;">Visi kecamatan </p></b>
            <p style="text-align:center; padding-left:20%; padding-right:20%;">Terwujudnya optinalisasi pelayanan dalam rangka mendukung Kota Bandung yang unggul, nyaman, dan sejahtera</p>
            <br>
            <b><p style="text-align:center;">Misi kecamatan </p></b>
            <p style="text-align:center; padding-left:20%; padding-right:20%;">Terwujudnya optimalisasi pelayanan, dan meningkatkan kinerja pemerintah kecamatan mandalajati secara efektif dan akuntabel</p></div>
            <br><br>
            <b><p>Sekilas Tentang Kecamatan Mandalajati</p></b>
                <p>Mandalajati adalah salah satu kecamatan yang berada di Kota Bandung berbatas dengan Kecamatan Cimenyan sebelah utara, Kecamatan Ujung Berung sebelah timur, Kecamatan Arcamanik sebelah selatan dan Cibeunyi sebelah barat. Kecamatan  ini memberikan pelayanan terhadap empat kelurahan sekaligus yaitu Kelurahan Jatihandap, Karangpamulang, Pasir rimpun, dan Sindang Laya.</p>
                <p>Website ini merupakan prototipe dari Portal Kecamatan Mandalajati yang merupakan produk dari tugas akhir. Website ini berfungsi untuk mempermudah masyarakat dan petugas kecamatan dalam melakukan proses pengajuan atau mengelola data pengajuan pembuatan dokumen oleh masyarakat.</p>
            </div>

        </div>
        <div class="content-container">
            <h5>PETUNJUK</h5>
            <hr>
            <div class="content">
                <b><p>Tatacara Pengajuan :</p></b>
                <ol>
                    <li>Jika belum memiliki akun, maka pilih buat akun pada halaman login atau klik <a href="register.php">disini</a></li>
                    <li>Selesaikan proses aktivasi akun pada email yang anda daftarkan</li>
                    <li>Login dengan menggunakan akun yang anda miliki</li>
                    <li>Pilih menu formulir kemudian klik pilihan yang ada sesuai dengan kebutuhan anda</li>
                    <li>Isi formulir yang muncul pada halaman</li>
                    <li>Tekan submit, lalu rekap data akan dikirim ke email anda</li>
                    <li>Pilih menu Data lalu klik pilihan sesuai dengan pengajuan yang telah anda pilih sebelumnya. Pada halaman ini anda dapat melihat status pengajuan anda dan dapat pula melakukan perubahan data jika status pengajuan masih belum disetujui</li>
                    <li>Jika petugas sudah menyetujui atau menolak pengajuan anda, maka laporan akan masuk ke dalam email anda</li>
                    <li>Selalu cek email anda atau cek status pengajuan pada halaman data di website ini</li>
                
                </ol>
            </div>
        </div>
        <!-- <div class="container">
        <h6 style="text-align:center;">Perkembangan Kasus Covid 19</h6>

            <div class="row">
                <div class="col-sm-3 info-box" style="background-color:#ab4438">
                    <b><p>Kasus Nasional</p></b>
                    <div id="indonesia"></div>
                </div>
                <div class="col-sm-3 info-box" style="background-color:#3499eb">
                    <b><p>Kasus Jawa Barat</p></b>
                    <div id="jabar"></div>
                </div>
                <div class="col-sm-3 info-box" style="background-color:#fcba03">
                    <b><p>Kasus Global</p></b>
                    <div id="global"></div>
                </div>
            </div>
        </div> -->


        <div class="content-container" style="margin-bottom:10px;">
                <h5>PENGUMUMAN
                <?php 
                if(isset($_SESSION['akun_id']) AND $_SESSION['akun_level']=="admin"){
                
                    echo "<button style='border-radius:8px; margin-left:10px;' class='btn btn-success btn-xs'><i class='fa fa-plus'></i><a href='?page=tulisArtikel' style='color:white'>Tulis Pengumuman</a></button>";}?>
                </h5>
            
            <hr>
            <div class="row">
                <div class="col-md-9 col-sm-9">
                <!-- <div class="row" style="text-align:center;"> -->
                    
                        <?php foreach($result as $key=>$value){
                            if(isset($_SESSION['akun_id']) AND $_SESSION['akun_level']=="admin"){
                            echo "<div class='col-md-12' style='margin-bottom:10px;'><div class='container' style='border-style:groove; border-width:1px; background-color:#efeaef; border-radius:20px;'>
                            <h6 style='text-align:center;'><b>".$value['judul']."</b></h6>
                            <p style='text-align:right;'><small> Tanggal : ".$value['tanggal']."</small></p>
                            <p>".$value['isi']."</p>

                            <a id='hapus_data' data-toggle='modal' data-target='#hapus-data' data-id_data='".$value['id_pengumuman']."'"."data-judul='".$value['judul']."'".">
                        <button style='border-radius:8px;' class='btn btn-danger btn-xxs'><i class='fa fa-delete'></i>Hapus</button>
                        </a>
                        </div></div>";}else{
                            echo "<div class='col-md-12' style='margin-bottom:10px;'><div class='container' style='border-style:groove; border-width:1px; background-color:#efeaef; border-radius:20px;'>
                            <h6 style='text-align:center;'><b>".$value['judul']."</b></h6>
                            <p style='text-align:right;'><small> Tanggal : ".$value['tanggal']."</small></p>
                            <p>".$value['isi']."</p>
                        </div></div>";
                        }}

                        ?>
                    
                </div>
                
                <div class="col-md-3">
                <h4 style="text-align:center;"><u>Berita Terkini</u></h4>
                    <div id="berita"></div>
            
                </div>
            </div>
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
                <p>Yakin anda akan menghapus data dengan judul <span name="judul" id="judul"></span></p>
                <!-- <label for="nip">NIP : <p name="nip" id="nip"></p> </label> -->
                <input type="hidden" id="id_data" name="id_data">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>

<script
   src="http://code.jquery.com/jquery-3.3.1.js"
   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
   crossorigin="anonymous"></script>

   <script type="text/javascript">
    const proxyurl = "https://cors-anywhere.herokuapp.com/";
    const url = "https://api.kawalcorona.com/indonesia";
     $.getJSON(proxyurl + url, function(result){
       console.log(result);
       $.each(result, function(i){
         document.getElementById("indonesia").innerHTML +="Jumlah Positif :" + result[i].positif + "<br>Jumlah Meninggal :" + result[i].meninggal+" termasuk satria" + "<br>Jumlah Sembuh :" + result[i].sembuh + "<br><br>";
       });
     });

     const proxyurl2 = "https://cors-anywhere.herokuapp.com/";
    const url2 = "https://api.kawalcorona.com/indonesia/provinsi";
     $.getJSON(proxyurl2 + url2, function(result){
       console.log(result);
       $.each(result, function(i){
           if(result[i].attributes.Kode_Provi == 32){
         document.getElementById("jabar").innerHTML +="Jumlah Positif :" + result[i].attributes.Kasus_Posi + "<br>Jumlah Meninggal :" + result[i].attributes.Kasus_Meni + "<br>Jumlah Sembuh :" + result[i].attributes.Kasus_Semb + "<br><br>";
     }});
     });
   </script>
<script type="text/javascript">
// HAPUS DATA
$(document).on("click", "#hapus_data", function() {

    var judul = $(this).data('judul');
    var id_data = $(this).data('id_data');
    $("#modal-edit #judul").text(judul);
    $("#modal-edit #id_data").val(id_data);
})

$(document).ready(function(e) {
    $("#form_hapus_data").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'hapus_data_pengumuman.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
        $('.table').html(msg);
        }
    });
    window.location='?page=';
    }));
});


const proxyurl3 = "https://cors-anywhere.herokuapp.com/";
    const url3 = "https://www.news.developeridn.com/search/?q=covid";
     $.getJSON(proxyurl3 + url3, function(result){
       console.log(result.data);
       $.each(result.data, function(i){
        //  while(i<=3){

         document.getElementById("berita").innerHTML +=`
         <div style="margin: 0 auto; width:auto; margin-bottom:20px;">
            <a href="${result.data[i].link}" target='_BLANK'>${result.data[i].judul}</a><br>
            <img src="${result.data[i].poster}"/><br>
            <small> CNN Indonesia : "${result.data[i].waktu}"</small>
          </div><hr>`;
        //  i+=1;
        
     });
     });

</script>