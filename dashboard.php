<?php
    session_start();
    include("evoting-config.php");
    include("evoting-functions.php");
    $st = true;
    $nik = $_GET["nik"];
    $user = getUser($nik);
    $ft = false;
    if (isset($_POST["ubah_foto"])) {
        // var_dump($_FILES); die;
        if (updateFoto($nik)) {
            header("Location: dashboard.php?nik=$nik&st=$ft");
        } else {
            echo "<script>alert('Foto Gagal di Ubah!')</script>";
        }
    }
    if (isset($_POST["update"])) {
        if ( $user["pin"] == $_POST["pin"]) {
            if (updateUser()) {
                // echo "<script>alert('Data Anda Berhasil di Edit')</script>";
                header("Location: dashboard.php?nik=$nik&edit=$konfirmasi");
                // $nik = $_GET["nik"];
            } else {
                echo "<script>alert('Gagal di Edit!')</script>";
            }
        } else {
            echo "<script>alert('Gagal ubah data! PIN salah!')</script>";            
        }
    }
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
    <style>
        h2.warning {
            font-size: 2.2rem;
            font-style: italic;
            color: blue;
        }
        input.ipt-foto {
            margin: 3rem 0 0;
        }
        button.m--width {
            width: 20rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul class="nav__ul">
                <li class="nav__li"><img class="nav__img" src="./assets/pictures/logo-copas.png" alt="Logo Copas"></li>
                <li class=" nav__li"><a class="nav__a" href="index.php?nik=<?= $nik;?>&state=<?= $st;?>">Beranda</a></li>
                <li class="nav__li"><a class="nav__a" href="quick-count.php?nik=<?= $nik;?>&state=<?= $st;?>">Quick Count</a></li>
                <li class="nav__li"><a class="nav__a" href="bantuan.php?nik=<?= $nik;?>&state=<?= $st;?>">Bantuan</a></li>
                <li class="nav__li"><a class="nav__a" href="dashboard.php?nik=<?= $nik;?>&state=<?= $st;?>">User : <?= $user["nik"];?></a></li>
                <li class="nav__li"><form action="" method="post"><button class="nav__a" type="submit" name="logout">Logout</button></form></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="profile">
            <section class=banner-profile>
            <form class=card-proflie action="" method="post" enctype="multipart/form-data">
                <?php if ($user['foto'] == '') : ?>
                    <img class="user_foto" src="./assets/pictures/dummy01.jpg" alt="Dummy Picture" width="180">
                <?php else : ?>
                    <img class="user_foto" src="./assets/pictures/<?= $user['foto'];?>" alt="Dummy Picture" width="180">
                <?php endif; ?>
                <br>
                <input name="foto" class="ipt-foto" type="file">
                <br>
                <button name="ubah_foto" type="submit" class="submit__btn-action m--width">Ubah Foto</button>
                <h2 class="user_nama"><?= $user["nama_lengkap"];?></h3>
                <h3 class="user_nik"><?= $user["nik"];?></h3>
            </form>
        </div>
        <aside class="form">
        <div class="tabel">
           <form action="" method="post" enctype="multipart/form-data">
                <table class="card">
                    <tr>
                        <?php if (isset($_GET['edit'])) :?>
                            <h2 class="warning">Data berhasil diubah!</h2>
                        <?php endif; ?>
                        <td class="text">NIK</td>
                    </tr>
                    <tr>
                        <td><input value="<?= $user['nik'];?>" name="nik" type="text" placeholder="" class="input nik--disabled" maxlength="100" ></td>
                    </tr>
                    <tr>
                        <td class="text">Nama Lengkap</td>
                    </tr>
                    <tr>
                        <td><input value="<?= $user['nama_lengkap'];?>" name="nama_lengkap" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">Tanggal Lahir</td>
                    </tr>
                    <tr>
                        <td><input value="<?= $user['tanggal_lahir'];?>" name="tanggal_lahir" type="text" placeholder="" class="input"></td>
                    </tr>
                    <tr>
                        <td class="text">Kota/Kabupaten</td>
                    </tr>
                    <tr>
                        <td><input value="<?= $user['kota'];?>" name="kota" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">Provinsi</td>
                    </tr>
                    <tr>
                        <td><input value="<?= $user['provinsi'];?>" name="provinsi" type="text" placeholder="" class="input" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td class="text">PIN</td>
                    </tr>
                    <tr>
                        <td><input placeholder="Masukan PIN Anda untuk konfirmasi ubah data" name="pin" type="password" class="input" /></td>
                    </tr>
                    <tr id=submit>
                        <td><button name="update" class="submit__btn-action" type="submit">UBAH</button></td>
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
