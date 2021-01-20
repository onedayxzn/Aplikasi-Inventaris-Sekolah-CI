<?php
//Panggil koneksi
require_once "db/connect.php";

//Ambil semua data yang dikirim user melalui form
$id_brg_keluar = $_POST["Id_brg_keluar"];
$kode_barang = $_POST["Kode_barang"];
$nama_brg = $_POST["Nama_brg"];
$tgl_keluar = $_POST["Tgl_keluar"];
$penerima = $_POST["Penerima"];
$jml_brg_keluar = $_POST["Jml_brg_keluar"];
$keperluan = $_POST["Keperluan"];


//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO masuk_barang VALUES('$id_brg_keluar', '$kode_barang', '$nama_brg', '$tgl_keluar', '$penerima', '$jml_brg_keluar', '$keperluan')");
if ($insert) {
	header("location: admin.php?halaman=keluar_barang");
} else {
	die("Gagal menambahkan data! ".mysqli_error($koneksi));
}