<?php
//Panggil koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$tgl_masuk = $_POST["tgl_masuk"];
$jml_masuk = $_POST["jml_masuk"];
$id_suplier = $_POST["id_suplier"];


//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO barang_masuk VALUES('$id_barang', '$nama_barang', '$tgl_masuk', '$jml_masuk',)");
if ($insert) {
	header("location: admin.php?halaman=masuk_barang");
} else {
	die("Gagal menambahkan data! ".mysqli_error($koneksi));
}