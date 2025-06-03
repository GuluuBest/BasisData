<?php include 'db.php'; ?>
<h2>Data Supplier</h2>
<table border="1" cellpadding="10">
    <tr><th>No</th><th>Nama Supplier</th><th>No Kontak</th></tr>
    <?php 
    $data = mysqli_query($conn, "SELECT * FROM supplier");
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr><td>$no</td><td>{$row['nama_supplier']}</td><td>{$row['kontak']}</td></tr>";
        $no++;
    }
    ?>
</table>
