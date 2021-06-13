<?php
session_start();
require_once 'connection/koneksi.php';
?>
<html>

<head>
    <title>HOME SKINCARE</title>
    <link rel='stylesheet' href="css/index2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>

    <div class='header'>
        <h1 class="logo">Skincarean</h1>  
        <ul class="navbar">
            <li><a href="index.php">Toko</a></li>
            <li><a id="produk">Produk</a></li>
            <!-- <li><a href=''>Kategori</a></li> -->
            <li><a href='keranjang'>Kategori</a></li>
            <li>
              <?php if (!isset($_SESSION['login'])) : ?>
                <a href="login.php"> Login </a>
              <?php else : ?>
                <a href="logout.php"> Logout </a>
              <?php endif ?>
            </li>
            
        </ul>
    </div>

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
                    <a href='produk_detail.php?produk=<?= $data['produk_id']; ?>'>Detail</a>
                    <a href="beli.php?produk_id=<?= $data['produk_id']; ?>"> Beli </a>
                </div>
        <?php
            }
        }
        ?>
    </div>
        <!-- <div class="footer">
    <p>copyright 2020 <a href="">ica dan mona</a></p>
    </div> -->
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>Home Skincare</h3>
        
      </div>

      <div class="footer-center">

        <div>
          
          <p><span>Jl. Pangeran Antasari Blok A No. 1D Cirebon</p>
        </div>

        <div>
          
          <p>Telp. (0234) 5745331</p>
        </div>

        <div>
          
          <p><a href="mailto:homeskincare@gmail.com">homeskincare@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Home Skincare adalah salah satu toko skincare di Cirebon yang menawarkan banyak produk dengan harga yang terjangkau. 
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          

        </div>

      </div>

    </footer>

</body>

</html>