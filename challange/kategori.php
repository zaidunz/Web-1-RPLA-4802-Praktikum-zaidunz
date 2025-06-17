<?php
    require_once "koneksi.php";

    if (isset($_GET['kategori'])) {
        $kategori = $_GET['kategori'];

        $sql = "SELECT b.id, b.judul, b.isi FROM berita b INNER JOIN kategori k ON b.id_kategori = k.id WHERE k.nama = '$kategori'";
        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
</head>
<script>
        function confirmDelete(id){
            if (confirm("Hapus data ini") == true){
                window.location.href = 'hapusberita.php?id=' + id;
            }
        }
    </script>
<body>
<h1>Berita <?php echo $kategori ?></h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
    <h2><?php echo $row[1] ?></h2>
    <p><?php echo $row[2]?></p>
    <p>
    <a href='editberita.php?id=<?php echo $row[0]?>'>Edit </a> 
    <a href='#' onclick="confirmDelete(<?php echo $row[0] ?>)">Hapus</a>
    </p>
    <hr>
    <?php
        }
    } else {
        echo "Belum ada berita pada kategori ini";
    }
    ?>
    </body>
</html>