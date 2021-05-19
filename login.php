<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<script>alert('Logout Dahulu');</script>";
        echo "<script>window.location.replace('index.php');</script>";
        exit;
    }

    include 'config/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan Login </p>

        <form action="" method="POST">
            <label for="">Username</label>
            <input type="text" name="username" class="form_login">
            
            <label for="">Password</label>
            <input type="password" name="password" class="form_login">

            <input type="submit" class="tombol_login" name="btn-login" value="LOGIN">
        </form>
    </div>

    <?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * from tbl_user where username = '$username'");
    
        if (mysqli_num_rows($result) === 1) {

            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                echo "<script>alert('Berhasil Login');</script>";
                echo "<script>window.location.replace('index.php');</script>";
            }else{
                echo "<script>alert('Gagal  Login');</script>";
                echo "<script>window.location.replace('index.php');</script>";
            }
        }else{
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    
    }

?>
</body>
</html>