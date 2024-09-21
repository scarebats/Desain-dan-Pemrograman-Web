<?php
$hargaProduk = 120000; 
$diskonPersen = 20;   

if ($hargaProduk > 100000) {
    $diskon = $hargaProduk * ($diskonPersen / 100); 
    $hargaSetelahDiskon = $hargaProduk - $diskon;  
} else {
    $diskon = 0;
    $hargaSetelahDiskon = $hargaProduk; 
}

echo "Harga Produk : Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Diskon : Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar setelah diskon : Rp " . number_format($hargaSetelahDiskon, 0, ',', '.');
?>
