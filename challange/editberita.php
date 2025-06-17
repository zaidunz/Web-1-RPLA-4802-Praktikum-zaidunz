<?php
require_once 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<html>
<head>
</head>
<body>
<h1>Edit Berita</h1>
        <form action="prosesedit.php?id=<?php echo $id?>" method="POST">
            Judul<br/>
            <input type="text" name="judul" size="70" value="<?= $data['judul']; ?>"><br/>
            <br/>
            Isi Berita<br/>
            <textarea name="isi" cols="70" rows="10"><?= $data['isi']; ?></textarea>
            <br/>
            Kategori<br/>
            <select id="kategori" name="kategori">
                <option value="1">Olahraga</option>
                <option value="2">Politik</option>
            </select>
            <br/>
            <input type="submit" value="Simpan" />
        </form>
</body>
</html>
