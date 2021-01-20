<?php
//Panggil koneksi
require_once "db/koneksi.php";

//Ambil semua data yang dikirim user melalui form
$id_suplier    = $_POST["id_suplier"];
$nama_suplier    = $_POST["nama_suplier"];
$alamat_suplier  = $_POST["alamat_suplier"];
$telp_suplier    = $_POST["telp_suplier"];
$Kota_suplier    = $_POST["Kota_suplier"];

//Masukan semua data ke database
$insert = mysqli_query($koneksi, "INSERT INTO suplier VALUES('$id_suplier', '$nama_suplier', '$alamat_suplier', '$tlp_suplier', '$Kota_suplier')");
if ($insert){
    header("location: admin.php?halaman=supplier");
} else {
    die("Gagal menambahkan data! ".mysqli_error($koneksi));
}