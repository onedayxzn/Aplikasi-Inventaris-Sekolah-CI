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
$update = mysqli_query($koneksi, "UPDATE barang_masuk SET id_barang='$id_barang', nama_barang='$nama_barang', tgl_masuk='$tgl_masuk', jml_masuk='$jml_masuk', id_suplier='$id_suplier'  WHERE id_barang='$id_barang'");
if ($update){
	header("Location: admin.php?halaman=masuk_barang");
} else {
	die("Gagal mengubah data! ".mysqli_error($koneksi));
}