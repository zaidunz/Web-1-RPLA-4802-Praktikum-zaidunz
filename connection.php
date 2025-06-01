<?php
$host = 'localhost';
$dbname = 'ajax';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn) {
} else {
    die("Connection failed: " . mysqli_connect_error());
}
