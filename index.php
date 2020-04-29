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
                <li class="nav__li"><img class="nav__img" src="./assets/pictures/logo-copas.png" alt="Logo Copas"></li>
                <li class=" nav__li"><a class="nav__a" href="#">Beranda</a></li>
                <li class="nav__li"><a class="nav__a" href="#">Quick Count</a></li>
                <li class="nav__li"><a class="nav__a" href="bantuan.php">Bantuan</a></li>
                <li class="nav__li"><a class="nav__a" href="log in.php">Masuk</a></li>
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
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <article class="paslon__item">
                    <div class="paslon__description">
                        <img class="paslon__foto" src="./assets/pictures/dummy01.jpg" alt="Dummy Picture" width="200">
                        <h3 class="paslon__no-urut"><?= "0" . $i; ?></h3>
                        <h3 class="paslon__nama">Lorem-Ipsum</h3>
                        <h3 class="paslon__visi-misi">Visi dan Misi</h3>
                        <p class="paslon__visi-misi-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nostrum? Maxime provident, repellendus atque quia ipsam ducimus, deserunt quasi odit culpa cum ea officia vitae dolorem ullam odio autem labore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, sint aut. Maxime enim at libero natus laudantium ipsam maiores, impedit perspiciatis similique dolorem quisquam dolor expedita doloribus et illo. Cum.</p>
                    </div>
                    <form class="paslon__actions" action="" method="POST">
                        <a href="rekam-jejak.php" class="paslon__btn-action" type="submit">REKAM JEJAK</a>
                        <button class="paslon__btn-action" type="submit">COBLOS</button>
                    </form>
                </article>
            <?php endfor; ?>
        </section>
    </main>
</body>

</html>