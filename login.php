<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="assets/css/admin.css">

    <title>Login Skuyy</title>
</head>

<body>
    <div class="l-form">
        <form action="cek_login.php" class="form" method="POST">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<small>Username dan Password tidak sesuai !</small><hr>";
                }
            }
            ?>
            <h1 class="form__title">Sign In</h1>
            <div class="form_div">
                <input type="text" class="form__input" placeholder=" " name="username">
                <label for="" class="form__label">Username</label>
            </div>
            <div class="form_div">
                <input type="password" class="form__input" placeholder=" " name="password">
                <label for="" class="form__label">Password</label>
            </div>
            <input type="submit" class="form__button" value="Sign In">
        </form>
    </div>
</body>

</html>