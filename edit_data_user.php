<?php
ob_start();

include("config.php"); 

$id_data = $_POST['id_data'];

$nama= $_POST['nama'];
// $email=$_POST['email'];
$nik=$_POST['nik'];
$email=$_POST['email'];
$level=$_POST['level'];



$sql = "UPDATE user SET nama='$nama', nik='$nik', email='$email', level='$level' WHERE id_user=$id_data";
$result = $conn->query($sql);
$result;


if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
header("location:index.php?page=userPage");

?>