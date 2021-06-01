<fieldset>
    <a href="?page=tambah-produk">Tambah Data</a>
    <hr>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead style="background-color:	#ADFF2F">
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Kadaluarsa</th>
                <th>Umur Simpan</th>
                <th>Bentuk Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 0;
                $sql = "SELECT * FROM produk ORDER BY id_produk ASC";
                $result = $con_object->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo ++$nomor; ?>.</td>
                            <td><?php echo $row['produk']; ?></td>
                            <td><?php echo $row['kadaluarsa']; ?></td>
                            <td><?php echo $row['umur_simpan'] ?></td>
                            <td><?php echo $row['bentuk_produk']; ?></td>
                            <td><?php echo $row['harga']; ?></td>
                            <td><?php echo $row['stok']; ?></td>
                            <td>
                                <a href="?page=edit-data&id_produk=<?php echo $row['id_produk']; ?>"><button style="background-color:blue; border-radius:25px; color:white">Edit</button></a> &bull;
                                <form style="display: inline;" method="POST">
                                    <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
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
        $id_produk = $_POST['id_produk'];

        $sql = "DELETE FROM produk WHERE id_produk = $id_produk";

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