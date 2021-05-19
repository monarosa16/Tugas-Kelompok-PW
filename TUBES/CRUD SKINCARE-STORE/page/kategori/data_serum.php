<a href="?halaman=tambah-serum">Tambah Data"</a>
<hr>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Harga</th>
            <th>Jenis</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor = 0;
            $sql = "SELECT * FROM serum ORDER BY nama_serum ASC";
            $result = $object->query($sql)

            if ($result->num_rows > 0) {
                while ($row = $result ->fetch_assoc()) {

                }
            } else {
                echo "<tr><td><b><i>Data tidak ada</i></b></td></tr>"
            }
        ?>
    </tbody>
</table>
