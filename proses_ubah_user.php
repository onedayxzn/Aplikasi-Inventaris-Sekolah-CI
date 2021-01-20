<?php
	//panggil koneksi
	require_once "db/connect.php";
	
	$id_user   		= $_POST["id_user"]; 
	$nama  			= $_POST["nama"]; 
	$username   	= $_POST["username"]; 
	$password		= $_POST["password"]; 
	$level			= $_POST["level"]; 
	
	//Masukan Semua Database
	$update = mysqli_query($koneksi, "UPDATE user SET id_user='$id_user', nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'");
	if ($update) {
		header("location: admin.php?halaman=user");
	} else {
		die("Gagal mengubah data! ".mysqli_error($koneksi));
	}
?>