<?php include 'db.php'; ?>
<h2>Data Kategori</h2>
<table border="1" cellpadding="10">
    <tr><th>No</th><th>Nama Kategori</th></tr>
    <?php
    $data = mysqli_query($conn, "SELECT * FROM kategori_barang");
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr><td>$no</td><td>{$row['nama_kategori']}</td></tr>";
        $no++;
    }
    ?>
</table>