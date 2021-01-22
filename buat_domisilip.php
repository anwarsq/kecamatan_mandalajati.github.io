<?php
ob_start();

include("config.php");

// function createRandomPassword() { 

//     $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
//     srand((double)microtime()*1000000); 
//     $i = 0; 
//     $filenameKTP = '' ; 

//     while ($i <= 7) { 
//         $num = rand() % 33; 
//         $tmp = substr($chars, $num, 1); 
//         $pass = $pass . $tmp; 
//         $i++; 
//     } 

//     return $filenameKTP; 

// } 

$digits = 10;


$nama = $_POST['nama'];
$nama_perusahaan= $_POST['nama_perusahaan'];
$alamat= $_POST['alamat'];
$input_by=$_POST['nama_username'];
$email=$_POST['email'];
$id_data="IDDP".rand(pow(10, $digits-1), pow(10, $digits)-1);



// $passfoto= $_FILES['passfoto']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['ktp_pemilik']['name'])){
    $ktp_pemilik="";
}else{
    $ktp_pemilik="KTPA".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source2 = $_FILES['ktp_pemilik']['tmp_name'];

// $pengantar = $_FILES['pengantar']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['surat_izin']['name'])){
    $surat_izin="";
}else{
    $surat_izin = "SIT".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source3 = $_FILES['surat_izin']['tmp_name'];

if(empty($_FILES['sertifikat_tempat']['name'])){
    $sertifikat_tempat="";
}else{
    $sertifikat_tempat="STU".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source4 = $_FILES['sertifikat_tempat']['tmp_name'];

if(empty($_FILES['akta_notaris']['name'])){
    $akta_notaris="";
}else{
    $akta_notaris="AKNO".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source5 = $_FILES['akta_notaris']['tmp_name'];

if(empty($_FILES['bukti_lunas']['name'])){
    $bukti_lunas="";
}else{
    $bukti_lunas="BLP".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source6 = $_FILES['bukti_lunas']['tmp_name'];

if(empty($_FILES['pernyataan_pemilik']['name'])){
    $pernyataan_pemilik="";
}else{
    $pernyataan_pemilik="PPB".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source7 = $_FILES['pernyataan_pemilik']['tmp_name'];

if(empty($_FILES['pernyataan_sumur']['name'])){
    $pernyataan_sumur="";
}else{
    $pernyataan_sumur="PBMS".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source8 = $_FILES['pernyataan_sumur']['tmp_name'];

$folder = './images/';
move_uploaded_file($source2,$folder.$ktp_pemilik);
move_uploaded_file($source3,$folder.$surat_izin);
move_uploaded_file($source4,$folder.$sertifikat_tempat);
move_uploaded_file($source5,$folder.$akta_notaris);
move_uploaded_file($source6,$folder.$bukti_lunas);
move_uploaded_file($source7,$folder.$pernyataan_pemilik);
move_uploaded_file($source8,$folder.$pernyataan_sumur);



$sql = "INSERT INTO buat_surat_domisili (nama, nama_perusahaan, alamat, ktp_pemilik, surat_izin_tetangga, sertifikat_tempat_usaha, akta_notaris, bukti_lunas_pbb, pernyataan_pemilik_bangunan, pernyataan_sumur_resapan, input_by, id_data) values('$nama', '$nama_perusahaan', '$alamat', '$ktp_pemilik', '$surat_izin', '$sertifikat_tempat', '$akta_notaris', '$bukti_lunas', '$pernyataan_pemilik', '$pernyataan_sumur', '$input_by', '$id_data')";
$result = $conn->query($sql);
$result;


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $result2;

// KIRIM EMAIL

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'horigan12@gmail.com';                 // SMTP username
    $mail->Password = '@75912612An';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('horigan12@gmail.com', 'PORTAL KECAMATAN MANDALAJATI');
    $mail->addAddress($email, $input_by);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Record Formulir Pembuatan Surat Domisili Perusahaan';
    $mail->Body    = '<div class="row">
                        <p>Berikut ini adalah hasil rekap data pengisian formulir anda pada website Portal Kecamatan Mandalajati dengan id <b>'.$id_data.'</b>. Harap menunggu konfirmasi dari tim kami untuk lengkah selanjutnya</p>
                        <p>Terimakasih,</p>
                        <table>
                            <tr>
                                <td>Nama </td>
                                <td>: '.$nama.'</td>
                            </tr>
                            <tr>
                                <td>Nama Perusahaan </td>
                                <td>: '.$nama_perusahaan.'</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>: '.$alamat.'</td>
                            </tr>
                        </table>
                     </div>
                     <div>
                        <p>Detail lengkap pengajuan anda dapat dilihat pada halaman web kami</p>
                     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location:index.php?page=BuatDomisiliP");

?>