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
    
    // Cek apakah user sudah like post ini
    $check_sql = "SELECT * FROM likes WHERE id_user = '$id_user' AND id_post = '$id_post'";
    $check_result = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($check_result) == 0) {
        // Belum like, tambahkan like
        $sql = "INSERT INTO likes (id_user, id_post) VALUES ('$id_user', '$id_post')";
        if (mysqli_query($conn, $sql)) {
            echo "Like berhasil ditambahkan";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "User sudah like post ini";
    }
} else {
    echo "Error: ID post tidak ditemukan";
}
?>
