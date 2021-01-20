
<?php
//Panggil Koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$jml_masuk = $_POST["jml_masuk"];
$jml_keluar = $_POST["jml_keluar"];
$total_brg = $_POST["total_brg"];

//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO stok VALUES('$id_barang', '$nama_barang', '$nama_brg', '$jml_masuk', '$jml_keluar', '$total_brg')");
if ($insert) {
header("location: admin.php?halaman=stok");
} else {
die("Gagal menambahkan data! ".mysqli_error($koneksi));
}