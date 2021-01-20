<?php
	//panggil koneksi
	require_once "db/connect.php";
	
	$id_user   		= $_POST["id_User"]; 
	$nama   		= $_POST["nama"]; 
	$username   	= $_POST["username"]; 
	$password		= $_POST["password"]; 
	$level			= $_POST["level"]; 
	
	//Masukan Semua Database
	$insert = mysqli_query($koneksi, "INSERT INTO user VALUES('$id_user', '$nama', '$username', '$password', '$level')");
	if ($insert) {
		header("location: admin.php?halaman=user");
	} else {
		die("Gagal menambah data! ".mysqli_error($koneksi));
	}
?>