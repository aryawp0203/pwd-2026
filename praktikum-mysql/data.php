<?php
require_once 'koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$jml_data = mysqli_num_rows($hasil);
?>
<p>Jumlah data mahasiswa: <?php echo $jml_data; ?> data</p>

<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($baris = mysqli_fetch_assoc($hasil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris['nim']); ?></td>
            <td><?php echo htmlspecialchars($baris['nama']); ?></td>
            <td><?php echo htmlspecialchars($baris['prodi']); ?></td>
            <td>
                <a href="detail.php?id=<?php echo (int) $baris['id']; ?>">Detail</a>
                <form class="inline" action="hapus.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $baris['id']; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<?php mysqli_free_result($hasil); ?>