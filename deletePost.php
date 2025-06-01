<?php  
include 'connection.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];
$id_post = intval($_GET['id']);

// Periksa apakah postingan tersebut dimiliki oleh user yang sedang login
$sql = "SELECT id_user FROM posts WHERE id_post = $id_post";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row && $row['id_user'] == $id_user) {
    $deleteLikes = "DELETE FROM likes WHERE id_post = $id_post";
    mysqli_query($conn, $deleteLikes);
    
    $deletePost = "DELETE FROM posts WHERE id_post = $id_post";
    if (mysqli_query($conn, $deletePost)) {
        echo "Post berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: Anda tidak berhak menghapus post ini";
}
?>
