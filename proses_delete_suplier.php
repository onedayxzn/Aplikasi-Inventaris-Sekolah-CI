<?php

//Panggil koneksi database
require_once "db/connect.php";

//Ambil Kode_suplier dari parameter/URL yang akan dijadikan
//penunjuk untuk data yang akan dihapus
if ( isset($_GET["id_suplier"]) ){
$id_suplier = $_GET["id_suplier"];
}

$delete = mysqli_query($koneksi, "DELETE FROM suplier WHERE id_suplier = '$id_suplier'");
if ($delete){
	header("Location: admin.php?halaman=suplier");
} else {
	die("Gagal menghapus data! ".mysqli_error($koneksi));
}