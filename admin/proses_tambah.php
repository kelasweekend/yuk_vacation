<?php
    include '../koneksi.php';

    if ($_SESSION['level'] != "admin") {
        header("location:index.php?pesan=gagal");
    }

    if ($_SESSION['status'] != "sudah_login") {
        // akan di redirrect ke login 
        header("location:../login.php");
    }

    // membaca variabel data dari method post
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $harga = $_POST['harga'];
    $category_id = $_POST['category'];
    $image = $_FILES['image'] ['name'];

    // cek apakah ada gambar atau tidak
    if($image != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        // format gambar yang diperbolehkan adalah png dan jpg
        $x = explode('.', $image);
        // untuk memisahkan nama file dengan ekstensi
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['image'] ['tmp_name'];
        $angka_acak = rand(1, 9999);
        $nama_gambar_baru = $angka_acak. '-'. $image;

        // fungsi diatas adalah mengganti penamaan file menjadi angka random
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../assets/img/'. $nama_gambar_baru);
            // memindahkan gambar yang sudah di upload ke dalam folder gambar
            $query = "INSERT INTO wisata(category_id, name, deskripsi, harga, image) VALUES ('$category_id', '$name', '$desc', '$harga', '$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            // memasukkan data kedalam database
            if(!$result) {
                die("query gagal dimasukkan". mysqli_errno($koneksi)."-". mysqli_error($koneksi));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                }
            } else {
              //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
              echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            } 
    } else {
        echo "<script>alert('Image Kosong.');window.location='index.php';</script>";
    }

?>