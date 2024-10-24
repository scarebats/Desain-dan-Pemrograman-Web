<?php
$file_path = '../uploads/' . $_GET['file'];

if (file_exists($file_path)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));
    flush();
    readfile($file_path);
    exit;
} else {
    echo "File tidak ditemukan.";
}
?>
