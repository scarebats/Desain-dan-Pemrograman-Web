<?php
$umur;
if (isset($umur) && $umur >= 10) {
    echo "Anda sudah dewasa.";
} else {
    echo "Anda belum dewasa atau variabel 'umur' tidak ditentukan.";
}
?>

<br>

<?php
$data= array("nama" => "Jane", "usia" => 25);
if (isset($data["nama"])) {
    echo "Nama: " . $data["nama"];
} else {
    echo "Variabel 'nama' tidak ditemukan dalam array.";
}
?>