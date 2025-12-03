<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crud_app";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// pengecekan
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
