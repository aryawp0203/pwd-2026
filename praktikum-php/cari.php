<?php
// Latihan 3A - Mengambil data dengan metode GET
$kata_kunci = $_GET['q'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Mahasiswa (GET)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        input[type="text"] { width: 260px; padding: 6px; }
        button { padding: 6px 16px; }
    </style>
</head>
<body>
    <h1>Pencarian Mahasiswa</h1>

    <form action="cari.php" method="get">
        <label for="q">Kata kunci:</label>
        <input type="text" id="q" name="q" placeholder="Ketik nama atau NIM">
        <button type="submit">Cari</button>
    </form>

    <?php if ($kata_kunci !== '') { ?>
        <p>Anda mencari: <strong><?php echo htmlspecialchars($kata_kunci); ?></strong></p>
    <?php } else { ?>
        <p>Silakan ketik kata kunci, lalu klik tombol Cari.</p>
    <?php } ?>
</body>
</html>
