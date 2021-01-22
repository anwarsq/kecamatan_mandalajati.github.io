<?php
ob_start();

include("koneksi.php");


$id_data = $_POST['id_data'];
$id_data2 = $_POST['id_data2'];
// $status= 'Diterima';



$sql = "DELETE buat_kk, anggota_keluarga FROM buat_kk INNER JOIN anggota_keluarga ON buat_kk.id_data = anggota_keluarga.id_data WHERE buat_kk.id_data='$id_data2'";
$result = $connection->query($sql);
$result;


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// $result2;


header("location:index.php?page=dataBuatKK");

?>