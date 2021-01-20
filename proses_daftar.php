<?php

require_once "db/connect.php";

//Ambil semua data yang dikirim user
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];
$level = $_POST["level"];

if (empty($nama) || empty($username) || empty($password) ){
	die("Semua data harus diisi! cobalah untuk memeriksa kembali data yang belum diisi..");
}

//Hash password sebelum disimpan kedalam database
if ($password_hashed = password_hash($password, PASSWORD_BCRYPT) ){
	$sql = "INSERT INTO user VALUES(NULL, '$nama', '$username', '$password_hashed', '$level')";
	//Masukan data ke database
	$query = mysqli_query($koneksi, $sql);
	
	if ($query){
		echo "Daftar akun berhasil! Silahkan login <a href='login.php'>disini</a>";
	} else {
		echo "Gagal mendaftar!".mysqli_error($koneksi);
	}
}