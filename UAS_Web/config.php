<?php
    $server = "localhost"; # Menghubngkan server
    $username = "root"; # Penghubungan login
    $password = ""; # Penghubungan login
    $db_name = "db_ounimehosting"; # Penghubungan database

    # Menghubungkan database ke codingan
    $db = mysqli_connect($server, $username, $password, $db_name);

    # Menampilkan kondisi penghubungan database
    if(!$db){ 
        die("Database connection failed");
    }
?>