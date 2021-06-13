<?php
    session_start();
    $produk_id = $_GET['produk_id'];

    if (isset($_SESSION['keranjang'][$produk_id])) {
        $_SESSION['keranjang'][$produk_id]+=1;
    } else {
        $_SESSION['keranjang'][$produk_id] = 1;
    }

    echo "<script>alert('Produk Sudah Masuk Ke Keranjang');</script>";
    echo "<script>window.location.replace('keranjang.php');</script>";
?>