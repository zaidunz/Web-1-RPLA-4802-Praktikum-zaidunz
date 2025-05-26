<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #007bff;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <body>
        <?php
        require_once "koneksi.php";
        if (isset($_GET['id'])) {
            $id =  intval($_GET['id']);
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM diary WHERE id = $id AND user_id = $user_id";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="container">
                    <h1>Edit Diary</h1>
                    <form action="prosesedit.php?id=<?php echo $id ?>" method="POST">
                        Diary mengenai<br />
                        <input type="text" name="judul" size="70" value="<?php echo $row['judul']; ?>" /><br />
                        <br />
                        Gimana ceritanya?<br />
                        <textarea name="isian" cols="70" rows="10"><?php echo htmlspecialchars($row['isian']); ?></textarea>
                        <br />
                        <br />
                        <input type="submit" value="Simpan" />
                    </form>
            <?php
            } else {
                echo "Diary tidak ditemukan/tidak memiliki akses";
            }
        } else {
            echo "Id tidak Valid";
        }
            ?>
                </div>
    </body>

</html>