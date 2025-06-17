<?php
require_once "koneksi.php";

if (!isset($_POST['judul'])) {
    echo "<p>Judul tidak boleh kosong.</p>";
    exit();
}

if (!isset($_POST['isi'])) {
    echo "<p>Isian tidak boleh kosong.</p>";
}

$sql = "INSERT INTO berita (judul, isi, id_kategori) VALUES ('$_POST[judul]', '$_POST[isi]', '$_POST[kategori]')";
if (mysqli_query($conn, $sql)) {
    header("refresh:3;url=index.php");
    echo "<p>Data berhasil disimpan.</p>";
}
else{
    echo "<p>Ups, data gagal disimpan : (</p>";
}
?>