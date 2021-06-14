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
    <form method="POST" action="" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <td>Produk</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="produk" required style='width:100vh;'>
                    </td>
                </tr>
                <tr>
                    <td>Kadaluarsa</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="kadaluarsa" required style='width:100vh;'>
                    </td>
                </tr>
                <tr>
                    <td>Umur Simpan</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="umur_simpan" required style='width:100vh;'>
                    </td>
                </tr>
                <tr>
                    <td>Bentuk Produk</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="bentuk_produk" required style='width:100vh;'>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>
                        <input type="number" name="harga" required style='width:100vh;'>
                    </td>
                </tr>

                <tr>
                    <td>gambar</td>
                    <td>:</td>
                    <td>
                        <input type="file" name="gambar" required>
                    </td>
                <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td>
                        <input type="number" name="stok" required style='width:100vh;'>
                    </td>
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
<?php
if (isset($_POST["btn-tambah"])) {
    $produk = $_POST["produk"];
    $kadaluarsa = date("Y-m-d", strtotime(htmlentities($_POST["kadaluarsa"])));
    $umur_simpan = $_POST["umur_simpan"];
    $bentuk_produk = $_POST["bentuk_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpname = $_FILES["gambar"]["tmp_name"];

    if ($error == 4) { //4 adalah jumlah dari error
        echo "<script>alert('pilih gambar dahulu');</script>";
        echo "<sript>window.location.replace('?page=tambah-produk');</script>";
        return;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Bukan Gambar');</script>";
        echo "<script>window.location.replace('?page=tambah-produk');</script>";
        return;
    }

    if ($ukuranfile > 1000000) {
        echo "<script>alert('Ukuran Terlalu Besar');</script>";
        echo "<sript>window.location.replace('?page=tambah-produk');</script>";
        return;
    }

    // gambar siap di upload
    // generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;
    $target_path = __DIR__ . "\gambar\/" . $namafilebaru;

    if (move_uploaded_file($tmpname,  $target_path)) {
        $sql = $con_object->query("INSERT INTO produk (produk,kadaluarsa,umur_simpan,bentuk_produk,harga,stok,gambar) VALUES('$produk',  '$kadaluarsa', '$umur_simpan', '$bentuk_produk', '$harga', '$stok','$namafilebaru')");

        if ($sql) {
            echo "<script>alert('Berhasil Menambahkan.');</script>";
            echo "<script>window.location.replace('?page=produk');</script>";
        }
    } else {
        echo "<script>alert('Gagal Menambahkan.');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
    }
}
?>