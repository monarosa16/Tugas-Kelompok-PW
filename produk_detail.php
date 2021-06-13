<?php
include_once 'connection/koneksi.php';

if (isset($_GET['produk'])) {
    // header("refresh:0;url=http://localhost/tubes_pw_new");
    $id = $_GET['produk'];
    $sql = $con_object->query("SELECT * FROM produk WHERE produk_id = $id");
    $count = mysqli_fetch_assoc($con_object->query("SELECT SUM(qty) AS qty FROM checkout WHERE produk_id=".$id));
    $data = mysqli_fetch_assoc($sql);
    $qty = $count['qty'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="css/index2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<style>
    .produk-detail button {
        width: 100%;
        border: none;
        border-radius: 10px;
        padding: 5px;
        margin: 2px;
    }

    #cart_btn {
        background: rgb(72, 177, 72);
        color: blue;
        font-weight: bold;
        cursor: pointer;
    }

    #check_btn {
        background: white;
        color: blue;
        font-weight: bold;
        cursor: pointer;
    }

    #cart_btn:hover {
        background: darkgreen;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    #check_btn:hover {
        background: darkorange;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<body>
    <div class='header'>
        <h1 class="logo">Skincarean</h1>
        <ul class="navbar">
            <li><a href=''>Toko</a></li>
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
                    <a href="login.php">Logout</a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="produk-detail">
        <div class="foto" style="width: 50%;height: 200px;background-image: url('<?php echo 'admin/pages/produk/gambar/' . $data['gambar']; ?>'); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;">
        </div>
        <div class="detail">
            <h2>Detail Produk</h2>
            <table>
                <tr>
                    <td style="font-weight: bold;">Nama Produk</td>
                    <td><?= $data['produk']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Harga</td>
                    <td><?= $data['harga']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Stok</td>
                    <td><?= $data['stok']-$qty; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Qty</td>
                    <td><input type="number" name="qty" value="1" id="qty"></td>
                </tr>
                <tr>
                    <!-- <td><button onclick="addCart(<?php // $data['produk_id']; 
                                                        ?>)" id="cart_btn">Tambah Keranjang</button></td> -->
                    <td><Button onclick="buy(<?= $data['produk_id']; ?>)" id="check_btn">Beli Sekarang</Button></td>
                </tr>
            </table>
        </div>
    </div>

</body>

<script>
    // function addCart(id) {
    //     var xhttp = new XMLHttpRequest()
    //     const qty = document.getElementById('qty')
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             console.log('added')
    //         }
    //     };
    //     xhttp.open("POST", "http://localhost/tubes_pw_new/ajax/add-cart.php", true);
    //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send(`id=${id}&qty=${qty.value}`);
    // }

    function buy(id) {
        const qty = document.getElementById('qty')
        window.location.href = 'pemesanan.php?produk=' + id + '&qty=' + qty.value
    }
</script>
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

</html>