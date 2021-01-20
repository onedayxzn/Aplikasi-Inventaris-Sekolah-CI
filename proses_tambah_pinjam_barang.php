<?php
//Panggil koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_pinjam = $_POST["id_pinjam"];
$peminjam = $_POST["peminjam"];
$tgl_pinjam = $_POST["tgl_pinjam"];
$id_barang = $_POST["id_barang"];
$nama_barang = $_POST["nama_barang"];
$jml_pinjam = $_POST["jml_pinjam"];
$tgl_kembali = $_POST["tgl_kembali"];
$kondisi = $_POST["Kondisi"];

//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO pinjam_barang VALUES('$id_pinjam', '$peminjam', '$tgl_pinjam', '$id_barang', '$nama_barang', '$jml_pinjam', '$tgl_kembali', '$kondisi')");
if ($insert) {
header("location: admin.php?halaman=pinjam_barang");
} else {
die("Gagal menambahkan data! ".mysqli_error($koneksi));
}