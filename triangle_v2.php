<?php
function luassegi3($alas,$tinggi){
    return 0.5 * $alas * $tinggi;
}
function kelilingsegi3($alas,$tinggi){
    $sisimiring =sqrt(pow($alas,2)+pow($tinggi,2));
    return  $alas * $tinggi;
}
// Buat Fungsi format2desimal($angka): Memformat angka menjadi dua desimal menggunakan
// fungsi number_format()
function format2desimal($anka){
    return number_format((float)$anka, 2,',','-');

}
$alas = 4.5;
$tinggi = 6.0;
echo '<p>Panjang Alas: ' . $alas . ' cm</p>';
echo '<p>Tinggi Segitiga: ' . $tinggi . ' cm</p>';
echo '<p>Luas Segitiga: '. $luas_formated .' cm²</p>';
echo '<p>Keliling Segitiga: '. $keliling_formated .' cm</p>';

?>