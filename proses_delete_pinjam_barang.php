<?php

//Panggil koneksi database
require_once "db/connect.php";

if(isset($_GET["id_pinjam"]) ){
	$id_pinjam = $_GET["id_pinjam"];
}

$delete = mysqli_query($koneksi, "DELETE FROM pinjam_barang WHERE id_pinjam = '$id_pinjam'");
if ($delete) {
	header("location: admin.php?halaman=pinjam_barang");
} else {
	die("Gagal menghapus data! ".mysqli_error($koneksi));
}