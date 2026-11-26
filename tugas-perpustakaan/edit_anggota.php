<?php
require_once __DIR__ . '/koneksi.php';

// Ambil ID anggota dari parameter GET
$id = $_GET['id'];

// Buat query untuk mengambil data anggota berdasarkan ID
$query = "SELECT * FROM anggota WHERE id = ?";
// Menyiapkan prepared statement
$stmt = mysqli_prepare($koneksi, $query);
// Bind parameter
mysqli_stmt_bind_param($stmt, 'i', $id);
// Eksekusi statement
mysqli_stmt_execute($stmt);
// Ambil hasil query
$hasil = mysqli_stmt_get_result($stmt);

// Memeriksa apakah data anggota ditemukan
if (mysqli_num_rows($hasil) === 0) {
    die("Data anggota tidak ditemukan.");
}

if ($hasil) {
    $data = mysqli_fetch_assoc($hasil);
    // Debugging: tampilkan data anggota yang diambil
    // var_dump($data);
} else {
    die("Gagal mengambil data anggota: " . mysqli_stmt_error($stmt));
}

// Tutup statement
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
</head>

<body>

    <h2>Edit Data Anggota</h2>

    <form action="proses_update.php" method="post">

        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>">

        <label for="no_anggota">Nomor Anggota:</label><br>
        <input type="text" id="no_anggota" name="no_anggota" value="<?= htmlspecialchars($data['no_anggota']); ?>" required><br><br>

        <label for="nama_lengkap">Nama Lengkap:</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required><br><br>

        <label for="no_hp">Nomor HP:</label><br>
        <input type="text" id="no_hp" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>" required><br><br>

        <label for="jenis_anggota">Jenis Anggota:</label><br>
        <select id="jenis_anggota" name="jenis_anggota">
            <option value="">Pilih Jenis Anggota</option>
            <option value="Mahasiswa" <?= $data['jenis_anggota'] === 'Mahasiswa' ? 'selected' : ''; ?>>Mahasiswa</option>
            <option value="Dosen" <?= $data['jenis_anggota'] === 'Dosen' ? 'selected' : ''; ?>>Dosen</option>
            <option value="Tenaga Kependidikan" <?= $data['jenis_anggota'] === 'Tenaga Kependidikan' ? 'selected' : ''; ?>>Tenaga Kependidikan</option>
        </select><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['alamat']); ?></textarea><br><br>

        <button type="submit" name="update">Update Data</button>
        |
        <a href="data_anggota.php">Kembali ke Data Anggota</a>

    </form>
</body>

</html>