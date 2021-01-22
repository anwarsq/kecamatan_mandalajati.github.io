<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<?php
ob_start();

include("config.php");


$nama = $_POST['nama'];
$username = $_POST['username'];
$password = hash('sha256',md5($_POST['password']));
$email = $_POST['email'];
$level = $_POST['level'];
$nik = $_POST['nik'];
$foto = $_FILES['foto']['name'];
$source = $_FILES['foto']['tmp_name'];
$folder = './images/';
$token=hash('sha256', md5(date('Y-m-d'))) ;
// $nama='apaya';
move_uploaded_file($source,$folder.$foto);

// $nama = 'Aah Badriah';
// $username = 'aah';
// $password = '1234';
// $level = 'umum';
// $nik = '3202282311700962';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $sql2 = "SELECT no_kk FROM data_penduduk WHERE nik='$nik'";
// $result2 = $conn->query($sql2);
// $result2;

// foreach($result2 as $row=>$value){
//     $nokk=$value['no_kk'];
// }


$user= mysqli_real_escape_string($conn, $_POST['username']);
$nama2= mysqli_real_escape_string($conn, $_POST['nama']);
$nik2= mysqli_real_escape_string($conn, $_POST['nik']);
$check = mysqli_query($conn, "SELECT username from user WHERE username = '$user' AND aktif='1'");
// $check2 = mysqli_query($conn, "SELECT nik from user WHERE nik='$nik2'");
// $check3 = mysqli_query($conn, "SELECT nik from data_penduduk WHERE nik='$nik2'");
$check_num = mysqli_num_rows($check);
// $check_num2 = mysqli_num_rows($check2);
// $check_num3 = mysqli_num_rows($check3);
if($check_num == 0){
        $sql = "INSERT INTO user(nama, username, password, level, foto,nik, email, token) VALUES('$nama', '$username', '$password', '$level', '$foto', '$nik', '$email', '$token')";
        $result = $conn->query($sql);
        $result;
}else{
    echo "<script>alert('gagal');</script>";
}


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
    $mail->addAddress($email, $nama);     // Add a recipient
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
    $mail->Subject = 'Pembuatan Akun Portal Kecamatan Mandalajati';
        $mail->Body    = '<div class="row">
                            <p>Selamat, akun anda dengan username <b>'.$username.'</b> berhasil dibuat!</p>
                            <br>
                            <p>Username : <span>'.$username.'</span></p>
                            <p>Password : <span>*********</span></p>
                            <p>Nama : <span>'.$nama.'</span></p>
                            <p>Email : <span>'.$email.'</span></p>
                            <br>
                            <p>Konfirmasi email anda pada link berikut agar akun anda dapat digunakan:</p>
                            <a href="http://localhost/portal_kecamatan_mandalajati/activation.php?t='.$token.'">http://localhost/portal_kecamatan_mandalajati/activation.php?t='.$token.'</a>
                        </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $mail->send();
    echo '
            <div class="alert alert-success" style="text-align:center;">
                Akun anda berhasil dibuat, silakan cek email anda untuk <a href="https://mail.google.com" target="_blank">aktivasi!</a>
            </div>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
// $result2;
// header("location:login.php");

?>