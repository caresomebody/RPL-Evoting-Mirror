<?php
    $db = pg_connect('host=localhost dbname=evoting user=postgres password=postgres');
    // ===========FUNGSI GET USERS DATA==============
    function getUser ($nik) {
        global $db;
        $query = pg_query("SELECT * FROM pemilih 
        WHERE nik = '$nik'");
        $user = pg_fetch_assoc($query);
        return $user;
    }

    // ===========FUNGSI REGISTER==============
    function register () {
        global $db;
        $nik = $_POST["nik"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $kota = $_POST["kota"];
        $provinsi = $_POST["provinsi"];
        $pin = $_POST["pin"];
        $query = pg_query("INSERT INTO pemilih 
        (nik, nama_lengkap, tanggal_lahir, kota, provinsi, pin, foto) VALUES
        ('$nik', '$nama_lengkap', '$tanggal_lahir', '$kota', '$provinsi', '$pin', '')");
        if( $query==TRUE ) {
            return 1;
        } else {
            return 0;
        }
    }

    // ===========FUNGSI LOGIN==============
    function login () {
        global $db;
        $nik = $_POST["nik"];
        $pin = $_POST["pin"];
        $query = pg_query("SELECT * FROM pemilih 
        WHERE nik = '$nik'");
        $user = pg_fetch_assoc($query);
        $nikDB = $user["nik"];
        $pinDB = $user["pin"];
        if ( $nik === $nikDB && $pin === $pinDB ) {
            return 1;
        } else {
            return 0;
        }
    }
    function belumLogin () {
        if (!$_SESSION["login"]) {
            header("Location: login.php");
            exit;
        }
    }
    
    // ===========FUNGSI LOGOUT==============
    function logout () {
        if (isset($_POST["logout"])) {
            $st = false;
            $_SESSION = [];
            session_destroy();
            session_unset();
            setcookie("id", "", time() - 3600);
            setcookie("key", "", time() - 3600);
            header("Location: index.php");
        }
    }

    // ===========FUNGSI UPDATE USER ==============
    function updateUser () {
        global $db;
        $nik = $_POST["nik"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $kota = $_POST["kota"];
        $provinsi = $_POST["provinsi"];
        $pin = $_POST["pin"];
        $query = pg_query("UPDATE pemilih SET
        nik = '$nik',
        nama_lengkap = '$nama_lengkap',
        tanggal_lahir = '$tanggal_lahir',
        kota = '$kota',
        provinsi = '$provinsi' 
        WHERE nik = '$nik' ");
        if( $query == TRUE ) {
            return 1;
        } else {
            return 0;
        }
    }

    // FUNGSI UPDATE FOTO

    function updateFoto ($nik) {
        global $db;
        $nama = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $status = $_FILES['foto']['error'];
        $tmp = $_FILES['foto']['tmp_name'];
        if ($status === 4) {
            echo "<script>alert('Tidak ada data yang ditambahkan')</script>";
            return 0;
        }
        $listEkstensi = ['jpg', 'jpeg', 'png'];
        $ekstensi = explode('.', $nama);
        $ekstensi = strtolower(end($ekstensi));
        if (!in_array($ekstensi, $listEkstensi)) {
            echo "<script>alert('Yang anda masukan bukan Foto');</script>";
            return 0;
        }
        if ($ukuran > 1000000 || !$ukuran) {
            echo "<script>alert('Ukuran anda terlalu besar, jangan lebih dari 1MB')</script>";
            return 0;
        }
        move_uploaded_file($tmp, 'assets/pictures/'.$nama);
        $query = pg_query("UPDATE pemilih SET
        foto = '$nama' 
        WHERE nik = '$nik'");
        if( $query==TRUE ) {
            return 1;
        } else {
            return 0;
        }
    }

?>