<?php

require_once 'connection/koneksi.php';

?>
<div class="gambar">

        <?php
        $sql = $con_object->query("SELECT * FROM produk");
        $rows = $sql->num_rows;
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc($sql)) { ?>

                <div class='foto'>
                    <div style="width: 100%;height: 200px;background-image: url('<?php echo 'admin/pages/produk/gambar/' . $data['gambar']; ?>'); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;"></div>
                    <h1><?php echo $data['produk']; ?></h1>
                    <p>Harga <?php echo $data['harga']; ?></p>
                    <a href='produk_detail.php?produk=<?= $data['produk_id']; ?>'>Beli Sekarang</a>
                </div>
        <?php
            }
        }
        ?>
    </div>