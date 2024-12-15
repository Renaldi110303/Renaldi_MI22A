<?php

 include 'db.php';

// Query untuk mendapatkan semua data
$query = "
    SELECT id, Nama_toko, Alamat, Pemilik, No_telpon, Jenis_Layanan, Harga_Galon, Jumlah_Barang, Tanggal 
    FROM tbl_pelangan
";

$results = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Dashboard Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Pemilik</th>
                <th>No Telepon</th>
                <th>Jenis Layanan</th>
                <th>Harga Galon</th>
                <th>Jumlah Barang</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['Nama_toko']) ?></td>
                    <td><?= htmlspecialchars($row['Alamat']) ?></td>
                    <td><?= htmlspecialchars($row['Pemilik']) ?></td>
                    <td><?= htmlspecialchars($row['No_telpon']) ?></td>
                    <td><?= htmlspecialchars($row['Jenis_Layanan']) ?></td>
                    <td><?= htmlspecialchars($row['Harga_Galon']) ?></td>
                    <td><?= htmlspecialchars($row['Jumlah_Barang']) ?></td>
                    <td><?= htmlspecialchars($row['Tanggal']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Tidak ada data ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
