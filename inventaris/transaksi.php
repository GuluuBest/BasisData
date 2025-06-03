<?php include 'db.php'; ?>
<h2>Data Transaksi</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>No Transaksi</th>
        <th>No Barang</th>
        <th>No Pelanggan</th>
        <th>Jumlah Order</th>
        <th>Tanggal</th>
    </tr>
    <?php 
    $data = mysqli_query($conn, "SELECT * FROM transaksi");
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['id_transaksi']}</td>
                <td>{$row['id_barang']}</td>
                <td>{$row['id_pelanggan']}</td>
                <td>{$row['jumlah']}</td>
                <td>{$row['tanggal']}</td>
              </tr>";
        $no++;
    }
    ?>
</table>
