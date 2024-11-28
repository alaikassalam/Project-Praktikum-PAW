<?php
include "../koneksi.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: supplier.php"); 
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $updateQuery = "UPDATE supplier SET id='$id', nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: supplier.php"); 
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
    <title>Edit Supplier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <form method="POST" class="card p-4">
            <h2 class="text-center mb-4">Edit Supplier</h2>
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?= $row['id'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telp">No. Telp:</label>
                <input type="text" name="telp" value="<?= $row['telp'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
            <a href="supplier.php" class="btn btn-secondary btn-block">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
