<?php
require_once 'connection/koneksi.php';
session_start();
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Data Keranjang Tidak Ada');</script>";
	echo "<script>location='index.php';</script>";
}
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
            <li><a id="dashboard">Toko</a></li>
            <li><a href='index.php'>Produk</a></li>
            <!-- <li><a href=''>Kategori</a></li> -->
            <li><a href=''>Kategori</a></li>
            <li>
                <?php
                if (isset($_SESSION['login'])) { ?>
                    <a href="logout.php"><?= $_SESSION['nama']; ?></a>
                <?php
                } else {
                ?>
                    <a href="login.php">Login</a>
                <?php
                }
                ?>
            </li>
        </ul> 
    </div>

    <br>
    
    <div class="gambar">
    <table border="1" cellpadding="10" cellspacing="0" width="1200">
        <thead style="background:#D8BFD8;">
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            <?php foreach ($_SESSION["keranjang"] as $produk_id => $jumlah): ?>
                <?php
                    $ambil = $con_object->query("SELECT * FROM produk WHERE produk_id = '$produk_id'");
                    $pecah = $ambil->fetch_assoc();

                    $subharga = $pecah["harga"] * $jumlah;
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $pecah['produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>
                        <a href="hapusKeranjang.php?produk_id=<?php echo $produk_id ?>"> Hapus </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <a href="index.php">Lanjutkan Belanja</a> |
                    <a href="pemesanan.php"> Checkout </a>
                </td>
            </tr>
        </tfoot>
</table>
    </div>
    <br>
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