<?php
//Panggil koneksi
require_once "db/koneksi.php";

//Ambil semua data yang dikirim user melalui form
$id_suplier    = $_POST["id_suplier"];
$nama_suplier    = $_POST["nama_suplier"];
$alamat_suplier  = $_POST["alamat_suplier"];
$telp_suplier    = $_POST["telp_suplier"];

//Ubah data yang sudah dimasukan ke database
$update = mysqli_query($koneksi, "UPDATE suplier SET id_suplier='$id_suplier',  nama_suplier='$nama_suplier', alamat_suplier='$alamat_suplier', telp_suplier='$telp_suplier'  WHERE id_suplier='$id_suplier'");
if ($update){
    header("location: admin.php?halaman=suplier");
} else {
    die("Gagal mengubah data!".mysqli_error($koneksi));
}