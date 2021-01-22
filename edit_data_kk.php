<?php
ob_start();

include("config.php"); 

$id_data = $_POST['id_data'];
$nama= $_POST['nama'];
$email=$_POST['email'];
$nik=$_POST['nik'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$agama=$_POST['agama'];
$status_kawin=$_POST['status_kawin'];
// $status= 'Diterima';



$sql = "UPDATE anggota_keluarga SET nama='$nama', nik='$nik', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir', jenis_pekerjaan='$pekerjaan', agama='$agama', status_perkawinan='$status_kawin' WHERE id=$id_data";
$result = $conn->query($sql);
$result;


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

// $result2;
// EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if($status !="Diproses"){

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
    $mail->Subject = 'Update Status Pengajuan KK';
    if($status == "Diterima"){
        $mail->Body    = '<div class="row">
        <h3>Selamat, pengajuan anda dengan id '.$id_data.' berhasil diubah!</h3>
        <div class="row">
                        <h3>Berikut ini adalah hasil rekap data pengisian formulir anda dengan <b>id : '.$id_data.'</b> pada website Portal Kecamatan Mandalajati. Harap menunggu konfirmasi dari tim kami untuk lengkah selanjutnya</h3>
                        <p>Terimakasih,</p>
                        <table>
                            <tr>
                                <td>Status Kependudukan </td>
                                <td>: '.$status_kependudukan.'</td>
                            </tr>
                            <tr>
                                <td>Asal Kecamatan </td>
                                <td>: '.$asalKec.'</td>
                            </tr>
                            <tr>
                                <td>Aalasan Buat KK </td>
                                <td>: '.$alasan.'</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>: '.$alamat.'</td>
                            </tr>
                            <tr>
                                <td>Kelurahan </td>
                                <td>: '.$kelurahan.'</td>
                            </tr>
                        </table>
                     </div>
        <p>Terimakasih,</p>
     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }else if($status == "Ditolak"){
        $mail->Body    = '<div class="row">
        <h3>Mohon maaf pengajuan pembuatan KK anda belum dapat diterima terkait beberapa persyaratan yang tidak terpenuhi!</h3>
        <p>Keterangan menurut petugas adalah : '.$keterangan.'</p>
        <p>Mohon untuk segera menghubungi pihak kecamatan untuk mendapatkan keterangan lebih lanjut!</p>
        <p>Terimakasih,</p>
     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}


header("location:index.php?page=BuatKTP");

?>