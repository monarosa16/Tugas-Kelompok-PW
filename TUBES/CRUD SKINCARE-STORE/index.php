<?php
    include 'koneksi/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="?halaman=dashboard">Dashboard</a>
    <a href="?halaman=serum">Serum</a>

    <hr>

    <?php require 'modulus/halaman.php'; ?>

</body>
</html>