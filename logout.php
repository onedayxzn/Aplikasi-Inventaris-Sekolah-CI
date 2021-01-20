<?php

session_start();

//Hapus semua data yang disimpan di SESSION ketika user lgout
if (session_destroy() ) {
//Pindah user ke halaman login
header("location: login.php");
}