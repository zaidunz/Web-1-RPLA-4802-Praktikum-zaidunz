<?php
// Konfigurasi URL API
$apiUrl = "http://localhost/rest/word.php";

// Ambil ID kategori dari query string
$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;

// Periksa apakah ID kategori valid
if ($catid <= 0) {
    die("Invalid category ID.");
}

// Ambil data kata dari API berdasarkan kategori
$wordsJson = file_get_contents($apiUrl . "?catid=" . $catid);
$words = json_decode($wordsJson, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kata dalam Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .word {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Daftar Kata</h1>
    <a href="index.php">Kembali ke Daftar Kategori</a>
    <ul>
        <?php if (!empty($words)): ?>
            <?php foreach ($words as $word): ?>
                <li class="word">
                    <?= htmlspecialchars($word['label']) ?> - <?= htmlspecialchars($word['sunda']) ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="word">Tidak ada kata dalam kategori ini.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
