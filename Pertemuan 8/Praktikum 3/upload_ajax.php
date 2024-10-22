<?php
// if(isset($_FILES['file'])){
//     $errors = array();
//     $file_name = $_FILES['file']['name'];
//     $file_size = $_FILES['file']['size'];
//     $file_tmp = $_FILES['file']['tmp_name'];
//     $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

//     $allowed_extensions = array("pdf", "doc", "docx", "txt");

//     if(!in_array($file_ext, $allowed_extensions)) {
//         $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
//     }
//     if($file_size > 2097152) {
//         $errors[] = "Ukuran file tidak boleh lebih dari 2 MB.";
//     }
//     if(empty($errors) == true) {
//         move_uploaded_file($file_tmp, "documents/" . $file_name);
//         echo "berhasil diunggah.";
//     } else {
//         echo implode("<br>", $errors);
//     }
// }


if(isset($_FILES['file'])){
    $errors = array();
    foreach ($_FILES['file']['name'] as $key => $file_name) {
        $file_size = $_FILES['file']['size'][$key];
        $file_tmp = $_FILES['file']['tmp_name'][$key];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        if(!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "File {$file_name} Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, atau GIF.<br>";
        }
        if($file_size > 2097152) {
            $errors[] = "File {$file_name} Ukuran file tidak boleh lebih dari 2 MB.<br>";
        }
        if(empty($errors) == true) {
            move_uploaded_file($file_tmp, "img/" . $file_name);
            echo "File {$file_name} berhasil diunggah.<br>";
        } else {
            echo implode("<br>", $errors);
        }   
    }
}
?>