<?php
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "locadata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$nik = $_POST['nik'];
$no_kk = $_POST['no_kk'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tanggal = new DateTime($_POST['tanggal_lahir']);
// $tanggal = explode('/', $_POST['tanggal_lahir']);
// $tanggal_lahir = strtotime($_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal']);

$tempat_lahir = $_POST['tempat_lahir'];
$pekerjaan = $_POST['pekerjaan'];
$pendidikan = $_POST['pendidikan'];
$agama = $_POST['agama'];
$status_kawin = $_POST['status_kawin'];
$jenis_kelamin = $_POST['jenis_kelamin'];
// $today=new DateTime('today');
// $umur = $tanggal->diff($today)->y;
// $umur=12;

// $from = new DateTime('1970-02-01');
// $to   = new DateTime('today');
// echo $from->diff($to)->y;
// $id = $_POST['id_karyawan2'];
// $nama = 'sss';
// $username = 'sss';
// $password = 'sss';
// $level = 'umum';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO data_penduduk(nik, no_kk, nama, tgl_lahir, tempat_lahir, pekerjaan, pendidikan, agama, status_kawin, jenis_kelamin) VALUES('$nik', '$no_kk', '$nama', '$tanggal_lahir', '$tempat_lahir', '$pekerjaan', '$pendidikan','$agama', '$status_kawin', '$jenis_kelamin')";



$result = $conn->query($sql);



$result;
// $result2;

?>