<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilaiSiswa); 
$nilaiSiswa = array_slice($nilaiSiswa, 2, -2); 
$totalNilai = array_sum($nilaiSiswa);
$jumlahSiswa = count($nilaiSiswa);
$rataRata = $totalNilai / $jumlahSiswa;

echo "Total nilai setelah mengabaikan 2 nilai tertinggi dan 2 terendah: $totalNilai <br>";
echo "Jumlah siswa yang dihitung: $jumlahSiswa <br>";
echo "Nilai rata-rata: " . number_format($rataRata, 2);
?>