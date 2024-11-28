<?php
include '../koneksi.php';
include '../navbar.php';

$transaksi = mysqli_query($conn, "SELECT transaksi.*, pelanggan.id AS pelanggan_id 
        FROM transaksi 
        LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id");

$transaksi_detail = mysqli_query($conn, "SELECT transaksi_detail.*, barang.nama_barang
       FROM transaksi_detail 
       LEFT JOIN barang ON transaksi_detail.barang_id = barang.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="text-center mb-4">Tabel Transaksi</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr><th>ID</th><th>Waktu</th><th>Keterangan</th><th>Total</th><th>Nama Pelanggan</th></tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($transaksi)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['waktu_transaksi'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $row['total'] ?></td>
                        <td><?= $row['pelanggan_id'] ?? '-' ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
    </div>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Tabel Transaksi Detail</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr><th>ID Transaksi</th><th>Nama Barang</th><th>Harga</th><th>Qty</th></tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($transaksi_detail)) { ?>
                    <tr>
                        <td><?= $row['transaksi_id'] ?></td>
                        <td><?= $row['nama_barang'] ?? '-' ?></td>
                        <td><?= $row['harga'] ?></td>
                        <td><?= $row['qty'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
        <br>
        <a href="tambah_transaksi.php" class="btn btn-success btn-sm">Tambah Transaksi</a>
        <a href="tambah_transaksi_detail.php" class="btn btn-success btn-sm">Tambah Transaksi Detail</a>
    </div>
</body>
</html>