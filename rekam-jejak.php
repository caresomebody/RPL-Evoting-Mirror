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
// Get Paslon
    $noUrut = [1, 2, 3];
    $paslon = [];
    foreach ($noUrut as $n) {
        $paslon[] = getPaslon($n);
    }
    $nou;
    if (isset($_GET["nou"])) $nou = $_GET["nou"] - 1;
    $pas = $paslon["$nou"];
    $no_j = $nou + 1;
    // var_dump($paslon["$nou"]["nama_lengkap"]);
// GET Berita
    $news = file_get_contents("news-api/json/no-urut-0$no_j.json");
    $news = json_decode($news, true);
    $news = $news['articles'];
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
        <section class="rekam-jejak">
            <div class="rekam-jejak__title-wrapper">
                <h1 class="rekam-jejak__title">Rekam Jejak</h1>
            </div>
            <div class="rekam-jejak__paslon-wrapper">
                <div class="rekam-jejak__paslon">
                    <img src="./assets/pictures/<?= $pas['foto']; ?>" alt="Dummy Pictures" width="250">
                    <h2 class="rekam-jeak__no"><?= "0".$pas["no_urut"]; ?></h2>
                    <h3 class="rekam-jejak__nama"><?= $pas["nama_lengkap"]; ?></h3>
                </div>
            </div>
        </section>
        <section class="berita">
            <?php $index = 0; ?>
            <?php foreach($news as $berita) : ?>
                <div class="berita__container">
                <div class="berita__item">
                    <img class="berita__banner" src="./assets/pictures/<?= $berita['img'];?>" alt="Dummy Image" width="200">
                </div>
                <div class="berita__item">
                    <h1 class="berita__title"><?= $berita['title']; ?></h1>
                    <h2 class="berita__subtitle"><?= $berita['publishedAt'];?></h2>
                    <h2 class="berita__subtitle"><?= $berita['source'];?></h2>
                    <br>
                    <p class="berita__para"><?= $berita['content'];?></p>
                    <br>
                    <?php if ($state) : ?>
                    <a href="detail-rekam-jejak.php?nik=<?= $nik;?>&state=<?= $state;?>&nou=<?= $nou;?>&index=<?= $index;?>" class="berita__link">Selengkapnya</a>
                    <?php else : ?>
                    <a href="detail-rekam-jejak.php?nou=<?= $nou;?>&index=<?= $index;?>" class="berita__link">Selengkapnya</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php $index++; ?>
            <?php endforeach; ?>
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