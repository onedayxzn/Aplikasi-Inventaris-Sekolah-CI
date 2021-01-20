<?php

require_once "db/connect.php";

//Ambil data yang user masukan untuk login
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username'";

//Cek apakah data yang user masukan sesuai dengan yang tersimpan di database
$query = mysqli_query($koneksi, $sql);
if ($query){
	//Ambil data user yang sedang login pada database
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	//Mencocokan password
	if ( password_verify($password, $data["password"]) ){
	
	//Ubah kode level dari database menjadi bentuk yang lebih jelas
	//Kode level
	// 1 => Admin
	// 2 => Operator
	if ($data["level"] == 1){
		$data["level"] = "Admin";
	} else if ($data["level"] == 2){
		$data["level"] = "Operator";
	}
		//Simpan data user yang sudah login pada SESSION
		session_start();
		$_SESSION = array(
			"id_User" => $data["id_User"],
			"nama" => $data["nama"],
			"username" => $data["username"],
			"level" => $data["level"]
		);
		//Alihkan user ke halaman admin
		header("Location: admin.php?halaman=dashboard");
	} else {
		echo "Password tidak cocok";
	}
	
} else {
	echo "Username dan password salah".mysqli_error($koneksi);
}