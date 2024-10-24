<?php
include '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../index.php");
        exit();
    } else {
        $error_message = "Akun Tidak Ada!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style_login_register.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form method="post" action="">
            Username <input type="text" name="username" required><br>
            Password <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <div class="notification"><?= $error_message; ?></div>
        <?php endif; ?>
        <p>Tidak punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>