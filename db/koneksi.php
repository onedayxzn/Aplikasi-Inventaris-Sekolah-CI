<?php

//Data untuk koneksi ke database
$host = "localhost";
$user = "root";
$pass = ""; //Password kosong, diisi dengan string kosong
$db   = "sarana_prasarana_smk_sukma"; //Nama database

//Mulai koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

//Cek koneksi
if (mysqli_connect_error()){
    //Apabila tidak terkoneksi, maka hentikan script dan tampilkan pesan error
    die("Gagal terkoneksi ke database! ".mysqli_connect_error($koneksi));
}