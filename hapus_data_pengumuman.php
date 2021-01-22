<?php
ob_start();

include("config.php");


$id_data = $_POST['id_data'];
// $status= 'Diterima';



$sql = "DELETE FROM pengumuman WHERE id_pengumuman='$id_data'";
$result = $conn->query($sql);
$result;


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// $result2;


header("location:index.php?page=");

?>