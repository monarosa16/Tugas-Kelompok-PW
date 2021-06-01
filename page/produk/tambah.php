
    <fieldset>
        <legend>
            <a href="tambah.php">+ tambah data</a>
        </legend>
            <form method="POST">
                <table>
                    <thead>
                    <tr>
                        <td>Produk</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="produk">
                        </td>
                    </tr>
                    <tr>
                        <td>Kadaluarsa</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="kadaluarsa">
                        </td>
                    </tr>
                    <tr>
                        <td>Umur Simpan</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="umur_simpan">
                        </td>
                    </tr>
                    <tr>
                        <td>Bentuk Produk</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="bentuk_produk">
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="harga">
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>:</td>
                        <td>
                            <input type="number" name="stok">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button name="btn-tambah">
                            Tambah Data
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
    </fieldset>
    <?php
    if (isset($_POST["btn-tambah"])){
        $produk = $_POST["produk"];
        $kadaluarsa = $_POST["kadaluarsa"];
        $umur_simpan = $_POST["umur_simpan"];
        $bentuk_produk = $_POST["bentuk_produk"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];
        

        if(empty($produk)) {
            echo '<script>alert("Produk tidak boleh kosong");</script>';
        } else {
            $sql = "INSERT INTO produk (produk, kadaluarsa, umur_simpan, bentuk_produk, harga, stok)
        VALUES ('$produk', '$kadaluarsa', '$umur_simpan', '$bentuk_produk', '$harga', '$stok')";
         $conn->exec($sql);
         echo "<script>alert('New record created successfully');</script>";
         echo "<script>window.location.replace('?page=produk');</script>";
        }
    }
     ?>
