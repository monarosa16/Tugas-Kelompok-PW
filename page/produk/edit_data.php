<?php
    $id_produk = $_GET['id_produk'];
    $sql = "SELECT * FROM produk WHERE id_produk = $id_produk";
    $result = $con_object->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_produk = $row['id_produk'];
            $produk = $row['produk'];
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
<fieldset>
    <legend>Ubah Data</legend>
    <form method="POST">
        <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
        <table>
            
            <tr>
                <td>produk</td>
                <td>:</td>
                <td>
                    <input type="text" name="produk"  placeholder="Masukkan produk" value="<?php echo $produk; ?>"> 
                </td>
            </tr>
            <tr>
                <td>kadaluarsa</td>
                <td>:</td>
                <td>
                    <input type="text" name="kadaluarsa" placeholder="masukan kadaluarsa" value="<?php echo $kadaluarsa; ?>">
                </td>
            </tr>
            <tr>
                <td>umur simpan</td>
                <td>:</td>
                <td>
                    <input type="text" name="umur_simpan" placeholder="Masukkan umur_simpan" value="<?php echo $umur_simpan; ?>">
                </td>
            </tr>
            <tr>
                <td>bentuk_produk</td>
                <td>:</td>
                <td>
                    <input type="text" name="bentuk_produk" placeholder="Masukkan bentuk_produk" value="<?php echo $bentuk_produk; ?>">
                </td>
            </tr>
            <tr>
                <td>harga</td>
                <td>:</td>
                <td>
                    <input type="text" name="harga" placeholder="Masukkan harga" value="<?php echo $harga; ?>">
                </td>
            </tr>
            <tr>
                <td>stok</td>
                <td>:</td>
                <td>
                    <input type="number" name="stok" placeholder="Masukkan stok" value="<?php echo $stok; ?>">
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
        $id_produk = $_POST['id_produk'];
        $produk = $_POST['produk'];
        $kadaluarsa = $_POST['kadaluarsa'];
        $umur_simpan = $_POST['umur_simpan'];
        $bentuk_produk = $_POST['bentuk_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = " UPDATE produk SET produk = '$produk', kadaluarsa = '$kadaluarsa', umur_simpan = '$umur_simpan', bentuk_produk = '$bentuk_produk', harga= '$harga', stok = '$stok' WHERE id_produk = $id_produk ";

        if ($con_object->query($sql) === TRUE) {
            echo "<script>alert('Data Berhasil di Ubah');</script>";
            echo "<script>window.location.replace('?page=produk');</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Ubah');</script>";
            echo "<script>window.location.replace('?page=edit-data&id_produk=$id_produk');</script>";

            exit;
        }      
    }

?>