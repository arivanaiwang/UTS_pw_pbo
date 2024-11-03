<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "marine_explorer";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
