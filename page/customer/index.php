<html>
    <head>
        <title>HOME SKINCARE</title>
        <link rel='stylesheet' href="style.css">
    </head>
    <body>

    <div class='header'>
        <div class='logo'>
            <h1>Skincarean</h1>
        </div>

        <div class='navbar'>
            <ul>
                <li><a herf=''>Toko</a></li>
                <li><a herf=''>Produk</a></li>
                <li><a herf=''>Kategori</a></li>
                <li><a herf=''>Kontak</a></li>
                <li><a herf=''>Login</a></li>
            </ul>
        </div>
    </div>

    <div class='gambar'>

    <?php 
    // key => value
    $gambar = [
        ['nama' =>'Body Butter','foto' => 'bodybutter', 'harga' => '20.000'],
        ['nama' =>'Body Mist','foto' => 'bodymist', 'harga' => '27.000'],
        ['nama' =>'Body Wash','foto' => 'bodywash', 'harga' => '17.000'],
        ['nama' =>'Facewash','foto' => 'facewash', 'harga' => '37.000'],
        ['nama' =>'Masker','foto' => 'masker', 'harga' => '28.000'],
        ['nama' =>'Moisturizer','foto' => 'moisturizer', 'harga' => '29.000'],
        ['nama' =>'Toner','foto' => 'toner', 'harga' => '44.000'],
        ['nama' =>'Serum','foto' => 'serum', 'harga' => '57.000'],
        ['nama' =>'Sunscreen','foto' => 'sunscreen', 'harga' => '67.000']
    ]; 
    for ($i=0;$i < count($gambar);$i++) { ?>

    <div class='foto'>
        <div style="width: 100%;height: 200px;background-image: url(<?php echo $gambar[$i]['foto'];?>.jpeg); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;"></div>
        <h1><?php echo $gambar[$i]['nama'];?></h1>
        <p>Harga <?php echo $gambar[$i]['harga'];?></p>
        <a href=''>Beli Sekarang</a>
    </div>

    <?php
        }
        ?>

    </div>

    <div class='footer'>
        <p>Copyright 2021- <a href=''>Skincare Store</a></p>
    </div>

    </body>
</html>