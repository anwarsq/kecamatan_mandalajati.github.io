<?php
global $conn;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mandalajati";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";

$result = $conn->query($sql);
?>