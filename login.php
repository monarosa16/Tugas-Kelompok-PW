<?php

session_start();
require_once 'connection/koneksi.php';

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == 1) {
        echo "<script>window.location.href = 'admin/index.php'</script>";
        return;
    }
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan Login </p>

        <form action="" method="POST">
            <label for="#username">Username</label>
            <input type="text" name="username" id="username" class="form_login" required>

            <label for="#username">Password</label>
            <input type="password" name="password" id="password" class="form_login" required>

            <input type="submit" class="tombol_login" name="btn-login" value="LOGIN">
            
            <p>belum punya akun? <a href="register.php">Register disini</a></p>
        </form>
    </div>

    <?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con_object->query("SELECT * FROM users WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {

                if ($data['role'] == 1) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['login'] = true;

                    echo "<script>alert('Selamat Datang, Admin!');</script>";
                    echo "<script>window.location.replace('admin/?page=dashboard');</script>";
                    return;
                } else {
                    $_SESSION['id'] = $data['user_id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['login'] = true;

                    echo "<script>alert('Berhasil Login');</script>";
                    echo "<script>window.location.replace('index.php');</script>";
                }
            } else {
                echo "<script>alert('Password Salah');</script>";
                echo "<script>window.location.replace('login.php');</script>";
            }
        } else {
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    }

    ?>
</body>

</html>