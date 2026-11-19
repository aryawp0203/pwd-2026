<?php
// Latihan 1 - Program PHP pertama
$nama  = "Andi Saputra";
$nim   = "240101001";
$prodi = "D3 Teknik Informatika";
$nilai = 80;

if ($nilai >= 60) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 1 - PHP Pertama</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        td { padding: 4px 16px 4px 0; }
    </style>
</head>
<body>
    <h1>Program PHP Pertama</h1>
    <?php echo "<p>Selamat belajar PHP di Politeknik Negeri Cilacap!</p>"; ?>

    <table>
        <tr><td>Nama</td><td>: <?php echo $nama; ?></td></tr>
        <tr><td>NIM</td><td>: <?php echo $nim; ?></td></tr>
        <tr><td>Program Studi</td><td>: <?php echo $prodi; ?></td></tr>
        <tr><td>Nilai</td><td>: <?php echo $nilai; ?></td></tr>
        <tr><td>Status</td><td>: <?php echo $status; ?></td></tr>
    </table>
</body>
</html>
