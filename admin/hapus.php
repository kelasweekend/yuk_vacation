<?php
include '../koneksi.php';

// if ($_SESSION['level'] != "admin") {
//     header("location:index.php?pesan=gagal");
// }

// if ($_SESSION['status'] != "sudah_login") {
//     // akan di redirrect ke login 
//     header("location:../login.php");
// }

$id = $_GET["id"];

// hapus gambar
$sql = "SELECT * FROM wisata WHERE id='$id'";
$hasil_img = mysqli_query($koneksi, $sql);
// mengambil data pada parameter id pada kolom database wisata

// periksa query apakah salah atau benar
if (!$hasil_img) {
    die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
}
// menampilkan data query dari database parameter id
$data_img = mysqli_fetch_assoc($hasil_img);

if (!count($data_img)) {
    echo "<script>alert('data tidak ditemukan pada database.');window.location='index.php';</script>";
} else {
    unlink('../assets/img/'. $data_img['image']);
    // membaca parameter id menggunakan method get
    $query = "DELETE FROM wisata WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    // mengambil data pada parameter id pada kolom database product

    // periksa query apakah salah atau benar
    if (!$hasil) {
        die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
    } else {
        echo "<script>alert('data berhasil dihapus.');window.location='index.php';</script>";
    }
}
