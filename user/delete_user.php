<?php
include "../koneksi.php";

if (isset($_GET['id_user'])) {
    // Ambil id dari parameter URL dan sanitasi
    $id = intval($_GET['id_user']); // Pastikan hanya angka yang diterima

    // Jalankan query DELETE
    $sql = "DELETE FROM user WHERE id_user = $id";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah query berhasil
    if ($result) {
        // Redirect ke halaman user jika berhasil
        header("Location: user.php");
        exit;
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}

// Tutup koneksi
mysqli_close($conn);
?>
