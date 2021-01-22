<?php
ob_start();

include("config.php");



$status_kependudukan = $_POST['status_penduduk'];
$asalKec= $_POST['asalKec'];
$alasan= $_POST['alasan'];
$alamat= $_POST['alamat'];
$kelurahan= $_POST['kelurahan'];
$nama_username = $_POST['nama_username'];
$email=$_POST['email'];
// $nama=count($_POST['nama']);

$digit2=10;
$id_data="IDKK".rand(pow(10, $digit2-1), pow(10, $digit2)-1);

for($i = 0; $i < count($_POST['nama']); $i++)
{
    $nama = mysqli_real_escape_string($conn, $_POST['nama'][$i]);
    $nik = mysqli_real_escape_string($conn, $_POST['nik'][$i]);
    $jnsKelamin = mysqli_real_escape_string($conn, $_POST['jnsKelamin'][$i]);
    $tptLahir = mysqli_real_escape_string($conn, $_POST['tptLahir'][$i]);
    $tglLahir = mysqli_real_escape_string($conn, $_POST['tglLahir'][$i]);
    $agama = mysqli_real_escape_string($conn, $_POST['agama'][$i]);
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan'][$i]);
    $jnsPekerjaan = mysqli_real_escape_string($conn, $_POST['jnsPekerjaan'][$i]);
    $statusKawin = mysqli_real_escape_string($conn, $_POST['statusKawin'][$i]);
    $stsHubKeluarga = mysqli_real_escape_string($conn, $_POST['stsHubKeluarga'][$i]);
    $kewarganegaraan = mysqli_real_escape_string($conn, $_POST['kewarganegaraan'][$i]);
    $noPaspor = mysqli_real_escape_string($conn, $_POST['noPaspor'][$i]);
    $noKitap = mysqli_real_escape_string($conn, $_POST['noKitap'][$i]);
    $namaAyah = mysqli_real_escape_string($conn, $_POST['namaAyah'][$i]);
    $namaIbu = mysqli_real_escape_string($conn, $_POST['namaIbu'][$i]);

    $sql = "INSERT INTO anggota_keluarga(id_data,nama, input_by, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, jenis_pekerjaan, status_perkawinan, status_hub_keluarga, kewarganegaraan, no_passpor, no_kitap, nama_ayah, nama_ibu, pendidikan)
            VALUES('$id_data', '$nama', '$nama_username', '$nik', '$tptLahir', '$tglLahir', '$jnsKelamin', '$agama', '$jnsPekerjaan', '$statusKawin', '$stsHubKeluarga', '$kewarganegaraan','$noPaspor', '$noKitap', '$namaAyah', '$namaIbu', '$pendidikan')";
    // mysqli_query($conn, $sql);
    $result = $conn->query($sql);
$result;
}

$digits = 10;


// $fckk= $_FILES['fckk']['name'];
if(empty($_FILES['SIMB']['tmp_name'])){
    $simb="";
}else{
    $simb="SIMB".rand(pow(10, $digits-1), pow(10, $digits)-1);

}
$source1 = $_FILES['SIMB']['tmp_name'];

// $passfoto= $_FILES['passfoto']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['passfoto']['name'])){
    $passfoto="";
}else{
    $passfoto="PASSF".rand(pow(10, $digits-1), pow(10, $digits)-1);
}
$source2 = $_FILES['passfoto']['tmp_name'];

if(empty($_FILES['suratPindah']['name'])){
    $suratPindah="";
}else{
    $suratPindah="SURP".rand(pow(10, $digits-1), pow(10, $digits)-1);
}
$source2 = $_FILES['suratPindah']['tmp_name'];

// $pengantar = $_FILES['pengantar']['name']."KK".rand(pow(10, $digits-1), pow(10, $digits)-1);
if(empty($_FILES['suratHilang']['name'])){
    $suratHilang="";
}else{
    $suratHilang = "PENG".rand(pow(10, $digits-1), pow(10, $digits)-1);
}

$source = $_FILES['suratHilang']['tmp_name'];

$folder = './images/';
move_uploaded_file($source,$folder.$simb);
move_uploaded_file($source1,$folder.$suratPindah);
move_uploaded_file($source2,$folder.$suratHilang);
move_uploaded_file($source2,$folder.$passfoto);


$sql = "INSERT INTO buat_kk (id_data, status_kependudukan, asal_kecamatan, alasan, kelurahan, input_by, status, surat_pindah, surat_izin_menetap, surat_kehilangan, pass_photo) values('$id_data', '$status_kependudukan', '$asalKec', '$alasan','$kelurahan', '$nama_username', 'Baru', '$suratPindah', '$simb', '$suratHilang', '$passfoto')";
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
    $status_kependudukan = $_POST['status_penduduk'];
$asalKec= $_POST['asalKec'];
$alasan= $_POST['alasan'];
$alamat= $_POST['alamat'];
$kelurahan= $_POST['kelurahan'];
$nama_username = $_POST['nama_username'];
$email=$_POST['email'];

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Record Formulir Pembuatan KK';
    $mail->Body    = '<div class="row">
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
                     </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


header("location:index.php?page=BuatKK");

?>