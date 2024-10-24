<?php 
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM LightNovels WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);

header("Location: ../index.php");
exit();
?>
