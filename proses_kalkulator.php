<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$angkal = $_POST ["angkal"]; 
$angka2 = $_POST["angka2"]; 
$operasi= $_POST["operasi"];
switch ($operasi) {

    case "tambah": 
        $hasil = $angkal + $angka2; 
        break; 
    case "kurang": 
    $hasil = $angkal - $angka2; 
    break; 
    case "kali": 
    $hasil = $angkal * $angka2; 
    break; 
    case "bagi": 
    if ($angka2 != 0) { 
    $hasil =  $angkal / $angka2; 
    } else { 
        $hasil= "Tidak dapat melakukan pembagiar dengan nol."; 
    } 
    break; 
    default: 
    $hasil  = "Operasi tidak valid."; 
}

echo "Hasil: " .$hasil;
}
?>