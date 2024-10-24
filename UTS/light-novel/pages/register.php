<?php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO Users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $password]);

    echo "Daftar berhasil, Silakan Login.";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style_login_register.css">
    <title>Daftar</title>
</head>
<body>
    <div class="container">
        <h1>DAFTAR</h1>
        <form method="post" action="">
            Username <input type="text" name="username" required><br>
            Password <input type="password" name="password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah mempunyai akun? <a href="login.php">Login</a></p>
    </div>
<body>
