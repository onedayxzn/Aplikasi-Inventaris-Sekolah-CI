<?php

//Panggil koneksi database
require_once "db/connect.php";

//Ambil kode_barang dari parameter/URL yang akan dijadikan
//penunjuk untuk data yang akan dihapus
if ( isset($_GET["id_barang"]) ){
	$id_barang= $_GET["id_barang"];
}

$delete = mysqli_query($koneksi, "DELETE FROM barang_keluar WHERE id_barang ='$id_barang'");
if ($delete){
	header("Location: admin.php?halaman=keluar_barang");
} else {
	die("Gagal menghapus data! ".mysqli_error($koneksi));
}