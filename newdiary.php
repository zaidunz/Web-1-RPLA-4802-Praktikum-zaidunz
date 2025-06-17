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
            max-width: 600px; /* Atur sesuai kebutuhan Anda */
            margin: 20px auto; /* Menempatkan form di tengah */
        }
        input[type="text"],
        textarea {
            width: calc(100% - 22px); /* Lebar form dikurangi padding */
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
    <div class="container">
        <h1>Tambah Diary</h1>
        <form action="proses.php" method="POST">
            Diary mengenai<br/>
            <input type="text" name="judul" size="70"/><br/>
            <br/>
            Gimana ceritanya?<br/>
            <textarea name="isian" cols="70" rows="10"></textarea>
            <br/>
            <br/>
            <input type="submit" value="Simpan" />
        </form>
    </div>
</body>
</html>
