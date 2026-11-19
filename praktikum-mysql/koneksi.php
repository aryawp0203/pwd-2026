<?php
// koneksi.php - Menghubungkan PHP dengan MySQL

// Menonaktifkan exception bawaan MySQLi
mysqli_report(MYSQLI_REPORT_OFF);

// Parameter koneksi database
$host     = "localhost";
$username = "root";
$password = "";
$database = "pwd26_db_pendaftaran";

// Membuat koneksi
$koneksi = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " .
        htmlspecialchars(mysqli_connect_error()));
}

// Mengatur karakter
mysqli_set_charset($koneksi, "utf8mb4");
