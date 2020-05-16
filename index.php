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
    $noUrut = [1, 2, 3];
    $paslons = [];
    foreach ($noUrut as $n) {
        $paslons[] = getPaslon($n);
    }
   if ( isset($_POST["coblos"]) ) {
       echo "<script>alert('Login terlebih dahulu untuk melukan pemilihan')</script>";
   }
   if (isset($_GET["pilih"]) == 1) {
        echo "<script>alert('Anda sudah mencoblos!')</script>";
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
        <section class="banner">
            <div class="banner__description">
                <h1 class="banner__title">Pemilu Online</h1>
                <p class="banner__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptates mollitia tenetur excepturi! Delectus animi blanditiis, voluptatum facilis, aliquam ex, repellendus quae consequatur dicta suscipit vel quibusdam atque adipisci consequuntur? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quos delectus quis, culpa sed quisquam minima, expedita mollitia, velit earum totam omnis obcaecati natus veritatis beatae rem incidunt aperiam voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, rem. Dolores consectetur saepe fugiat? Facere, laborum a? Expedita praesentium quod perferendis, quae vitae suscipit sunt odio, quia libero provident voluptate. </p>
            </div>
            <div class="banner__hero">
                <img src="./assets/pictures/vector-portal.svg" alt="Logo Pemilu" width="480">
            </div>
        </section>
        <section class="paslon">
            <?php foreach ($paslons as $paslon) : ?>
                <article class="paslon__item">
                    <div class="paslon__description">
                        <img class="paslon__foto" src="./assets/pictures/<?= $paslon['foto'];?>" alt="Dummy Picture" width="200">
                        <h3 class="paslon__no-urut"><?= "0".$paslon["no_urut"]; ?></h3>
                        <h3 class="paslon__nama"><?= $paslon["nama_lengkap"]; ?></h3>
                        <h3 class="paslon__visi-misi">Visi dan Misi</h3>
                        <p class="paslon__visi-misi-content"><?= $paslon["visi_misi"]; ?></p>
                    </div>
                    <?php if (isset($_SESSION["login"])) : ?>
                    <form action="quick-count.php?nik=<?= $nik;?>&state=<?= $state;?>" class="paslon__actions" method="post">
                        <a href="rekam-jejak.php?nik=<?= $nik;?>&state=<?= $state;?>&nou=<?= $paslon["no_urut"];?>" class="paslon__btn-action" type="submit">REKAM JEJAK</a>
                        <input type="text" name="no_urut" value="<?= $paslon["no_urut"];?>" hidden>
                        <button name="coblos" class="paslon__btn-action" type="submit">COBLOS</button>
                    </form>
                    <?php else : ?>
                    <form action="" class="paslon__actions" method="post">
                        <a href="rekam-jejak.php?nou=<?= $paslon["no_urut"];?>" class="paslon__btn-action" type="submit">REKAM JEJAK</a>
                        <input type="text" name="no_urut" value="<?= $paslon["no_urut"];?>" hidden>
                        <button name="coblos" class="paslon__btn-action" type="submit">COBLOS</button>
                    </form>
                    <?php endif; ?>
                </article>
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