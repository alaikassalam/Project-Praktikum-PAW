<?php
include '../koneksi.php';

$barangError = "";
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");

if (isset($_POST['transaksi_id'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id NOT IN (SELECT barang_id FROM transaksi_detail WHERE transaksi_id='$transaksi_id')");
} else {
    $barang = mysqli_query($conn, "SELECT * FROM barang");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $cek_barang = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi_id' AND barang_id='$barang_id'");
    if (mysqli_num_rows($cek_barang) > 0) {
        $barangError = "Barang ini sudah ada dalam transaksi.";
    } else {
        $barangData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id='$barang_id'"));
        $harga_total = $barangData['harga'] * $qty;
        
        $query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";
        if (mysqli_query($conn, $query)) {
            updateTotalTransaksi($conn, $transaksi_id);
            echo "<script>
            alert('Detail transaksi berhasil ditambahkan.');
            document.location.href = 'data.php';
            </script>";
        }
    }
}

function updateTotalTransaksi($conn, $transaksi_id) {
    $result = mysqli_query($conn, "SELECT SUM(harga * qty) AS total FROM transaksi_detail WHERE transaksi_id='$transaksi_id'");
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'] ?? 0;

    mysqli_query($conn, "UPDATE transaksi SET total = '$total' WHERE id='$transaksi_id'");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 30rem;">
            <h2 class="text-center mb-4">Tambah Detail Transaksi</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="barang_id" class="form-label">Pilih Barang</label>
                    <select name="barang_id" class="form-select">
                        <option value="" disabled selected>Pilih Barang</option>
                        <?php while($row = mysqli_fetch_assoc($barang)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-danger small"><?= $barangError ?></p>
                </div>
                <div class="mb-3">
                    <label for="transaksi_id" class="form-label">ID Transaksi</label>
                    <select name="transaksi_id" class="form-select">
                        <option value="" disabled selected>Pilih ID Transaksi</option>
                        <?php while($row = mysqli_fetch_assoc($transaksi)) { ?>
                            <option value="<?= $row['id'] ?>">ID Transaksi <?= $row['id'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" name="qty" class="form-control" required placeholder="Masukkan Jumlah Barang">
                </div>
                <button type="submit" class="btn btn-primary w-100">Tambah Detail Transaksi</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
