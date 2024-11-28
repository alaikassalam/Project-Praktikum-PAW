<?php
include "../koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");
    header("location: pelanggan.php");
    exit;
}

$conn->close();
?>