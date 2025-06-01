<?php
session_start();

// Untuk testing - hapus setelah implementasi login
if (!isset($_SESSION['id_user'])) {
    $_SESSION['id_user'] = 1; // Set default user ID untuk testing
}

require_once 'connection.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get the content from POST data
    if (isset($_POST['content']) && !empty(trim($_POST['content']))) {
        $content = trim($_POST['content']);
        $id_user = $_SESSION['id_user'];
        
        // Escape string untuk mencegah SQL injection
        $content = mysqli_real_escape_string($conn, $content);
        
        // SQL query untuk insert
        $sql = "INSERT INTO posts (id_user, post, created_at) VALUES ('$id_user', '$content', NOW())";
        
        if (mysqli_query($conn, $sql)) {
            echo "Post berhasil disimpan";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    } else {
        echo "Error: Konten tidak boleh kosong";
    }
    
} else {
    echo "Error: Method tidak diizinkan";
}
?>
