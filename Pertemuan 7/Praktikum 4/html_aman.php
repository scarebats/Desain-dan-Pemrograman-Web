<!DOCTYPE html>
<html>
    <head>
        <title>Injection</title>
    </head>
    <body>
        <form method="post" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="nama">Nama:</label>
            <input type="text" name="input" id="nama" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            <input type="submit" name="submit" id="submit">
        </form>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = $_POST['input'];
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'];
    echo $input . "<br>";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo $email . " Aman";
    } else {
        echo "email tidak aman";
    }
}
?>