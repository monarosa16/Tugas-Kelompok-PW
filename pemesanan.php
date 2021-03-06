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
            <li><a href="">Toko</a></li>
            <li><a href="index.php">Produk</a></li>
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
<style>
.form-box {
  position: relative;
  margin: 5% auto;
  height: 400px;
  width: 600px;
  background: #8AA39B;

}
</style>    
<fieldset class='form-box'>
    <form method="POST" action="checkout.php" enctype="multipart/form-data">
    <input type="hidden" name="produk" value="<?= $_GET["produk"]?>">
    <input type="hidden" name="qty" value="<?= $_GET["qty"]?>">
        <table>
            <thead>
                <tr>
                    <td>Nama</td>
                    <tr>
                    <td>
                        <input type="text" name="nama" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td>Email</td>
                    <tr>
                    <td>
                        <input type="text" name="email" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <tr>
                    <td>
                        <input type="number" name="no_hp" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <tr>
                    <td>
                        <input type="text" name="alamat" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td>Kota</td>
                    <tr>
                    <td>
                        <input type="text" name="kota" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <tr>
                    <td>
                        <input type="text" name="provinsi" required style='width:100vh;'>
                    </td>
                    </tr>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" name="btn-tambah">
                            Tambah Data
                        </button>
                    </td>
                </tr>
        </table>
    </form>
    
</fieldset>
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