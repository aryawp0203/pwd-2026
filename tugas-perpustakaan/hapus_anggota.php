<?php
require_once __DIR__ . '/koneksi.php';

// Ambil data anggota berdasarkan ID yang dikirim melalui metode POST
$id = $_POST['id'];

// debugging: tampilkan ID yang diterima
// die("Debugging: ID yang diterima adalah $id");

// Buat query untuk menghapus data anggota berdasarkan ID
$query = "DELETE FROM anggota WHERE id = ?";
// Menyiapkan prepared statement
$stmt = mysqli_prepare($koneksi, $query);
// Bind parameter
mysqli_stmt_bind_param($stmt, 'i', $id);

// Eksekusi statement
if (mysqli_stmt_execute($stmt)) {
    // Tutup statement
    mysqli_stmt_close($stmt);
    // Jika berhasil, redirect ke halaman data_anggota.php
    header("Location: data_anggota.php");
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    die("Gagal menghapus data anggota: " . mysqli_stmt_error($stmt));
}
