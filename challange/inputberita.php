<html>
<head>
</head>
<body>
        <h1>Tambah Berita</h1>
        <form action="proses_inputberita.php" method="POST">
            Judul<br/>  
            <input type="text" name="judul" size="70"/><br/>
            <br/>
            Isi Berita<br/>
            <textarea name="isi" cols="70" rows="10"></textarea>
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