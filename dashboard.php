<?php
    session_start();
    include("evoting-functions.php");
    belumLogin();
    logout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/source/normalize.css">
    <link rel="stylesheet" href="./styles/source/clearfix.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <title>E-Voting - Dashboard</title>
</head>

<body>
    <header>
        <nav>
            <ul class="nav__ul">
                <li class="nav__li"><img class="nav__img" src="./assets/pictures/logo-copas.png" alt="Logo Copas"></li>
                <li class=" nav__li"><a class="nav__a" href="index.php">Beranda</a></li>
                <li class="nav__li"><a class="nav__a" href="quick-count.php">Quick Count</a></li>
                <li class="nav__li"><a class="nav__a" href="bantuan.php">Bantuan</a></li>
                <li class="nav__li"><a class="nav__a" href="login.php">Masuk</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class=profile>
            <section class=banner-profile>
            <div class=card-proflie>
                <img class="user_foto" src="./assets/pictures/dummy01.jpg" alt="Dummy Picture" width="180">
                <br>
                <button class="user_btn-edit" type="submit">Ubah Foto</button>
                <button class="user_btn-hapus" type="submit">Hapus Foto</button>
                <br>
                <h2 class="user_nama">Nama User</h3>
                <h3 class="user_nik">NIK User</h3>
            </div>
        </div>
        <aside class="form">
        <div class="tabel">
           <form action="" method="post">
                <table class="card">
                    <tr>
                        <td class="text">NIK</td>
                    </tr>
                    <tr>
                        <td><input name="nik" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">Nama Lengkap</td>
                    </tr>
                    <tr>
                        <td><input name="nama_lengkap" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">Tanggal Lahir</td>
                    </tr>
                    <tr>
                        <td><input name="tanggal_lahir" type="text" placeholder="" class="input"></td>
                    </tr>
                    <tr>
                        <td class="text">Kota/Kabupaten</td>
                    </tr>
                    <tr>
                        <td><input name="kota" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">Provinsi</td>
                    </tr>
                    <tr>
                        <td><input name="provinsi" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">PIN</td>
                    </tr>
                    <tr>
                        <td><input name="pin" type="password" class="input" /></td>
                    </tr>
                    <tr id=submit>
                        <td><button name="submit" class="submit__btn-action" type="submit">UBAH</button></td>
                    </tr>
                </table>
           </form>
        </div>
        </aside>
    </main>
    <footer>
        <h3>
            <p>RPL E-Voting CHOPAS  &copy; 2020</p>
        </h3>
        <h4>
            <p>Ali Naufal Ammarullah, Nurul Akbar Al-Ghifari, Nur Laely Mutmainnah</p>
        </h4>
    </footer>
</body>
