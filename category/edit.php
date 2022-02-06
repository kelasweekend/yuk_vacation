<?php
include '../koneksi.php';
// ini buat nyimpan session pada browser
session_start();

if ($_SESSION['level'] != "admin") {
    header("location:index.php?pesan=gagal");
}

if ($_SESSION['status'] != "sudah_login") {
    // akan di redirrect ke login 
    header("location:../login.php");
}

if (isset($_GET['id'])) {
    // Ambil data dari id
    $id = $_GET['id'];
    $query = "SELECT * FROM category WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    // mengambil data pada parameter id pada kolom database category

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


// update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Boom baby we a POST method.
    $name = $_POST['name'];
    $id = $_POST['id'];

    $query = "UPDATE category SET name='$name'";
    $query .= "WHERE id = '$id'"; 
    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        die("query gagal dimasukkan". mysqli_errno($koneksi)."-". mysqli_error($koneksi));
    } else {
        echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
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

    <title>Edit Category</title>
</head>

<body>
    <div class="l-form">
        <form action="edit.php?id=<?php echo $data['id']; ?>" class="wisata" method="POST" enctype="multipart/form-data">
            <input type="number" name="id" value="<?php echo $data['id']; ?>" hidden>
            <h1 class="form__title">Edit Category</h1>
            <div class="form_div">
                <input type="text" class="form__input" value="<?php echo $data['name']; ?>" placeholder=" " autocomplete="off" name="name">
                <label for="" class="form__label">Nama Category</label>
            </div>
            <button class="form__button" type="submit">submit</button>
        </form>
    </div>
</body>

</html>