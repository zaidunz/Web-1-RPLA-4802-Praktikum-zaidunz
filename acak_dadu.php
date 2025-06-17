<?php

    echo "<h1>Acak Dadu</h1>";



    $dadu = rand(1, 6);



    echo '<button  onclick="location.reload();"><img src="img/' . $dadu . '.png" alt="Dadu ' . $dadu . '" width="100"><br><br></button>';


?>