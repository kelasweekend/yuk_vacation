<?php
include '../koneksi.php';

$id = $_GET["id"];

$query = "DELETE FROM category WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);
// mengambil data pada parameter id pada kolom database category

// periksa query apakah salah atau benar
if (!$hasil) {
    die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
} else {
    echo "<script>alert('data berhasil dihapus.');window.location='index.php';</script>";
}
