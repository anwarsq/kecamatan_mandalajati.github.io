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
$nik= $_POST['nik'];
$nokk= $_POST['nokk'];
$tptLahir= $_POST['tptLahir'];
$tglLahir= $_POST['tglLahir'];
$jnsKelamin= $_POST['jnsKelamin'];
$pekerjaan= $_POST['pekerjaan'];
$agama= $_POST['agama'];
$alamat= $_POST['alamat'];
$keperluan= $_POST['keperluan'];
$nama_username=$_POST['nama_username'];
$email=$_POST['email'];


// $fckk= $_FILES['fckk']['name'];
if(empty($_FILES['fckk']['tmp_name'])){
    $fckk="";
}else{
    $fckk="KK".rand(pow(10, $digits-1), pow(10, $digits)-1);

}
$source1 = $_FILES['fckk']['tmp_name'];

if(empty($_FILES['fcktp']['tmp_name'])){
    $fcktp="";
}else{
    $fcktp="KTP".rand(pow(10, $digits-1), pow(10, $digits)-1);

}
$source1 = $_FILES['fcktp']['tmp_name'];

// $passfoto= $_FILES['passfoto']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['passfoto']['name'])){
    $passfoto="";
}else{
    $passfoto="PASS".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source2 = $_FILES['passfoto']['tmp_name'];

// $pengantar = $_FILES['pengantar']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['pengantar']['name'])){
    $pengantar="";
}else{
    $pengantar = "PENG".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source = $_FILES['pengantar']['tmp_name'];

$folder = './images/';
move_uploaded_file($source,$folder.$pengantar);
move_uploaded_file($source1,$folder.$fckk);
move_uploaded_file($source2,$folder.$passfoto);



$sql = "INSERT INTO buat_skck (nama, nik, nokk, tpt_lahir, tgl_lahir, jns_kelamin, pekerjaan, agama, alamat, keperluan, pengantar_rt, fc_kk,fc_ktp, pass_photo, input_by) values('$nama', '$nik', '$nokk', '$tptLahir', '$tglLahir', '$jnsKelamin', '$pekerjaan', '$agama', '$alamat', '$keperluan', '$pengantar','$fckk','$fcktp','$passfoto', '$nama_username')";
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
    $mail->Subject = 'Record Formulir Pembuatan SKCK';
    $mail->Body    = '<div class="row">
                        <h3>Berikut ini adalah hasil rekap data pengisian formulir anda pada website Portal Kecamatan Mandalajati. Harap menunggu konfirmasi dari tim kami untuk lengkah selanjutnya</h3>
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
                                <td>No KK </td>
                                <td>: '.$nokk.'</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>: '.$tptLahir.'</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir </td>
                                <td>: '.$tglLahir.'</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>: '.$jnsKelamin.'</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan </td>
                                <td>: '.$pekerjaan.'</td>
                            </tr>
                            <tr>
                                <td>Agama </td>
                                <td>: '.$agama.'</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>: '.$alamat.'</td>
                            </tr>
                            <tr>
                                <td>Keperluan </td>
                                <td>: '.$keperluan.'</td>
                            </tr>
                        </table>
                     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location:index.php?page=BuatSKCK");

?>