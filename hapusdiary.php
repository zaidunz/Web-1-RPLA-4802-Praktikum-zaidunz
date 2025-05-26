<?php

use Dom\Mysql;

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once "koneksi.php";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE  FROM diary WHERE id = $id AND user_id= $user_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: mysqli_error". mysqli_error ($conn);
    }
} else {
    echo "ID tidak valid.";
}
