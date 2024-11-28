<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; 

    // Query untuk mencocokkan data
    $query = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password yang dimasukkan dengan yang ada di database
        if (password_verify($password, $user['password'])) {
            // Jika cocok, simpan data user di session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['hp'] = $user['hp'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=1"); 
            exit();
        }
    } else {
        header("Location: login.php?error=1"); 
        exit();
    }
}
?>
