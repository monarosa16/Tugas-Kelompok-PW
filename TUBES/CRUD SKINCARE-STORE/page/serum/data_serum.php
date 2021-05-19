<a href="">Tambah Data</a>

<hr>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>Merk</th>
            <th>Harga</th>
            <th>Jenis</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $nomor = 0;
            $sql = "SELECT * FROM serum ORDER BY merk ASC";
            $result = $object->query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
        <?php
                }
            } else {
                echo "<tr><td colspan='3' align='center'><b><i>Data Tidak Ada</i></b></td></tr>";
            }
        ?>
    </tbody>
</table>