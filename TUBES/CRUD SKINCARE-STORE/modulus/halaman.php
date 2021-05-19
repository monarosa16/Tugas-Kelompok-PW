<?php
    if (isset($_GET['halaman'])) {
        $page = $_GET['halaman'];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard';
            include 'page/dashboard.php';
            break;

            //kategori
            case 'serum';
            include 'page/serum/data_serum.php';
            break;

            case 'tambah-serum';
                include 'page/serum/tambah-serum.php';
                break;
            
        default;
            echo "404 Not Found";
            break;
    }

?>