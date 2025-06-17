<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "alamat" => $_POST["alamat"],
        "produk" => $_POST["produk"],
        "jumlah" => $_POST["jumlah"],
    );
    if (!filter_var($data["jumlah"], FILTER_VALIDATE_INT) <= 0 && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        echo "Email atau jumlah produk tidak valid"  . "\n";
        echo '<a href="pemesanan.html">Kembali ke pemesanan</a>';
    } else 
     {
        $file = fopen("kontak.txt", "a");
        fwrite($file, "name: " . $data["name"] . "\n");
        fwrite($file, "email:" . $data["email"] . "\n");
        fwrite($file, "alamat: " . $data["alamat"] . "\n");
        fwrite($file, "produk: " . $data["produk"] . "\n");
        fwrite($file, "jumlah: " . $data["jumlah"] . "\n\n");
        fclose($file);
        echo "Pesan Terkirim" . "\n";
    }
}
