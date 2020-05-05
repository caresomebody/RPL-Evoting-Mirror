<?php
    $db = pg_connect('host=localhost dbname=evoting user=postgres password=postgres');
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
?>