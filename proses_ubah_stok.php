<?php
//Panggil Koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$jml_masuk = $_POST["jml_masuk"];
$jml_keluar = $_POST["jml_keluar"];
$total_barang= $_POST["total_barang"];

//Masukan semua data ke database
$update = mysqli_query($koneksi, "UPDATE stok SET id_barang='$id_barang', nama_barang='$nama_barang', jml_masuk='$jml_masuk', jml_keluar='$jml_keluar',  total_barang='$total_barang' WHERE id_barang='$id_barang'");
if ($update){
header("location: admin.php?halaman=stok");
} else {
die("Gagal mengubah data! ".mysqli_error($koneksi));
}