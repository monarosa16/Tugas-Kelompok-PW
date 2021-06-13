<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Login Dahulu');</script>";
    echo "<script>window.location.replace('login.php');</script>";
    exit;
}
if(isset($_POST["btn-tambah"])){
include_once 'connection/koneksi.php';
// print_r($_POST);exit;
$nama = $_POST["nama"];
$email = $_POST["email"];
$no_hp = $_POST["no_hp"];
$alamat = $_POST["alamat"];
$kota = $_POST["kota"];
$provinsi = $_POST["provinsi"];

$user_id = $_SESSION["id"];

$con_object->query("INSERT INTO pemesanan VALUES('$nama', '$email', '$no_hp', '$alamat', '$kota', '$provinsi', '$user_id', NULL)");
//if (isset($_GET['produk']) && isset($_GET['qty'])) {
    $id = $_POST['produk'];
    $username = $_SESSION['username'];
    $sql = $con_object->query("SELECT * FROM produk WHERE produk_id = $id");
    $data = mysqli_fetch_assoc($sql);
    $sql_u = $con_object->query("SELECT user_id FROM users WHERE username = '$username'");
    $user_id = mysqli_fetch_assoc($sql_u);
 //}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/index2.css">
</head>

<style>
    .checkout-detail {
        width: 75%;
        margin: 10px auto;
    }

    .checkout-detail form {
        display: flex;
        flex-direction: column;
        border: 1px solid black;
        border-radius: 10px;
        padding: 10px;
    }

    .checkout-detail h2 {
        margin: 0;
    }

    .checkout-detail input[type='submit'] {
        border-style: none;
        border-radius: 10px;
        padding: 10px;
        font-weight: bold;
        color: white;
        background: rgb(255, 181, 167);
    }

    .checkout-detail table {
        margin: 10px 0;
    }

    .checkout-detail input[type='text'],
    .checkout-detail input[type='number'] {
        border-style: none;
        background: none;
    }
</style>

<body>
    <div class='header'>
        <h1 class="logo">Skincarean</h1>
        <ul class="navbar">
            <li><a href='index.php'>Toko</a></li>
            <li><a href=''>Produk</a></li>
            <!-- <li><a href=''>Kategori</a></li> -->
            <li><a href=''>Kontak</a></li>
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

    <div class="checkout-detail">
        <form action="transaksi.php" method="post">
            <input type="hidden" name="produk_id" value="<?= $data['produk_id']; ?>">
            <input type="hidden" name="user_id" value="<?= $user_id['user_id']; ?>">
            <h2>Checkout Detail</h2>
            <table>
                <tr>
                    <td style="font-weight: bold;">Nama Pengguna</td>
                    <td><input type="text" readonly name="nama" value="<?= $_SESSION['nama']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Nama Produk</td>
                    <td><input type="text" readonly name="nama_produk" value="<?= $data['produk']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Harga</td>
                    <td><input type="number" readonly name="harga" value="<?= $data['harga']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Qty</td>
                    <td><input type="number" readonly name="qty" value="<?= $_POST['qty']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Total</td>
                    <td><input type="number" readonly name="sub_total" value="<?= $data['harga'] * $_POST['qty']; ?>"></td>
                </tr>
            </table>
            <h2>Alamat Pengiriman</h2>
            <table>
                <!-- <tr>
                    <td style="font-weight: bold;">Nama Pengguna</td>
                    <td><input type="text" readonly name="nama" value="<?= $_SESSION['nama']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Nama Produk</td>
                    <td><input type="text" readonly name="nama_produk" value="<?= $data['produk']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Harga</td>
                    <td><input type="number" readonly name="harga" value="<?= $data['harga']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Qty</td>
                    <td><input type="number" readonly name="qty" value="<?= $_POST['qty']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Total</td>
                    <td><input type="number" readonly name="sub_total" value="<?= $data['harga'] * $_POST['qty']; ?>"></td>
                </tr> -->
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <?= $nama ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>
                    <?= $email ?>
                    </td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>:</td>
                    <td>
                    <?= $no_hp ?>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                    <?= $alamat ?>
                    </td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td>
                    <?= $kota ?>
                    </td>
                </tr>

                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>
                    <?= $provinsi ?>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Checkout">
        </form>
    </div>
</body>

</html>
<?php } ?>