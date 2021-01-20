
<?php
//Panggil Koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$spesifikasi = $_POST["spesifikasi"];
$lokasi= $_POST["lokasi"];
$kondisi = $_POST["kondisi"];
$jml_barang = $_POST["jml_barang"];
$sumber_dana = $_POST["sumber_dana"];

//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO barang VALUES('$id_barang', '$nama_barang', '$spesifikasi', '$lokasi', '$kondisi', '$jml_barang', '$sumber_dana')");
if ($insert){
header("location: admin.php?halaman=barang");
} else {
die("Gagal menambahkan data! ".mysqli_error($koneksi));
}