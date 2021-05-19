<form = method="POST">
    <table>
        <tr>
            <td>
                <input type="text" name="nama_serum">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name"btn-tambah">
                    Tambah
                </button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['btn-tambah'])) {
        $nama_kategori = $POST['nama_serum'];

        $sql = "INSERT INTO kategori VALUES('','$nama_serum');

        if ($object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>
            echo <script>window.location.replace('?halaman=kategori;);</script>
            exit;
    } else {
            echo "<script>alert('Gagal');</script>
            echo <script>window.location.replace('?halaman=tambah-kategori;);</script>
            exit;
    }