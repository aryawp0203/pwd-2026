<?php
require_once __DIR__ . '/koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id ASC");
if (!$hasil) {
    die("Gagal mengambil data anggota: " . htmlspecialchars(mysqli_error($koneksi), ENT_QUOTES, 'UTF-8'));
}
$jml_data = mysqli_num_rows($hasil);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Anggota Perpustakaan</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            color: #1f3864;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #eaf0f8;
        }
    </style> -->
</head>

<body>
    <h1>Data Anggota Perpustakaan</h1>
    <p>Jumlah data anggota: <?= $jml_data; ?> data</p>
    <p><a href="form_anggota.php">Tambah anggota</a></p>

    <?php if ($jml_data > 0) { ?>
        <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Jenis Anggota</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($hasil)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['no_anggota']); ?></td>
                        <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
                        <td><?= htmlspecialchars($data['email']); ?></td>
                        <td><?= htmlspecialchars($data['no_hp']); ?></td>
                        <td><?= htmlspecialchars($data['jenis_anggota']); ?></td>
                        <td><?= htmlspecialchars($data['alamat']); ?></td>
                        <td>
                            <!-- tombol detail -->
                            <!-- <a href="detail.php?id=<?= $data['id']; ?>">Detail</a> | -->
                            <!-- tombol edit -->
                            <a href="edit_anggota.php?id=<?= $data['id']; ?>">Edit</a> |
                            <!-- tombol hapus -->
                            <form action="hapus_anggota.php" method="post" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <button type="submit">Hapus</button>
                            </form>
                            <!-- <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a> -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Belum ada data anggota.</p>
    <?php } ?>
</body>

</html>
<?php mysqli_free_result($hasil); ?>