<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
// Menampilkan data yang diinputkan pengguna 
echo "Nama: ".$_POST["nama"]."<br>";
echo "Email: ".$_POST["email"] . "<br>";
echo "Alamat: ".$_POST["alamat"]."<br>"; 
} 
?>