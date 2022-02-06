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
        <form action="proses_tambah.php" class="wisata" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">Masukan Wisata</h1>
            <div class="form_div">
                <label for="category"></label>
                <select name="category" id="category" class="form__input">
                <?php
                    // panggil semua data wisata menggunakan query select wisata
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($koneksi, $query);
                    // cek apakah ada error saat menjalankan query
                    if (!$result) {
                        die("query salah" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " autocomplete="off" name="name">
                <label for="" class="form__label">Nama Wisata</label>
            </div>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " autocomplete="off" name="desc">
                <label for="" class="form__label">Deskripsi Wisata</label>
            </div>
            <div class="form_div">
                <input type="number" class="form__input" placeholder=" " autocomplete="off" name="harga">
                <label for="" class="form__label">Harga Wisata</label>
            </div>
            <div class="form_div">
                <input type="file" class="form__input" name="image">
                <label for="" class="form__label">Harga Wisata</label>
            </div>
            <input class="form__button" type="submit" value="submit" name="submit">
        </form>
    </div>
</body>

</html>