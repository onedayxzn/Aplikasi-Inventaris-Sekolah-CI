<?php

//Panggil koneksi database
require_once "db/connect.php";

if(isset($_GET["id_barang"]) ){
	$id_barang = $_GET["id_barang"];
}

$delete = mysqli_query($koneksi, "DELETE FROM stok WHERE id_barang = '$id_barang'");
if ($delete) {
	header("location: admin.php?halaman=stok");
} else {
	die("Gagal menghapus data! ".mysqli_error($koneksi));
}