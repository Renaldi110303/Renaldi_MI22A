<?php
include 'db.php';

if (isset($_POST['tambah'])) {
    $nama_toko = $_POST['Nama_toko'];
    $alamat = $_POST['Alamat'];
    $pemilik = $_POST['Pemilik'];
    $no_telpon = $_POST['No_Telpon'];
    $jenis_layanan = $_POST['Jenis_Layanan'];
    $harga_galon = $_POST['Harga_Galon'];
    $jumlah_barang = $_POST['Jumlah_Barang'];

    // Tanggal diisi otomatis dengan CURRENT_DATE
    $query = "
        INSERT INTO tbl_pelangan (Nama_toko, Alamat, Pemilik, No_Telpon, Jenis_Layanan, Harga_Galon, Jumlah_Barang, Tanggal)
        VALUES ('$nama_toko', '$alamat', '$pemilik', '$no_telpon', '$jenis_layanan', '$harga_galon', '$jumlah_barang', CURRENT_DATE())
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan data.');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container border">
        <h1>Tambah Data</h1>
        <form method="POST">
            <label>Nama Toko:</label><br>
            <input type="text" name="Nama_toko" required><br>
            <label>Alamat:</label><br>
            <input type="text" name="Alamat" required><br>
            <label>Pemilik:</label><br>
            <input type="text" name="Pemilik" required><br>
            <label>No Telepon:</label><br>
            <input type="text" name="No_Telpon" required><br>
            <label>Jenis Layanan:</label><br>
            <input type="text" name="Jenis_Layanan" required><br>
            <label>Harga Galon:</label><br>
            <input type="number" name="Harga_Galon" required><br>
            <label>Jumlah Barang:</label><br>
            <input type="number" name="Jumlah_Barang" required><br><br>
        </form>
        <a href="dashboard.php" class="btn btn-primary">Kembali</a>
        <button type="submit" name="tambah">Tambah</button>
    </div>
</body>
</html>
