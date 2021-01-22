<?php
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "locadata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id_keluhan = $_POST['id_keluhan'];

// $id = $_POST['id_karyawan2'];
// $nama = 'sss';
// $username = 'sss';
// $password = 'sss';
// $level = 'admin';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE keluhan_saran SET status='dibaca' WHERE id_keluhan = '$id_keluhan'";



$result = $conn->query($sql);



$result;
// $result2;

?>