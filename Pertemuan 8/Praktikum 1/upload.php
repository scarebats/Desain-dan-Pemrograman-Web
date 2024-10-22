<?php

// 1

// if(isset($_POST["submit"])){
//    $targetdir = "uploads/";
//    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);

//    if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
//        echo "File berhasil diunggah."
//    }
//    else{
//        echo "Gagak mengunggah file."
//    }
// }

// 2

// if(isset($_POST["submit"])) {
//    $targetdir = "uploads/";
//    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
//    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

//    $allowedExtensions =array("jpg","jpeg","png","gif");
//    $maxsize = 5*1024*1024;

//    if(in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"]<=$maxsize)
//    {
//        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
//            echo "File berhasil diunggah.";
//        }else{
//            echo "Gagal mengunggah file.";
//        }
//    } else{
//        echo "File tidak valid atau melebihi ukuran maximum yang diizinkan";
//    }
//    echo "<br><br><img src='$targetfile' width='200' style='height: auto;'/>";
// }

// 3

if(isset($_POST["submit"])) {
    $targetdir = "uploads/";
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions =array("txt","pdf","doc","docx");
    $maxsize = 3*1024*1024;

    if(in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"]<=$maxsize)
    {
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
            echo "File berhasil diunggah.";
        }else{
        echo "Gagal mengunggah file.";
        }
    } else{
        echo "File tidak valid atau melebihi ukuran maximum yang diizinkan";
    }
}
?>