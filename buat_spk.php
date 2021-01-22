<?php
ob_start();

include("config.php");

$digits = 10;


$nama = $_POST['nama'];
$nik= $_POST['nik'];
$pekerjaan= $_POST['pekerjaan'];
$alamat_asal= $_POST['alamat'];
$alamat_tujuan= $_POST['alamat_tujuan'];
$nama_username=$_POST['nama_username'];
$email=$_POST['email'];
$id_data="IDKTP".rand(pow(10, $digits-1), pow(10, $digits)-1);



// $fckk= $_FILES['fckk']['name'];
if(empty($_FILES['fckk']['tmp_name'])){
    $fckk="";
}else{
    $fckk="FKK".rand(pow(10, $digits-1), pow(10, $digits)-1);

}
$source1 = $_FILES['fckk']['tmp_name'];

// $passfoto= $_FILES['passfoto']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['fc_ktp']['name'])){
    $fc_ktp="";
}else{
    $fc_ktp="FKTP".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source2 = $_FILES['fc_ktp']['tmp_name'];

// $pengantar = $_FILES['pengantar']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['surat_pengantar']['name'])){
    $surat_pengantar="";
}else{
    $surat_pengantar = "SPKA".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source3 = $_FILES['surat_pengantar']['tmp_name'];

$folder = './images/';
move_uploaded_file($source1,$folder.$fckk);
move_uploaded_file($source2,$folder.$fc_ktp);
move_uploaded_file($source3,$folder.$surat_pengantar);


$sql = "INSERT INTO buat_spk (nama, nik, pekerjaan, alamat_asal, alamat_tujuan,fc_kk, fc_ktp, surat_pengantar, input_by, id_data) values('$nama', '$nik','$pekerjaan','$alamat_asal', '$alamat_tujuan','$fckk','$fc_ktp','$surat_pengantar', '$nama_username', '$id_data')";
$result = $conn->query($sql);
$result;


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
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
    $mail->addAddress($email, $nama_username);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Record Formulir Pembuatan Surat Pindah Keluar';
    $mail->Body    = '<div class="row">
                        <h3>Berikut ini adalah hasil rekap data pengisian formulir anda pada website Portal Kecamatan Mandalajati dengan id '.$id_data.'. Harap menunggu konfirmasi dari tim kami untuk lengkah selanjutnya</h3>
                        <p>Terimakasih,</p>
                        <table>
                            <tr>
                                <td>Nama </td>
                                <td>: '.$nama.'</td>
                            </tr>
                            <tr>
                                <td>NIK </td>
                                <td>: '.$nik.'</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan </td>
                                <td>: '.$pekerjaan.'</td>
                            </tr>
                            <tr>
                                <td>Alamat Asal</td>
                                <td>: '.$alamat_asal.'</td>
                            </tr>
                            <tr>
                            <td>Alamat Tujuan</td>
                            <td>: '.$alamat_tujuan.'</td>
                        </tr>
                        </table>
                     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location:index.php?page=BuatSPK");

?>