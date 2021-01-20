<?php

//Panggil koneksi database
require_once "db/connect.php";

if(isset($_GET["id_user"]) ){
	$id_user = $_GET["id_user"];
}

$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
if ($delete) {
	header("location: admin.php?halaman=user");
} else {
	die("Gagal menghapus data! ".mysqli_error($koneksi));
}