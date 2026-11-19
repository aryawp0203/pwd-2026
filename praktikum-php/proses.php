<?php
// Latihan 3B - Mengambil data dengan metode POST
$nama   = $_POST['nama'] ?? '';
$nim    = $_POST['nim'] ?? '';
$prodi  = $_POST['prodi'] ?? '';
$jk     = $_POST['jk'] ?? '';
$alamat = $_POST['alamat'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa (POST)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        table { border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 8px 14px; text-align: left; }
        th { background: #e9eef8; }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <table>
        <tr><th>Nama Lengkap</th><td><?php echo $nama; ?></td></tr>
        <tr><th>NIM</th><td><?php echo $nim; ?></td></tr>
        <tr><th>Program Studi</th><td><?php echo $prodi; ?></td></tr>
        <tr><th>Jenis Kelamin</th><td><?php echo $jk; ?></td></tr>
        <tr><th>Alamat</th><td><?php echo $alamat; ?></td></tr>
    </table>

    <p><a href="form.php">Kembali ke form</a></p>
</body>
</html>
