<?php
include 'koneksi.php';

$id = $_GET["id"];

// hapus gambar
$sql = "SELECT * FROM wisata WHERE id='$id'";
$hasil_kat = mysqli_query($koneksi, $sql);
// mengambil data pada parameter id pada kolom database category

// periksa query apakah salah atau benar
if (!$hasil_kat) {
    die("query gagal dimasukkan" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
}
// menampilkan data query dari database parameter id
$data_kat = mysqli_fetch_assoc($hasil_kat);

if (!count($data_kat)) {
    echo "<script>alert('data tidak ditemukan pada database.');window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html dir='ltr' lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata : <?php echo $data_kat['name']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<!--[ <body> open ]-->

<body class='oGrd bD onId onHm' id='mainCont'>
    <input class='navi hidden' id='offNav' type='checkbox' />
    <div class='mainWrp'>
        <!--[ Header section ]-->
        <header class='header' id='header'>
            <!--[ Header content ]-->
            <div class='headCn'>
                <div class='headIn secIn'>
                    <div class='headD headL'>
                        <!--[ Header widget ]-->
                        <div class='headN section' id='header-title'>
                            <div class='widget Header' data-version='2' id='Header1'>
                                <div class='headInnr'>
                                    <h1 class='headH'>
                                        <span class='headTtl'>
                                            Yuk Vacation !
                                        </span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='headD headR'>
                        <div class='headI'>
                            <!--[ Header menu ]-->
                            <div class='headM'>
                                <div class='mnBr'>
                                    <div class='mnBrs'>
                                        <div class='mnH'>
                                            <label aria-label='Close' class='c' data-text='Close' for='offNav'></label>
                                        </div>
                                        <div class='mnMen section' id='header-Menu'>
                                            <div class='widget HTML' data-version='2' id='HTML000'>
                                                <ul class='mnMn' itemscope='itemscope' itemtype='https://schema.org/SiteNavigationElement'>
                                                    <li>
                                                        <a class='a' href='/' itemprop='url'>
                                                            <span class='n'>Home</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class='a' href='/' itemprop='url'>
                                                            <span class='n'>Tentang</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class='a' href='riwayat.php' itemprop='url'>
                                                            <span class='n'>Pemesanan</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class='a' href='login.php'>
                                                            <span class='n'>Login / Register</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label class='fCls' for='offNav'></label>
                            </div>
                            <!--[ Header icon ]-->
                            <div class='headP section' id='header-icon'>
                                <div class='widget TextList' data-version='2' id='TextList000'>
                                    <ul class='headIc'>
                                        <li class='isMn'>
                                            <label class='tNav tIc bIc' for='offNav'>
                                                <svg class='line' viewBox='0 0 24 24'>
                                                    <line x1='3' x2='21' y1='12' y2='12'></line>
                                                    <line x1='3' x2='21' y1='5' y2='5'></line>
                                                    <line x1='3' x2='21' y1='19' y2='19'></line>
                                                </svg>
                                            </label>
                                        </li>
                                        <li class='isSrh'>
                                            <label aria-label='Search' class='tSrch tIc bIc' for='searchIn'>
                                                <svg class='line' viewBox='0 0 24 24'>
                                                    <g transform='translate(2.000000, 2.000000)'>
                                                        <circle cx='9.76659044' cy='9.76659044' r='8.9885584'></circle>
                                                        <line x1='16.0183067' x2='19.5423342' y1='16.4851259' y2='20.0000001'></line>
                                                    </g>
                                                </svg>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--[ Content section ]-->
        <div class='mainIn'>
            <div class='secIn'>
                <!--[ Blog topics ]-->
                <div class='blogTopc'>
                    <div class='blogIn'>
                        <input class='topI hidden' id='offTop' type='checkbox' />
                        <div class='topM'>
                            <div class='tpBr'>
                                <div class='tpBrs'>
                                    <div class='tpC'>
                                        <svg class='rad' viewBox='0 0 160 160'>
                                            <path d='M0-10,150,0l10,150S137.643,80.734,100.143,43.234,0-10,0-10Z' transform='translate(0 10)'></path>
                                        </svg>
                                        <label data-text='Close' for='offTop'>
                                            <!--[ Forward icon ]-->
                                            <svg class='line' viewBox='0 0 24 24'>
                                                <g transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)'>
                                                    <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                                                </g>
                                            </svg>
                                        </label>
                                        <svg class='rad in' viewBox='0 0 160 160'>
                                            <path d='M0-10,150,0l10,150S137.643,80.734,100.143,43.234,0-10,0-10Z' transform='translate(0 10)'></path>
                                        </svg>
                                    </div>
                                    <div class="section" id="left-widget">
                                        <div class="widget HTML" data-version="2" id="HTML00">
                                            <ul class="tpMn" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                                                <li class="drp">
                                                    <details open="">
                                                        <summary class="a">
                                                            <span class="n">Category Wisata</span>
                                                            <svg class="line d" viewBox="0 0 24 24">
                                                                <g transform="translate(5.000000, 8.500000)">
                                                                    <path d="M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </summary>
                                                        <ul>
                                                            <?php
                                                            // panggil koneksi
                                                            include 'koneksi.php';

                                                            // panggil semua data category menggunakan query select category
                                                            $query = "SELECT * FROM category ORDER BY id ASC";
                                                            $result = mysqli_query($koneksi, $query);
                                                            // cek apakah ada error saat menjalankan query
                                                            if (!$result) {
                                                                die("query salah" . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
                                                            }
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <li><a href="category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                                                </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </details>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--[ Blog content ]-->
                <div class='blogCont'>
                    <div class='blogIn'>
                        <div class='blogM'>
                            <!--[ Main content ]-->
                            <main class="blogItm mainbar">
                                <article class="ntry ps post">
                                    <h1 class="pTtl aTtl itm" style="margin-bottom:50px;">
                                        <span style="font-size: 40px; font-weight: 900; line-height: 1.3em;">
                                            <?php echo $data_kat['name']; ?>
                                        </span>
                                    </h1>
                                    <div class="pInr">
                                        <div class="pAd">
                                        </div>
                                        <div class="pEnt">
                                            <div class="pS post-body postBody" id="postBody">
                                                <div id="postSplit">
                                                    <table class="tr-caption-container">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="zmImg">
                                                                        <img alt="" src="assets/img/<?php echo $data_kat['image']; ?>">
                                                                        <div class="iFxd">
                                                                            <a aria-label="Comments" class="cmnt" data-text="Booking Now" href="booking.php?id=<?php echo $data_kat['id']; ?>" role="button">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <h2 style="margin-top: 30px;">Rp . <?php echo number_format($data_kat['harga']); ?></h2>

                                                    <p> <?php echo $data_kat['deskripsi']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>