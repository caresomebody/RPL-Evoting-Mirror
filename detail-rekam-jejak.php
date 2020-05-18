<?php
    session_start();
    include("evoting-config.php");
    include("evoting-functions.php");
    $id_komen;
    if (isset($_GET["state"])) {
        $nik = $_GET["nik"];
        $user = getUser($nik);
        $state = true;
    } else {
        $state = false;
    }
    if (isset($_POST["komentar"])) {
        if (isset($_SESSION["login"])) {
            if (tambahKomentar($nik)) {
                echo "<script>alert('Berhasil menambahkan komentar')</script>";
            } else {
                echo "<script>alert('GAGAL menambahkan komentar')</script>";         
            }    
        } else {
            echo "<script>alert('Login terlebih dahulu untuk memberikan komentar')</script>";
        }
    } 
    // Get Berita!
    if (isset($_GET["nou"])) {
        $noState = $_GET["nou"];
        $no_u = $noState + 1;
    }
    $news = file_get_contents("news-api/json/no-urut-0$no_u.json");
    $news = json_decode($news, true);
    $news = $news['articles'];
    if (isset($_GET["index"])) {
        $no = $_GET["index"];
        $berita = $news["$no"];
    }
    // =========== GET ALL DATABASE ===========//
    $query_komentar = pg_query("SELECT * FROM komentar");
    // =========== GET ALL DATABASE ===========//
    if (isset($_POST["sunting"])) {
        var_dump($no_u);
        if (updateKomentar($_POST["idKomentar"])) {
            header("Location: detail-rekam-jejak.php?nik=$nik&state=$state&nou=$noState&index=$no");
        } else {
            echo "<script>alert('Komentar gagal disunting!')</script>";
        }
    }
    if (isset($_POST["hapus"])) {
        var_dump($no_u);
        if (hapusKomentar($_POST["idKomentar"])) {
            header("Location: detail-rekam-jejak.php?nik=$nik&state=$state&nou=$noState&index=$no");
        } else {
            echo "<script>alert('Komentar gagal dihapus!')</script>";
        }
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
    <link rel="stylesheet" href="./styles/detail-rekam-jejak.css">
    <title>E-Voting - Home Page</title>
    <style>
        .isi_komen,
        .info_komen {
            margin : 1rem 0;
        }
        .isi_komen {
            width: 100%;
            padding: 1rem;
            resize: none;
        }
        .komen--disabled {
            cursor: no-drop;
        }
        .allcoments {
            margin: 4rem 0;
        }
        .ipt-koment {
            padding: 1rem;
            font-size: 2rem;
            border: .2rem solid grey;
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
        <section class="view-news">
            <h1 class="view-news__title"><?= $berita["title"]; ?></h1>
            <h1 class="view-news__source">Sumber : <?= $berita["source"]; ?></h1>
            <div class="view-news__banner-wrapper">
                <img src="./assets/pictures/<?= $berita['img']; ?>" alt="Media" class="view-news__banner" width="260">
            </div>
            <p class="view-news__para">
                <?= $berita["content"]; ?>
            </p>
        </section>
        <section class="comments">
            <h1 class="comments__title">
                Komentar Netizen
            </h1>
           <div class="comments__field-wrapper">
              <form action="" method="post">
                    <textarea class="comments__field" placeholder="Tulis komentar Anda di sini..." name="konten" id="comment" cols="30" rows="10" required></textarea>
                    <br>
                    <div class="comments__btn-wrapper">
                        <button name="komentar" class="comments__btn">Kirim</button>
                    </div>
              </form>
           </div>
           <div>
                <h1 class="allcoments">Semua Komentar yang masuk dari semua berita!</h1>
            </div>
           <?php while($komens = pg_fetch_assoc($query_komentar)) : ?>
           <?php 
                $nik_komentar = $komens["nik"];
                $query_pemilih = pg_query("SELECT * FROM pemilih WHERE nik = '$nik_komentar'");
                $row = pg_fetch_assoc($query_pemilih)
            ?>
            <form class="comments__user" action="" method="post">
               <div class="comments__data">
                   <span class="comments__photo-wrapper">
                       <img class="comments__photo" src="./assets/pictures/<?= $row['foto'];?>" alt="photo" width="32">
                   </span>
                   <span class="comments__history-wrapper">
                       <h2 class="comments__user-name"><?= $row['nama_lengkap'];?></h2>
                       <h2 class="comments__user-time"><?= $komens['waktu'];?></h2>
                       <input type="text" name="idKomentar" value="<?= $komens['id_komentar'];?>" hidden>
                   </span>
               </div>
                <?php if ($state && $nik_komentar == $nik) : ?>
                <p class="info_komen">Komentar Anda : </p>
                <textarea class="isi_komen" name="konten_komentar" id="10" cols="30" rows="10"><?= $komens['konten'];?></textarea>
                <div class="user__action">
                    <button name="sunting" class="user__update">Sunting</button>
                    <button name="hapus" class="user__delete">Hapus</button>
                </div>
                <?php else : ?>
                <p class="info_komen">Komentar Orang Lain : </p>
                <textarea disabled class="isi_komen  komen--disabled" name="konten_komentar" id="10" cols="30" rows="10"><?= $komens['konten'];?></textarea>
                <?php endif; ?>
           </form>
           <?php endwhile; ?>
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