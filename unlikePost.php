<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['id_user'])) {
    echo "Error: User belum login";
    exit;
}

if (isset($_GET['id'])) {
    $id_post = (int)$_GET['id'];
    $id_user = $_SESSION['id_user'];
    
    // Hapus like dari database
    $sql = "DELETE FROM likes WHERE id_user = '$id_user' AND id_post = '$id_post'";
    if (mysqli_query($conn, $sql)) {
        echo "Like berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: ID post tidak ditemukan";
}
?>
