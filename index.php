<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
    include 'config/koneksi.php';
?>

Arigatou Gozaimashita <?php echo$_SESSION['username']; ?> <a href="logout.php">logout</a>