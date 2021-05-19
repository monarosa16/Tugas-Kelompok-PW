<?php
include "pdo.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
    <legend> <a href="tambah.php">+ tambah data</a>
    </legend>
    <form method="POST">
    <table>
        <tr>
            <td>merk</td>
            <td>:</td>
            <td>
            <input type="text" name="merk">
            </td>
        </tr>
        <tr>
            <td>harga</td>
            <td>:</td>
            <td>
            <input type="tetx" name="harga">
            </td>
        </tr>
        <tr>
            <td>jenis</td>
            <td>:</td>
            <td>
            <input type="text" name="jenis">
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
        $merk = $_POST["merk"];
        $harga = $_POST["harga"];
        $jenis = $_POST["jenis"];

        if(empty($merk)) {
            echo '<script>alert("merk tidak boleh kosong");</script>';
        } else {
            $sql = "INSERT INTO serum (merk, harga, jenis)
        VALUES ('$merk', '$harga', '$jenis')";
         $conn->exec($sql);
         echo "New record created successfully";
        }
    }
     ?>
</body>
</html>