<?php
require_once __DIR__ . '/koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$no_anggota = $_POST['no_anggota'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jenis_anggota = $_POST['jenis_anggota'];
$alamat = $_POST['alamat'];

// cek apakah jenis anggota valid
if (!in_array($jenis_anggota, ['Mahasiswa', 'Dosen', 'Tenaga Kependidikan'])) {
    die("Jenis anggota tidak valid.");
}

// Buat query untuk update data berdasarkan ID
$query = "UPDATE anggota SET
            no_anggota = ?,
            nama_lengkap = ?,
            email = ?,
            no_hp = ?,
            jenis_anggota = ?,
            alamat = ?
          WHERE id = ?";

// Menyiapkan prepared statement
$stmt = mysqli_prepare($koneksi, $query);

// Bind parameter
mysqli_stmt_bind_param(
    $stmt,
    'ssssssi',
    $no_anggota,
    $nama_lengkap,
    $email,
    $no_hp,
    $jenis_anggota,
    $alamat,
    $id
);

// Eksekusi statement
if (mysqli_stmt_execute($stmt)) {
    // Tutup statement
    mysqli_stmt_close($stmt);
    // Jika berhasil, redirect ke halaman data_anggota.php
    header("Location: data_anggota.php?status=update");
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    die("Gagal memperbarui data anggota: " . mysqli_stmt_error($stmt));
}