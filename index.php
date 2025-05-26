<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}
require_once "koneksi.php";
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$sql  = "SELECT *FROM diary WHERE user_id = $user_id order by id DESC ";
$result = mysqli_query($conn, $sql);
if(!$result){
    die("error" . mysqli_error($conn));
}


    ?>
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

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .welcome-message {
            text-align: center;
            color: #007bff;
            font-size: 20px;
            margin-top: 10px;
        }

        th,
        td {
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
        function confirmDelete(id) {
            if (confirm("Hapus data ini") == true) {
                window.location.href = 'hapusdiary.php?id=' + id;
            }
        }
    </script>
</head>

<body>
    <a href="logout.php"class = "logout-button">logout</a>
    <h1>Dear Diary</h1>
    <div class="welcome-message"> Selamat Hadir, <?php echo htmlspecialchars($username) ?></div>
    <center><a href="newdiary.php" class="write-diary-button">Tulis Diary</a></center>
    
    <?php
    if ($result) {
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
                    <td><b><?php echo $row['judul']; ?></b><br /><?php echo $row['isian']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td>
                        <?php
                        echo "<a href='editdiary.php?id=" . $row['id'] . "'>Edit</a><br/>";
                        echo "<a href='hapusdiary.php?id=" . $row['id'] . "' onclick= \"return confirm('Yakin ingin menghapus?');\">Hapus</a>";
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        // if diary table is empty, display empty message
        echo '<div class="empty-message">Data tabel atau diary kosong</div>';
    }
}
    
    ?>
</body>

</html>