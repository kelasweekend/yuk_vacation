<?php
include 'koneksi.php';
// ini buat nyimpan session pada browser
session_start();

if ($_SESSION['status'] != "sudah_login") {
    // akan di redirrect ke login 
    header("location:login.php");
}

$name = $_POST['name'];
$wisata = $_POST['wisata'];
$tiket = $_POST['tiket'];
$tanggal = $_POST['tanggal'];
$id = $_SESSION['id'];

// cek wisata dengan where by name pada table wisata
$query = "SELECT * FROM wisata WHERE name='$wisata'";
$hasil = mysqli_query($koneksi, $query);
// mengambil data pada parameter id pada kolom database wisata

// periksa query apakah salah atau benar
if (!$hasil) {
    die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
}
// menampilkan data query dari database parameter id
$data = mysqli_fetch_assoc($hasil);
// hitung harga
$harga_awal = $tiket * $data['harga'];

$query = "INSERT INTO booking(name, wisata, tiket, tanggal, total_harga, user_id) VALUES ('$name', '$wisata', '$tiket', '$tanggal', '$harga_awal', '$id')";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
} else {
    echo "<script>alert('data berhasil ditambahkan.');window.location='index.php';</script>";
}
