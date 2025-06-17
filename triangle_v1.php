<?php
$alas = 4.5;
$tinggi = 6.0;
// menghitung luas Setiga
$luas = 0.5 * $alas*$tinggi;
// menghitung sisi miring dengan teorema pyhtagoras
$sisimiring = sqrt(pow($alas,2) + pow($tinggi,2));
// menghitung keliling segita
$keliling = $alas + $tinggi + $sisimiring;


// mengformat menjadi angka 2 desimal
$luas_formated = number_format((float)$luas, 2,',', '-');
$keliling_formated = number_format((float)$keliling, 2,',', '-');
// menampilkan hasil 
echo '<p>Panjang Alas: ' . $alas . ' cm</p>';
echo '<p>Tinggi Segitiga: ' . $tinggi . ' cm</p>';
echo '<p>Luas Segitiga: '. $luas_formated .' cm²</p>';
echo '<p>Keliling Segitiga: '. $keliling_formated .' cm</p>';


?>