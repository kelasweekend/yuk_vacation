<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mei_tubes";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("koneksi gagal" . mysqli_connect_error());
}
