<?php
require_once "koneksi.php";

$sql = "DELETE FROM berita WHERE id=" . $_GET['id'];
if (mysqli_query($conn, $sql)) {
    header("refresh:3;url=index.php");
    echo"<p>Data berhasil dihapus.</p>";
}
else{
    echo"<p>Ups, data gagal dihapus :(</p>";
}
?>