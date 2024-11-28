<?php
include "../koneksi.php";
include "../navbar.php";
$users = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_userth=device-wid_userth, initial-scale=1.0">
    <title>Data User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tabel User</h2>
        <div class="text-right mb-3">
            <a href="create_user.php" class="btn btn-success">Tambah User</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID_user</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Level</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($users)) { ?>
                    <tr>
                        <td><?= $row['id_user'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['hp'] ?></td>
                        <td><?= $row['level'] ?></td>
                        <td>
                            <a href="edit_user.php?id_user=<?= $row['id_user'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_user.php?id_user=<?= $row['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirmDeletion()">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmDeletion() {
            return confirm("Anda yakin akan menghapus user ini?");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
