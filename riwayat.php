<?php
    session_start();

    include 'koneksi.php';

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "admin") {
        header("location:index.php?pesan=gagal");
    }

    if ($_SESSION['status'] != "sudah_login") {
        // akan di redirrect ke login 
        header("location:login.php");
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--===== CSS =====-->
        <link rel="stylesheet" href="assets/css/admin.css">

        <title>Riwayat Pemesanan</title>
    </head>

    <body>
        <div class="l-form">
            <div class="wisata_view">
                <!-- <button class="form__button" type="submit">Submit</button> -->
                <div style="display: flex; margin-bottom:30px">
                    <h1 class="wisata_title">Riwayat Pemasanan</h1>
                    <a class="form__button" href="index.php">Beranda</a>
                </div>
                <table cellspacing='0'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Wisata</th>
                            <th>Nama Pemesan</th>
                            <th>Tiket</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION['id'];
                        // panggil semua data wisata menggunakan query select wisata
                        $query = "SELECT * FROM booking WHERE user_id=$id ORDER BY id ASC";
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
                                <td><?php echo $row['wisata']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['tiket']; ?></td>
                                <td>Rp. <?php echo number_format($row['total_harga']); ?></td>
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