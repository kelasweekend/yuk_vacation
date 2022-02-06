<?php
session_start();

include 'koneksi.php';

if ($_SESSION['status'] != "sudah_login") {
    // akan di redirrect ke login 
    header("location:login.php");
}

if (isset($_GET['id'])) {
    // Ambil data dari id
    $id = $_GET['id'];
    $query = "SELECT * FROM wisata WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    // mengambil data pada parameter id pada kolom database wisata

    // periksa query apakah salah atau benar
    if (!$hasil) {
        die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    }

    // menampilkan data query dari database parameter id
    $data = mysqli_fetch_assoc($hasil);
    // gunakan if kondisi jika tidak ada data ataupun ada data
    if (!count($data)) {
        echo "<script>alert('data tidak ditemukan pada database.');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('id tidak valid.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="assets/css/admin.css">

    <title>Booking Wisata</title>
</head>

<body>
    <div class="l-form">
        <form action="proses_booking.php" class="wisata" method="POST">
            <h1 class="form__title">Booking Wisata</h1>
            <div class="form_div">
                <input type="text" class="form__input" name="wisata" value="<?php echo $data['name']; ?>" autocomplete="off" readonly>
                <label for="" class="form__label">Nama Wisata</label>
            </div>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " autocomplete="off" name="name">
                <label for="" class="form__label">Nama Pemesan</label>
            </div>
            <div class="form_div">
                <input type="number" class="form__input" placeholder=" " autocomplete="off" name="tiket">
                <label for="" class="form__label">Jumlah Tiket</label>
            </div>
            <div class="form_div">
                <input type="date" class="form__input" placeholder=" " autocomplete="off" name="tanggal" min="<?php echo date('Y-m-d'); ?>">
                <label for="" class="form__label">Tanggal Wisata</label>
            </div>
            <button class="form__button" type="submit">Pesan</button>
        </form>
    </div>
</body>

</html>