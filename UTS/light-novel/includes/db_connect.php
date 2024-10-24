<?php
$serverName = "SCAREBAT\SQLEXPRESS";
$database = "LightNovelDB";
$username = ""; 
$password = ""; 

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
