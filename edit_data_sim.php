<?php
ob_start();

include("config.php"); 

$id_data = $_POST['id_data'];
$id_data2 = $_POST['id_data2'];

$nama= $_POST['nama'];
// $email=$_POST['email'];
$nik=$_POST['nik'];
$pekerjaan=$_POST['pekerjaan'];
$alamat=$_POST['alamat'];
$input_by=$_POST['input_by'];

// $status= 'Diterima';

$sql1 = "SELECT email FROM user WHERE username='$input_by'";
$result1 = $conn->query($sql1);
$result1;
foreach($result1 as $a=>$b){
 $email = $b['email'];
}

$sql = "UPDATE buat_sim SET nama='$nama', nik='$nik', pekerjaan='$pekerjaan', alamat='$alamat' WHERE id=$id_data";
$result = $conn->query($sql);
$result;


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

// $result2;
// EMAIL
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
//     $status_kependudukan = $_POST['status_penduduk'];
// $asalKec= $_POST['asalKec'];
// $alasan= $_POST['alasan'];
// $alamat= $_POST['alamat'];
// $kelurahan= $_POST['kelurahan'];
// $nama_username = $_POST['nama_username'];
// $email=$_POST['email'];

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Update Status Pengajuan Surat Izin Menetap';
        $mail->Body    = '<div class="row">
        <h3>Selamat, pengajuan anda dengan id '.$id_data2.' berhasil diubah!</h3>
        <p>Mohon untuk menunggu informasi dari kami untuk langkah selanjutnya.</p>
        <p>Terimakasih,</p>
     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



header("location:index.php?page=BuatSIM");

?>