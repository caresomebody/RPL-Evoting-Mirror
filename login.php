<?php
    session_start();
    include("evoting-config.php");
    include("evoting-functions.php");
    if ( isset($_POST["submit"]) ) {
        if (login()) {
            $_SESSION["login"] = true;
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Anda GAGAL lOGIN')</script>";
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
    <link rel="stylesheet" href="./styles/masuk.css">
    <title>E-Voting - Masuk</title>
</head>

<body>
    <main>
        <div class=logo-img>
                <img src="./assets/pictures/logo.svg" alt="Logo Chopas" width="60">
         </div>
        <div class=text>
            <h1>Masuk ke CHOPAS</h1>
        </div>
        <br>
        <div class="tabel">
           <form action="" method="post">
                <table class="card">
                    <tr>
                        <td id="desk">NIK</td>
                    </tr>
                    <tr>
                        <td><input name="nik" type="text" placeholder="" class="input" maxlength="100" required></td>
                    </tr>
                    <tr>
                        <td id="deskk">PIN</td>
                    </tr>
                    <tr>
                        <td><input name="pin" type="password" class="inputpw" required /></td>
                    </tr>
                    <tr id=submit>
                        <td><button name="submit" class="submit__btn-action" type="submit">MASUK</button></td>
                    </tr>
                </table>
           </form>
        </div>
        <br>
        <div class="daftar">
            <h2>Belum terdaftar? <a class=buat href="register.php">Buat Akun</a> </h2>
        </div>
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