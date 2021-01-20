<?php
//Cek apakah user sudah login dengan memeriksa data pada SESSION
//Jika tidak ada SESSION di server maka user akan diminta untuk login
//Dan tidak memiliki hak untuk mengakses halaman ini
session_start();
if ( !isset ($_SESSION["username"]) ){
die("Anda tidak memiliki hak untuk mengakses halaman ini, silahkan <a href='login.php'>login</a> supaya dapat mengakses halaman ini");
}
//Memanggil bagian header/atas wbesite
require_once "header.php";
//Cek apakah halaman diminta pada bagian URL
//Contoh : admin.php?halaman=barang
if ( isset($_GET["halaman"]) ){
	$halaman = $_GET["halaman"];
	
//Cek apakah halaman tersedia
if ( file_exists("{$halaman}.php") ){
	//Panggil koneksi dan masuk ke halaman yang diminta
	require_once "db/koneksi.php";
	require_once "{$halaman}.php";
} else {
	//Panggil halaman error apabila memasukan halaman yang tidak tersedia
	require_once "error.php";
}

} else {
require_once"dashboard.php";
}

//Memanggil bagian footer/bawah website
require_once "footer.php";
?>