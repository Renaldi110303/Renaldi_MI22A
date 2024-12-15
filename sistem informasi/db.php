<?php 
    $host       = "localhost";
    $user       = "root";
    $password   = "";
    $dbname     = "db_depot_air";

    $koneksi    = mysqli_connect($host, $user, $password, $dbname);
    if (mysqli_connect_errno()) {
        die("Koneksi Gagal Karena : ". mysqli_connect_error());
    }
?>