<?php

    $server ="localhost";
    $user = "root";
    $password = "";
    $database = "restoran_kasir";

    $conn = mysqli_connect($server,$user,$password,$database);

    if(!$conn){
        die('Koneksi database gagal : '.mysqli_connect_error());
    }

?>