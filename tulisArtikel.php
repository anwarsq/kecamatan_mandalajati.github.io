<style>
    body{
	background: #fcfcfc;
    }
    h1{
        text-align: center;
        font-family: sans-serif;
        font-weight: 300;
        color: #fff;
    }
    
    .tombol{
        padding: 8px 15px;
        border-radius: 3px;
        background: #ECF0F1;
        border: none;
        color: #232323;
        font-size: 12pt;
    }
    
    .kotak{
        margin: 20px auto;
        background: #1ABC9C;
        width: 900px;	
        padding: 20px 50px 50px 50px;
        border-radius: 3px;
    }
</style>

<?php
    include('koneksi.php');

    if(isset($_POST['submit'])){
        if(isset($_POST['artikel']) && !empty($_POST['artikel'])){
            $konten = $_POST['artikel'];
            // $jenis = $_POST['jenis'];
            $judul=$_POST['judul'];
            $tanggal=date("Y-m-d h:i:s");
            $penulis =$_SESSION['akun_nama'];
        }else{
            $empty_error = '<b class="text-danger text-center>Harap tulis artikel</b>"';

        }
        if(isset($konten) && !empty($konten)){
                $insert_q = "INSERT INTO pengumuman (isi, judul, tanggal, penulis) values('$konten', '$judul', '$tanggal', '$penulis')";
            if(mysqli_query($connection,$insert_q)){

            }else{
                $submit_error = '<b class="text-danger text-center>You are not able to submit</b>"';
            }
        }
    }
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">


<div class="kotak">
    <h1>
        Form Artikel Informasi
    </h1>	
    <p>*Note: Gunakan PC untuk menulis artikel agar lebih mudah</p>
    <form id="form-artikel" action="" method="POST" enctype="multipart/form-data">
        <!-- ?php if($_SESSION['akun_level'] == 'admin'){?>
            <label for="jenis" style="color:#fff; font-weight:bold;">Jenis Tulisan :</label>
            <select class="dropdown form-control" name="jenis" id="jenis" required>
                <option value="informasi">Informasi Desa/Pengumuman</option>
                <option value="artikel">Berita/Artikel</option>
            </select>
        ?php } ?> -->
        <label for="judul" style="color:#fff; font-weight:bold;">Judul :</label>
        <input class="form-control" type="text" name="judul" id="judul" placeholder="Masukan judul...">
        <!-- <br> -->
        <label for="artikel" style="color:#fff; font-weight:bold;">Isi :</label>
        <textarea name="artikel" class="ckeditor" id="artikel"></textarea>
        <br/>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>
<script type="text/javascript">
//   $(document).ready(function(e) {
//     $("#form-artikel").on("submit", (function(e) {
//     e.preventDefault();
//     $.ajax({
//         url:'upload_artikel.php',
//         type: 'POST',
//         data: new FormData(this),
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: alert("Data sukses dimasukan")
//     });
//     window.location="?page=tulisArtikel";
//     }));
    
// });
</script>