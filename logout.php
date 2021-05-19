<?php
    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
    session_destroy();

    echo "<script>window.location.replace('login.php');</script>";
    echo "<script>alert('Berhasil Logout');</script>";
    ?>