<?php
include "../koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM supplier WHERE id = $id");
    header("location: supplier.php");
    exit;
}

$conn->close();
?>