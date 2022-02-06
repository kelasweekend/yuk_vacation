<?php
session_start();
include 'koneksi.php';

// mulai add
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Boom baby we a POST method.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    $query = "INSERT INTO user (username, password, level, nama) VALUES ('$username', '$password', 'user', '$fullname')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Register Berhasil, SIlahkan Login');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="assets/css/admin.css">

    <title>Daftar Akun</title>
</head>

<body>
    <div class="l-form">
        <form action="register.php" class="form" method="POST">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<small>Username dan Password tidak sesuai !</small><hr>";
                }
            }
            ?>
            <h1 class="form__title">Register Now</h1>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " name="fullname">
                <label for="" class="form__label">Full Name</label>
            </div>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " name="username">
                <label for="" class="form__label">Username</label>
            </div>
            <div class="form_div">
                <input type="password" class="form__input" placeholder=" " name="password">
                <label for="" class="form__label">Password</label>
            </div>
            <button type="submit" class="form__button">Submit</button>
        </form>
    </div>
</body>

</html>