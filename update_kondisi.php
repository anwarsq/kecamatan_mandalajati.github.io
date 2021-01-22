<?php
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "locadata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// $nikp = $_SESSION['akun_nik'];
$nikt=$_POST['nikt'];
// $no_kk = $_SESSION['akun_nokk'];
$tanggal=date("Y-m-d h:i:s");
// $namap=$_SESSION['akun_nama'];
$namat=$_POST['namat'];
// $namat='tes';

$status=$_POST['status'];
$keterangan=$_POST['keterangan'];

$nikp = $_POST['nikp'];
$no_kk=$_POST['nokk'];
$namap = $_POST['namap'];

// $nikp = 'TESTEETSET';
// $nikp= $_SESSION['akun_nik'];
// $no_kk = 'dasd';
// $tanggal=date("Y-m-d h:i:s");
// $namap='dasdasd';
// $namat='asdasd';
// $status='sakit';
// $keterangan='asdadasd';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql2 = "SELECT * FROM laporan WHERE nik_terlapor='$nikt'";
$result2 = $conn->query($sql2);
$result2;

if (mysqli_num_rows($result2)==0){
    $sql = "INSERT INTO laporan(nama_pelapor, tanggal_laporan, nik_pelapor, nik_terlapor, nama_terlapor, no_kk, status, keterangan) VALUES('$namap','$tanggal', '$nikp', '$nikt', '$namat', '$no_kk', '$status', '$keterangan')";
    $result = $conn->query($sql);
    $result;
}else{
    $sql3 = "UPDATE laporan SET status='$status', keterangan='$keterangan', tanggal_laporan='$tanggal' WHERE nik_terlapor='$nikt'";
    $result3 = $conn->query($sql3);
    $result3;
}
?>