<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        label.pilihan { display: inline; font-weight: normal; margin-right: 16px; }
        input[type="text"], select, textarea { width: 320px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
    </style>
</head>
<body>
    <h1>Form Biodata Mahasiswa</h1>

    <form action="proses.php" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama">

        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim">

        <label for="prodi">Program Studi</label>
        <select id="prodi" name="prodi">
            <option value="">-- Pilih Program Studi --</option>
            <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
            <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
            <option value="D3 Teknik Elektro">D3 Teknik Elektro</option>
        </select>

        <label>Jenis Kelamin</label>
        <label class="pilihan">
            <input type="radio" name="jk" value="Laki-laki"> Laki-laki
        </label>
        <label class="pilihan">
            <input type="radio" name="jk" value="Perempuan"> Perempuan
        </label>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" rows="4"></textarea>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
