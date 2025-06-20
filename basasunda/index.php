<?php
// Konfigurasi URL API
$apiUrl = "http://localhost/rest/category.php";

// Ambil data kategori dari API
$categoriesJson = file_get_contents($apiUrl);
$categories = json_decode($categoriesJson, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .category {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .category a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>
    <h1>Daftar Kategori</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li class="category">
                <a href="word.php?catid=<?= htmlspecialchars($category['id']) ?>">
                    <?= htmlspecialchars($category['label']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
