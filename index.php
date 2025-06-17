<html>

<head>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Galeri Hewan</h1>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jumlah Kaki</th>
            <th>Cari di Google</th>
        </tr>
        <?php
        $data = array(
            'Ayam' => 2,
            'Angsa' => 2,
            'Bebek' => 2,
            'Domba' => 4,
            'Kalkun' => 2,
            'Kambing' => 4,
            'Kelinci' => 4,
            'Kerbau' => 4,
            'Kuda' => 4,
            'Sapi' => 4
        );

        ksort($data);


        $i = 1;
        foreach ($data as $item => $legs) {
        ?>
            <tr style="background-color: <?php echo ($i % 2 == 1) ? 'grey' : ''; ?>;">
                <td><?php echo $i ?></td>
                <td><?php echo $item ?></td>
                <td><img src="img/<?php echo $item ?>.jpg" width="50" height="50"></td>
                <td><?php echo $legs ?></td>
                <td><a href="https://www.google.com/search?tbm=isch&q=<?php echo $item ?>" target="_blank">Cari</a></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</body>

</html>
