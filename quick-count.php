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
            <div class="quick-count__title-wrapper">
                <h1 class="quick-count__title">Quick Count</h1>
            </div>
            <div class="quick-count__paslon-wrapper">
                <div class="quick-count__paslon">
                    <span class="quick-count__photo-wrapper">
                        <img src="./assets/pictures/dummy01.jpg" alt="Paslon" class="quick-count__photo" width="100">
                    </span>
                    <h1 class="quick-count__no-urut">01</h1>
                    <h2 class="quick-count__nama">Lorem - Ipsum</h2>
                    <h3 class="quick-count__suara">12</h3>
                </div>
                <div class="quick-count__paslon">
                    <span class="quick-count__photo-wrapper">
                        <img src="./assets/pictures/dummy01.jpg" alt="Paslon" class="quick-count__photo" width="100">
                    </span>
                    <h1 class="quick-count__no-urut">01</h1>
                    <h2 class="quick-count__nama">Lorem - Ipsum</h2>
                    <h3 class="quick-count__suara">12</h3>
                </div>
                <div class="quick-count__paslon">
                    <span class="quick-count__photo-wrapper">
                        <img src="./assets/pictures/dummy01.jpg" alt="Paslon" class="quick-count__photo" width="100">
                    </span>
                    <h1 class="quick-count__no-urut">01</h1>
                    <h2 class="quick-count__nama">Lorem - Ipsum</h2>
                    <h3 class="quick-count__suara">12</h3>
                </div>
            </div>
            <div class="quick-count__suara-masuk-wrapper">
                <h1 class="quick-count__suara-masuk">Suara Masuk (0) suara</h1>
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