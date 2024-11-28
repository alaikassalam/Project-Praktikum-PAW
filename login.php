<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: user_list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-green {
            width: 100%;
            padding: 10px;
            background-color: #384fff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-green:hover {
            background-color: #1830a8;
        }

        p.error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Login Admin</h2>
    <form action="login_process.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-green">Login</button>
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>Nama pengguna atau kata sandi salah</p>";
    }
    ?>
</div>

</body>
</html>
