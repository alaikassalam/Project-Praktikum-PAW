<?php
include "../koneksi.php";

$id = $_GET['id_user'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: user.php"); 
    exit;
}

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    $updateQuery = "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user=$id";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: user.php"); 
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <form method="POST" class="card p-4">
            <h2 class="text-center mb-4">Edit User</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?= $row['username'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" value="<?= $row['password'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hp">No. Telp:</label>
                <input type="number" name="hp" value="<?= $row['hp'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <input type="number" name="level" value="<?= $row['level'] ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
            <a href="user.php" class="btn btn-secondary btn-block">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
