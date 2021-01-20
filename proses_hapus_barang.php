
<?php

//Panggil koneksi database
require_once "db/connect.php";

//Ambil kode_barang dari parameter/URL yang akan dijadikan
//Penunjuk untuk data yang akan dihapus
if ( isset($_GET["id_barang"]) ){
$id_barang = $_GET["id_barang"];
}

$delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_barang'");
if ($delete){
header("location: admin.php?halaman=barang");
} else {
die("Gagal menghapus data! ".mysqli_error($koneksi));
}