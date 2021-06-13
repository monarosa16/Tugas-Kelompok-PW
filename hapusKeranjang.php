<?php
    session_start();
	$produk_id = $_GET['produk_id'];
	unset($_SESSION["keranjang"][$produk_id]);

	echo "<script>alert('Produk Terhapus');</script>";
	echo "<script>location='keranjang.php';</script>";
?>