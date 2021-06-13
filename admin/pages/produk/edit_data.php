<style>

.form-box {
  position: relative;
  margin: 5% auto;
  height: 500px;
  width: 600px;
  background: #8AA39B;

}
</style>
<?php
$produk_id = $_GET['produk_id'];
$sql = "SELECT * FROM produk WHERE produk_id = $produk_id";
$result = $con_object->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produk_id = $row['produk_id'];
        $produk = $row['produk'];
        $gambar = $row['gambar'];
        $kadaluarsa = $row['kadaluarsa'];
        $umur_simpan = $row['umur_simpan'];
        $bentuk_produk = $row['bentuk_produk'];
        $harga = $row['harga'];
        $stok = $row['stok'];
    }
} else {
    echo "Data Tidak ada";
}
?>
<fieldset class='form-box'>
    <!-- <legend>Ubah Data</legend> -->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="produk_id" value="<?php echo $produk_id; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $gambar ?>">
        <table>

            <tr>
                <td>Produk</td>
                <td>:</td>
                <td>
                    <input type="text" name="produk" required style='width:100vh' placeholder="Masukkan produk" value="<?php echo $produk; ?>">
                </td>
            </tr>
            <tr>
                <td>Kadaluarsa</td>
                <td>:</td>
                <td>
                    <input type="text" name="kadaluarsa" required style='width:100vh' placeholder="masukan kadaluarsa" value="<?php echo $kadaluarsa; ?>">
                </td>
            </tr>
            <tr>
                <td>Umur Simpan</td>
                <td>:</td>
                <td>
                    <input type="text" name="umur_simpan" required style='width:100vh' placeholder="Masukkan umur_simpan" value="<?php echo $umur_simpan; ?>">
                </td>
            </tr>
            <tr>
                <td>Bentuk Produk</td>
                <td>:</td>
                <td>
                    <input type="text" name="bentuk_produk" required style='width:100vh' placeholder="Masukkan bentuk_produk" value="<?php echo $bentuk_produk; ?>">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <input type="text" name="harga" required style='width:100vh' placeholder="Masukkan harga" value="<?php echo $harga; ?>">
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td>
                    <input type="number" name="stok" required style='width:100vh' placeholder="Masukkan stok" value="<?php echo $stok; ?>">
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <img src="pages/produk/gambar/<?php echo $gambar ?>" width="200px" alt="">
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" placeholder="Masukkan stok" value="<?php echo $gambar; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="btn-ubah">
                        Ubah
                    </button>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<?php

if (isset($_POST['btn-ubah'])) {
    $produk_id = $_POST['produk_id'];
    $sql = $con_object->query("SELECT * FROM produk WHERE produk_id = $produk_id");
    $data = $sql->fetch_array();
    $fotoBarang = $data['gambar'];

    $produk = $_POST['produk'];

    $kadaluarsa = $_POST['kadaluarsa'];
    $umur_simpan = $_POST['umur_simpan'];
    $bentuk_produk = $_POST['bentuk_produk'];
    $harga = $_POST['harga'];
    $gambar_lama = $_POST['gambar_lama'];
    $stok = $_POST['stok'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {

        if ($fotoBarang != NULL) {
            if (file_exists("page/gambar/$gambar_lama")) {
                unlink("page/gambar/$gambar_lama");
            }
        }

        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if ($error == 4) { // 4 adalah jumlah dari error
            echo "<script>alert('Pilih Gambar Dahulu');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Bukan Gambar');</script>";
        }
        if ($ukuranfile > 1000000) {
            echo "<script>alert('Ukuran Terlalu besar');</script>";
            echo "<script>window.location.replace('?page=buku');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;
    }

    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, 'page/gambar/' . $namafilebaru);
        $query = $con_object->query("UPDATE produk SET  produk = '$produk', kadaluarsa = '$kadaluarsa', umur_simpan='$umur_simpan', bentuk_produk='$bentuk_produk', gambar='$gambar', harga='$harga', stok='$stok', gambar= '$namafilebaru' WHERE produk_id = '$produk_id' ");
    } else {
        $query = $con_object->query("UPDATE produk SET produk = '$produk', kadaluarsa = '$kadaluarsa', umur_simpan = '$umur_simpan', bentuk_produk = '$bentuk_produk', gambar = '$gambar', harga = '$harga', stok = '$stok' WHERE produk_id = '$produk_id' ");
    }


    if ($query != 0) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
    }
}


?>