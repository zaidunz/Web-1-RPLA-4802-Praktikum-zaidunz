<?php
require_once "koneksi.php";

if (!isset($_POST['judul'])) {
    echo "<p>Judul tidak boleh kosong.</p>";
    exit();
}

if (!isset($_POST['isi'])) {
    echo "<p>Isi tidak boleh kosong.</p>";
    exit();
}

$sql = "UPDATE berita SET judul='$_POST[judul]', isi='$_POST[isi]', id_kategori='$_POST[kategori]' WHERE id= $_GET[id]";
if (mysqli_query($conn, $sql)){
    header("refresh:3;url=index.php");
    echo"<p>Data berhasil disimpan.</p>";
}

else{
    echo "<p>Ups, data gagal disimpan :(</p>";
}
?>