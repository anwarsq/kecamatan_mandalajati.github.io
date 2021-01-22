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
$pekerjaan= $_POST['pekerjaan'];
$alamat= $_POST['alamat'];
$nama_saksi = $_POST['nama_saksi'];
$nama_username=$_POST['nama_username'];
$email=$_POST['email'];
$id_data="IDKTP".rand(pow(10, $digits-1), pow(10, $digits)-1);



// $fckk= $_FILES['fckk']['name'];
if(empty($_FILES['fckk']['tmp_name'])){
    $kk_ahli="";
}else{
    $kk_ahli="KKA".rand(pow(10, $digits-1), pow(10, $digits)-1);

}
$source1 = $_FILES['fckk']['tmp_name'];

// $passfoto= $_FILES['passfoto']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['ktp_ahli']['name'])){
    $ktp_ahli="";
}else{
    $ktp_ahli="KTPA".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source2 = $_FILES['ktp_ahli']['tmp_name'];

// $pengantar = $_FILES['pengantar']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['surat_kematian']['name'])){
    $surat_kematian="";
}else{
    $surat_kematian = "SUK".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source3 = $_FILES['surat_kematian']['tmp_name'];

if(empty($_FILES['ktp_saksi']['name'])){
    $ktp_saksi="";
}else{
    $ktp_saksi="KTPS".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source4 = $_FILES['ktp_saksi']['tmp_name'];

$folder = './images/';
move_uploaded_file($source1,$folder.$kk_ahli);
move_uploaded_file($source2,$folder.$ktp_ahli);
move_uploaded_file($source3,$folder.$surat_kematian);
move_uploaded_file($source4,$folder.$ktp_saksi);


$sql = "INSERT INTO buat_saw (nama, nik, pekerjaan, alamat_ahli_waris, nama_saksi, ktp_ahli_waris, kk_ahli_waris, surat_kematian, ktp_saksi, input_by, id_data) values('$nama', '$nik','$pekerjaan','$alamat', '$nama_saksi', '$ktp_ahli', '$kk_ahli', '$surat_kematian', '$ktp_saksi', '$nama_username', '$id_data')";
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
    $mail->Subject = 'Record Formulir Pembuatan Surat Ahli Waris';
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
                                <td>Alamat </td>
                                <td>: '.$alamat.'</td>
                            </tr>
                        </table>
                     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location:index.php?page=BuatSAW");

?>