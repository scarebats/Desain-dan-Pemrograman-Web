<?php
if(isset($_FILES['file'])){
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_extensions = array("pdf", "doc", "docx", "txt");

    if(!in_array($file_ext, $allowed_extensions)) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }
    if($file_size > 2097152) {
        $errors[] = "Ukuran file tidak boleh lebih dari 2 MB.";
    }
    if(empty($errors) == true) {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "berhasil diunggah.";
    } else {
        echo implode("<br>", $errors);
    }
}
?>
