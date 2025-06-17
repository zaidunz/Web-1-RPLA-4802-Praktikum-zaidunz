<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydiary";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database error!");
}
?>