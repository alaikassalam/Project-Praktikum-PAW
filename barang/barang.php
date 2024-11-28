<?php
include "../koneksi.php";
include "../navbar.php";
$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tabel Barang</h2>
        <div class="text-right mb-3">
            <a href="../dashboard.php" class="btn btn-secondary">Back</a>
            <a href="create_barang.php" class="btn btn-success">Tambah Barang</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>ID Supplier</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($barang)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['kode_barang'] ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['harga'] ?></td>
                        <td><?= $row['stok'] ?></td>
                        <td><?= $row['supplier_id'] ?></td>
                        <td>
                            <a href="edit_barang.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_barang.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirmDeletion()">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDeletion() {
            return confirm("Anda yakin akan menghapus barang ini?");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
