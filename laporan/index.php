<?php 
include '../koneksi.php';
include_once '../navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table th {
            background-color: #198754;
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .btn-info {
            color: white;
            background-color: #17a2b8;
        }
        .btn-danger {
            color: white;
        }
        .header-button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .page-title {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h4 class="mb-3 page-title">Laporan Transaksi</h4>
        <div class="d-flex justify-content-end mb-3">
            <a href="report_transaksi.php" class="btn header-button mr-2">Lihat Laporan Penjualan</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Waktu Transaksi</th>
                    <th>ID Pelanggan</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM transaksi";
                $result = mysqli_query($conn, $query);
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['waktu_transaksi'] . "</td>";
                    echo "<td>" . $row['pelanggan_id'] . "</td>";
                    echo "<td>" . $row['keterangan'] . "</td>";
                    echo "<td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn btn-info btn-sm'>Lihat Detail</a> ";
                    echo "<button class='btn btn-danger btn-sm'>Hapus</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
