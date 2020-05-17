<?php
    session_start();
    include("evoting-config.php");
    include("evoting-functions.php");
    if (isset($_GET["state"])) {
        $nik = $_GET["nik"];
        $user = getUser($nik);
        $state = true;
    } else {
        $state = false;
    }
    // GET PASLON DATA\
    $pilihan;
    $total_suara = 0;
    $noUrut = [1, 2, 3];
    $paslon = [];
    foreach ($noUrut as $n) {
        $paslon[] = getPaslon($n);
    }
    if (isset($_POST["no_urut"])) {
        $pilihan = $_POST['no_urut'];
        if ( $user["status_memilih"] === 'f') {
            updateSuaraPaslon($pilihan, $paslon[$pilihan - 1]["jumlah_suara"], $nik);
        } else {
            header("Location: index.php?nik=$nik&state=$state&pilih=1");
            die;
        }
        header("Location: quick-count.php?nik=$nik&state=$state&pilih=1");
        // var_dump($paslon);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/source/normalize.css">
    <link rel="stylesheet" href="./styles/source/clearfix.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/rekam-jejak.css">
    <link rel="stylesheet" href="./styles/quick-count.css">
    <title>E-Voting - Home Page</title>
    <style>
    .--coblos {
        text-align: center;
        color: green;
    }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul class="nav__ul">
            <?php if ($state) : ?>
                <li class="nav__li"><img class="nav__img" src="./assets/pictures/logo-copas.png" alt="Logo Copas"></li>
                <li class="nav__li"><a class="nav__a" href="dashboard.php?nik=<?= $nik;?>">Kembali ke Dashboard</a></li>
            <?php else : ?>
                <li class="nav__li"><img class="nav__img" src="./assets/pictures/logo-copas.png" alt="Logo Copas"></li>
                <li class=" nav__li"><a class="nav__a" href="index.php">Beranda</a></li>
                <li class="nav__li"><a class="nav__a" href="quick-count.php">Quick Count</a></li>
                <li class="nav__li"><a class="nav__a" href="bantuan.php">Bantuan</a></li>
                <li class="nav__li"><a class="nav__a" href="login.php">Masuk</a></li>
            <?php endif ; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="quick-count">
            <?php if (isset($_GET['pilih']) == 1) : ?>
                <h2 class="quick-count__title --coblos">Anda berhasil mencoblos!</h2>
            <?php endif; ?>
            <div class="quick-count__title-wrapper">
                <h1 class="quick-count__title">Quick Count</h1>
            </div>
            <div class="quick-count__paslon-wrapper">
                <?php foreach($paslon as $p) : ?>
                    <div class="quick-count__paslon">
                        <span class="quick-count__photo-wrapper">
                            <img src="./assets/pictures/<?= $p['foto'];?>" alt="Paslon" class="quick-count__photo" width="100">
                        </span>
                        <h1 class="quick-count__no-urut"><?= "0".$p["no_urut"]; ?></h1>
                        <h2 class="quick-count__nama"><?= $p["nama_lengkap"]; ?></h2>
                        <h3 class="quick-count__suara">Suara Masuk : <?= $p["jumlah_suara"]; ?></h3>
                    </div>
                    <?php $total_suara += $p["jumlah_suara"]; ?>
                <?php endforeach; ?>
            </div>
            <div class="quick-count__suara-masuk-wrapper">
                <h1 class="quick-count__suara-masuk">Total Suara Masuk (<?= $total_suara;?>) suara</h1>
            </div>
        </section>
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
</html>