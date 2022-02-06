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

        <title>Halaman Admin</title>
    </head>

    <body>
        <div class="l-form">
            <div class="wisata_view">
                <!-- <button class="form__button" type="submit">Submit</button> -->
                <div style="display: flex; margin-bottom:30px">
                    <h1 class="wisata_title">Masukan Wisata</h1>
                    <a class="form__button" href="tambah.php">Tambah</a>
                </div>
                <table cellspacing='0'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Wisata</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // panggil semua data wisata menggunakan query select wisata
                        $query = "SELECT * FROM wisata ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $query);
                        // cek apakah ada error saat menjalankan query
                        if (!$result) {
                            die("query salah" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
                        }
                        $nomor = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['deskripsi']; ?></td>
                                <td>Rp. <?php echo number_format($row['harga']); ?></td>
                                <td style="display: flex;">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn-hapus">hapus</a>
                                </td>
                            </tr>
                        <?php
                            $nomor++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>