<?php
include "../koneksi.php";
include "../navbar.php";

$supplier = mysqli_query($conn, "SELECT * FROM  supplier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tabel Supplier</h2>
        <div class="text-right mb-3">
            <a href="create_supplier.php" class="btn bg-success">Tambah Supplier</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($supplier)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['telp'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <a href="edit_supplier.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_supplier.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirmDeletion()">Hapus</a>
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
