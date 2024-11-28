<?php
include "../koneksi.php";

if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    $insertQuery = "INSERT INTO user (username, password, nama, alamat, hp, level) 
                    VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')";
    if (mysqli_query($conn, $insertQuery)) {
        header("Location: user.php"); 
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <form method="POST" class="card p-4">
            <h2 class="text-center mb-4">Tambah User</h2>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hp">No. Telp:</label>
                <input type="number" name="hp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <input type="number" name="level" class="form-control" required>
            </div>
            <button type="submit" name="add" class="btn btn-success btn-block">Tambah User</button>
            <a href="user.php" class="btn btn-secondary btn-block">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
