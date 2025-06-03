<?php 
include 'db.php';

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete = mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $delete_id");
    if ($delete) {
        echo "<script>alert('Barang berhasil dihapus'); window.location='';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($conn, "INSERT INTO barang (nama_barang, stok, id_kategori, harga) 
                                  VALUES ('$nama_barang', $stok, $id_kategori, $harga)");
    if ($insert) {
        echo "<script>alert('Barang berhasil ditambahkan'); window.location='';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Tambah Barang</h2>
<form method="POST" action="">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" required><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" min="0" required><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" min="0" required><br>

    <label>Kategori:</label><br>
    <select name="id_kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM kategori_barang");
        while ($k = mysqli_fetch_assoc($kategori)) {
            echo "<option value='{$k['id_kategori']}'>{$k['nama_kategori']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="submit">Tambah Barang</button>
</form>

<h2>Data Barang</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = mysqli_query($conn, "SELECT barang.*, kategori_barang.nama_kategori 
                                 FROM barang 
                                 JOIN kategori_barang ON barang.id_kategori = kategori_barang.id_kategori");
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['nama_barang']}</td>
                <td>{$row['stok']}</td>
                <td>{$row['nama_kategori']}</td>
                <td>{$row['harga']}</td>
                <td>
                  <a href='?delete_id={$row['id_barang']}' onclick='return confirm(\"Yakin mau lo mau hapus bre?\")'>Hapus</a>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>
