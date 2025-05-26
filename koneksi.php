<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydiary2";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database error!");
}
?>