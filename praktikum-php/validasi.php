<?php
// Latihan 4 - Validasi input di sisi server
$nama = $nim = $prodi = $jk = $alamat = "";
$err_nama = $err_nim = $err_prodi = $err_jk = $err_alamat = "";
$valid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. Ambil data dan bersihkan spasi di awal/akhir
    $nama   = isset($_POST["nama"])   ? trim($_POST["nama"])   : "";
    $nim    = isset($_POST["nim"])    ? trim($_POST["nim"])    : "";
    $prodi  = isset($_POST["prodi"])  ? trim($_POST["prodi"])  : "";
    $jk     = isset($_POST["jk"])     ? trim($_POST["jk"])     : "";
    $alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";

    // 2. Periksa setiap input
    if (empty($nama)) {
        $err_nama = "Nama lengkap tidak boleh kosong.";
    }

    if (empty($nim)) {
        $err_nim = "NIM tidak boleh kosong.";
    } elseif (!ctype_digit($nim)) {
        $err_nim = "NIM hanya boleh berisi angka.";
    }

    if (empty($prodi)) {
        $err_prodi = "Program studi wajib dipilih.";
    }

    if (empty($jk)) {
        $err_jk = "Jenis kelamin wajib dipilih.";
    }

    if (empty($alamat)) {
        $err_alamat = "Alamat tidak boleh kosong.";
    }

    // 3. Data valid jika tidak ada satu pun pesan kesalahan
    if (empty($err_nama) && empty($err_nim) && empty($err_prodi)
        && empty($err_jk) && empty($err_alamat)) {
        $valid = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Form Biodata</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        label.pilihan { display: inline; font-weight: normal; margin-right: 16px; }
        input[type="text"], select, textarea { width: 320px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
        .error { display: block; color: #c0392b; font-size: 14px; }
        .sukses { background: #e6f4ea; border-left: 5px solid #2e7d32; padding: 10px; }
        table { border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #999; padding: 8px 14px; text-align: left; }
        th { background: #e9eef8; }
    </style>
</head>
<body>
    <h1>Form Biodata Mahasiswa</h1>

    <?php if ($valid) { ?>
        <p class="sukses">Data berhasil divalidasi.</p>
        <table>
            <tr><th>Nama Lengkap</th><td><?php echo htmlspecialchars($nama); ?></td></tr>
            <tr><th>NIM</th><td><?php echo htmlspecialchars($nim); ?></td></tr>
            <tr><th>Program Studi</th><td><?php echo htmlspecialchars($prodi); ?></td></tr>
            <tr><th>Jenis Kelamin</th><td><?php echo htmlspecialchars($jk); ?></td></tr>
            <tr><th>Alamat</th><td><?php echo htmlspecialchars($alamat); ?></td></tr>
        </table>
        <p><a href="validasi.php">Isi form lagi</a></p>

    <?php } else { ?>
        <form action="validasi.php" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                value="<?php echo htmlspecialchars($nama); ?>">
            <span class="error"><?php echo $err_nama; ?></span>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim"
                value="<?php echo htmlspecialchars($nim); ?>">
            <span class="error"><?php echo $err_nim; ?></span>

            <label for="prodi">Program Studi</label>
            <select id="prodi" name="prodi">
                <option value="">-- Pilih Program Studi --</option>
                <option value="D3 Teknik Informatika"
                    <?php if ($prodi === "D3 Teknik Informatika") { echo "selected"; } ?>
                >D3 Teknik Informatika</option>
                <option value="D3 Teknik Mesin"
                    <?php if ($prodi === "D3 Teknik Mesin") { echo "selected"; } ?>
                >D3 Teknik Mesin</option>
                <option value="D3 Teknik Elektro"
                    <?php if ($prodi === "D3 Teknik Elektro") { echo "selected"; } ?>
                >D3 Teknik Elektro</option>
            </select>
            <span class="error"><?php echo $err_prodi; ?></span>

            <label>Jenis Kelamin</label>
            <label class="pilihan">
                <input type="radio" name="jk" value="Laki-laki"
                    <?php if ($jk === "Laki-laki") { echo "checked"; } ?>> Laki-laki
            </label>
            <label class="pilihan">
                <input type="radio" name="jk" value="Perempuan"
                    <?php if ($jk === "Perempuan") { echo "checked"; } ?>> Perempuan
            </label>
            <span class="error"><?php echo $err_jk; ?></span>

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4"
            ><?php echo htmlspecialchars($alamat); ?></textarea>
            <span class="error"><?php echo $err_alamat; ?></span>

            <button type="submit">Kirim</button>
        </form>
    <?php } ?>
</body>
</html>
