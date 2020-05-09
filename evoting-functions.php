<?php
    $db = pg_connect('host=localhost dbname=evoting user=postgres password=admin');

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
        (nik, nama_lengkap, tanggal_lahir, kota, provinsi, pin) VALUES
        ('$nik', '$nama_lengkap', '$tanggal_lahir', '$kota', '$provinsi', '$pin')");
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
            $_SESSION = [];
            session_destroy();
            session_unset();
            setcookie("id", "", time() - 3600);
            setcookie("key", "", time() - 3600);
            header("Location: login.php");
        }
    }
?>