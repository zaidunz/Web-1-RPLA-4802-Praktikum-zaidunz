<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .write-diary-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px auto;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            border: 2px solid #0056b3;
            text-align: center;
            max-width: 200px
        }
        .write-diary-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .write-diary-button:active {
            transform: translateY(1px);
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .empty-message {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
    <script>
        function confirmDelete(id){
            if (confirm("Hapus data ini") == true){
                window.location.href = 'hapusdiary.php?id=' + id;
            }
        }
    </script>
</head>

<body>
    <h1>Dear Diary</h1>
    <center><a href="newdiary.php" class="write-diary-button">Tulis Diary</a></center>
        <?php
        require_once "koneksi.php";

        $sql = "SELECT * FROM diary ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
        
        if (mysqli_num_rows($result) > 0) {
        
        ?>
        
        <table>
            <tr>
                <th>No.</th>
                <th>Diary</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php
            $nomor = 0;
            while ($row = mysqli_fetch_array($result)) {
                $nomor++;
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><b><?php echo $row[1]; ?></b><br/><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td>
                <?php
                 echo "<a href='editdiary.php?id=" . $row['id'] . "'>Edit</a><br/>";
                 echo "<a href='hapusdiary.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>";
                 ?>
            </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <?php
        }else{
            // if diary table is empty, display empty message
            echo '<div class="empty-message">Data tabel atau diary kosong</div>';
        }
        ?>
</body>
</html>
