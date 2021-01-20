<?php
	//panggil koneksi
	require_once "db/connect.php";
	
	$id_pinjam = $_POST["id_pinjam"]; 
	$peminjam = $_POST["peminjam"]; 
	$tgl_pinjam = $_POST["tgl_pinjam"];
	$id_barang = $_POST["id_barang"];
	$nama_barang = $_POST["nama_barang"];
	$jml_barang = $_POST["jml_barang"];
	$tgl_kembali = $_POST["tgl_kembali"];
	$kondisi = $_POST["kondisi"];
	
	//Masukan Semua Database
	$update = mysqli_query($koneksi, "UPDATE pinjam_barang SET id_pinjam='$id_pinjam', peminjam='$peminjam',tgl_pinjam='$tgl_pinjam', id_barang='$id_barang', nama_barang='$nama_barang', jml_barang='$jml_barang', tgl_kembali='$tgl_kembali', kondisi='$kondisi' WHERE id_pinjam='$id_pinjam'");
	if ($update) {
		header("location: admin.php?halaman=pinjam_barang");
	} else {
		die("Gagal mengubah data! ".mysqli_error($koneksi));
	}
?>	