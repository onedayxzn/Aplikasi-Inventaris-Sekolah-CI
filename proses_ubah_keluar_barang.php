<?php
//Panggil koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$tgl_keluar = $_POST["tgl_keluar"];
$jml_keluar = $_POST["jml_keluar"];
$lokasi = $_POST["lokasi"];
$penerima = $_POST["penerima"];


//Masukan semua data ke database
$update = mysqli_query($koneksi, "UPDATE barang_keluar SET id_barang='$id_barang', nama_barang='$nama_barang', tgl_keluar='$tgl_keluar', jml_keluar='$jml_keluar', lokasi='$lokasi, penerima=$penerima' WHERE id_barang='$id_barang'");
if ($update){
	header("location: admin.php?halaman=keluar_barang");
} else {
	die("Gagal mengubah data! ".mysqli_error($koneksi));
}