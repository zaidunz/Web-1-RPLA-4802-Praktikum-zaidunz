<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isian = mysqli_real_escape_string($conn, $_POST['isian']);
    $sql = "UPDATE diary SET judul = '$judul', isian='$isian' where id=$id and user_id=$user_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: . mysqli_error"($conn);
    }
}
