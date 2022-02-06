<?php
session_start();
include '../koneksi.php';


// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] != "admin") {
    header("location:index.php?pesan=gagal");
}

if ($_SESSION['status'] != "sudah_login") {
    // akan di redirrect ke login 
    header("location:../login.php");
}

// mulai add
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Boom baby we a POST method.
    $name = $_POST['name'];
    $query = "INSERT INTO category(name) VALUES ('$name')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    } else {
        echo "<script>alert('data berhasil ditambahkan.');window.location='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>Tambah Wisata</title>
</head>

<body>
    <div class="l-form">
        <form action="tambah.php" class="wisata" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">Masukan Category</h1>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " autocomplete="off" name="name">
                <label for="" class="form__label">Nama Category</label>
            </div>
            <button class="form__button" type="submit">submit</button>
        </form>
    </div>
</body>

</html>