<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $nama_db = "login_register";

    $koneksi = mysql_connect($server, $username, $password, $login_register);


    if(!$koneksi)
    {
        echo "Database Tidak Konek";
    }

    else
    {
        echo "Koneksi Berjalan";
    }
?>