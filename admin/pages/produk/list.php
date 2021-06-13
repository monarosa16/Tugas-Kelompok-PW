<fieldset>
    <a href="?page=tambah-produk">Tambah Data</a>
    <hr>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead style="background-color:		#B0E0E6">
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>gambar</th>
                <th>Kadaluarsa</th>
                <th>Umur Simpan</th>
                <th>Bentuk Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Transaksi Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 0;
            $sql = "SELECT * FROM produk ORDER BY produk ASC";
            $result = $con_object->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $produk_id = $row['produk_id'];

                    $transaksi_masuk = $con_object->query("SELECT SUM(qty) as 'stok_transaksi' FROM transaksi_barang WHERE produk_id = $produk_id AND status = 1 ");
                    $masuk_transaksi = $transaksi_masuk->fetch_array();
                    $jum_transaksi = $masuk_transaksi['stok_transaksi'];

                    $sql_masuk = $con_object->query("SELECT SUM(qty) as 'stok' FROM checkout WHERE produk_id = $produk_id ");
                    $data_masuk = $sql_masuk->fetch_array();
                    $jum_masuk = $data_masuk['stok'];

                    $stok_barang = $row['stok'] + $jum_transaksi - $jum_masuk;
                    
            ?>
                    <tr>
                        <td><?php echo ++$nomor; ?>.</td>
                        <td><?php echo $row['produk']; ?></td>
                        <td>
                            <img src="<?php echo 'pages\produk\gambar\\' . $row['gambar']; ?>" width="100px" alt="">
                        </td>
                        <td><?php echo $row['kadaluarsa']; ?></td>
                        <td><?php echo $row['umur_simpan'] ?></td>
                        <td><?php echo $row['bentuk_produk']; ?></td>
                        <td><?php echo $row['harga']; ?></td>
                        <td><?php echo $stok_barang; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="produk_id" value="<?php echo $row['produk_id']; ?>">
                                <input type="number" name="qty" placeholder="0">
                                <button type="submit" name="transaksi-masuk">
                                    Simpan
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="?page=edit-data&produk_id=<?php echo $row['produk_id']; ?>"><button style="background-color:blue; border-radius:25px; color:white">Edit</button></a> &bull;
                            <form style="display: inline;" method="POST">
                                <input type="hidden" name="produk_id" value="<?php echo $row['produk_id']; ?>">
                                <button style="background-color:red; border-radius:25px; color:white" onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'><b><i>Note : Data Tidak Ada</i></b></td></tr>";
            }
            ?>
        </tbody>
    </table>
</fieldset>

<?php
if (isset($_POST['btn-hapus'])) {
    $produk_id = $_POST['produk_id'];

    $sql = "DELETE FROM produk WHERE produk_id = $produk_id";

    if ($con_object->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    }
}
?>

<?php
    if (isset($_POST['transaksi-masuk'])) {
        $produk_id = $_POST['produk_id'];
        
        date_default_timezone_set("Asia/Jakarta");
        
        $tanggal = date("d-m-y H:i:s");
        $qty = $_POST['qty'];
        $status = 1;
        
        $query = $con_object->query("INSERT INTO transaksi_barang VALUES ('','$produk_id', '$tanggal', '$qty', 1) ");

        if ($query != 0) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?page=produk');</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?page=produk');</script>";
        }
        
    }
?>