<?php
session_start(); 
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];


$user_query = "SELECT nama FROM user WHERE username = '$username'";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$nama_user = $user_data['nama'] ?? 'User';

$base_url = "/Project-Praktikum-PAW/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <i class="fas fa-book mr-2"></i>
                <span>Sistem Penjualan</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>dashboard.php">Home</a></li>
                <?php if ($level === "1") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= $base_url; ?>barang/barang.php">Data Barang</a>
                            <a class="dropdown-item" href="<?= $base_url; ?>supplier/supplier.php">Data Supplier</a>
                            <a class="dropdown-item" href="<?= $base_url; ?>pelanggan/pelanggan.php">Data Pelanggan</a>
                            <a class="dropdown-item" href="<?= $base_url; ?>user/user.php">Data User</a>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>Transaksi/transaksi.php">Transaksi</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>Laporan/index.php">Laporan</a></li>
                
            </ul>
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?= $nama_user; ?>
                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Profil</a>
                            <a class="dropdown-item" href="<?= $base_url; ?>logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').on('click', function (e) {
                if ($(this).next('.dropdown-menu').is(':visible')) {
                    $(this).next('.dropdown-menu').removeClass('show');
                } else {
                    $('.dropdown-menu').removeClass('show');
                    $(this).next('.dropdown-menu').addClass('show'); 
                }
                e.stopPropagation();
            });

            $(document).on('click', function () {
                $('.dropdown-menu').removeClass('show');
            });
        });
    </script>
</body>
</html>