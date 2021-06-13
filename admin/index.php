<?php
include '../connection/koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href = '../login.php'</script>";
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Skincare <?php echo $_SESSION['username'] ?> </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <input type="checkbox" id="check">
    <!-- header area start -->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Home <span>Skincare</span></h3>
        </div>
        <div class="right_area">
            <a href="../logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!-- header area end -->
    <!-- Sidebar start -->
    <div class="sidebar">
        <center>
            <img src="gambar/admin.png" class="profile_admin" alt="">
            <h4>Admin</h4>
        </center>
        <a href="?page=dashboard"><i class="fas fa-desktop"></i> <span>Dashboard</span></a>
        <a href="?page=kategori"><i class="far fa-clipboard"></i> <span>Kategori</span></a>
        <a href="?page=produk"><i class="fas fa-cart-plus"></i> <span>Produk</span></a>
        <a href="?page=customer"><i class="fas fa-users"></i> <span>Customer</span></a>
        <!-- <a href="?page=laporan"><i class="fas fa-sliders-h"></i> <span>Laporan</span></a> -->

    </div>
    <!-- Sidebar end -->
    <div class="content">
        <div class="isi">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">
                    <?php
                    if (isset($_GET['page'])) {

                        switch ($_GET['page']) {
                            case 'dashboard':
                                include_once 'pages/dashboard.php';
                                break;

                            case 'produk':
                                include_once 'pages/produk/list.php';
                                break;

                            case 'tambah-produk':
                                include_once 'pages/produk/tambah.php';
                                break;

                            case 'edit-data':
                                include_once 'pages/produk/edit_data.php';
                                break;

                            case 'kategori':
                                include_once 'pages/kategori.php';
                                break;

                            case 'tambah-kategori':
                                include_once 'pages/tambah-kategori.php';
                                break;

                            case 'edit-kategori':
                                include_once 'pages/edit-kategori.php';
                                break;

                            case 'customer':
                                include_once 'pages/customer.php';
                                break;

                            default:
                                echo "404 Not Found.";
                                break;
                        }
                    } else {
                        include_once 'pages/dashboard.php';
                    }
                    ?>

                </div>

            </div>
</body>

</html>