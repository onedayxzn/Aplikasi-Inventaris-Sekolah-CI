
<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	   <title>Halaman Admin |Aplikasi Sarana Dan Prasarana SMK</title>
	<!-- Bootstrap Core CSS -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
	<link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">
	<!-- Costum CSS -->
	<link href="assets/css/sb-admin-2.css" rel="stylesheet">
	<!-- Costum Fonts -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  
  <body>
  
  <div id="wrapper">
  
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="sr-only">Toggle Navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" >Aplikasi Sarana Dan Prasarana SMK</a>
		  </div>
		  <!-- /.navbar-header -->
		  
		  <ul class="nav  navbar-top-links navbar-right">
		  <li class="dropdown">
		  <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
		  <?php if (isset($_SESSION["username"])) { echo $_SESSION["username"]; } ?><i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
		  </a>
		  <ul class="dropdown-menu dropdown-user">
		    <li><a href="?halaman=user"><i class="fa fa-user fa-fw"></i> User Profile</a>
			</li>
			<li class="divider"></li>
			<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
			</ul>
			<!-- / .dropdown-user -->
			</li>
			<!-- / .dropdown -->
			</ul>
			<!-- / .navbar-top-links -->
			
			<div class="navbar-default sidebar" role="navigation" style="position: fixed;">
			<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
			<li class="sidebar-search">
			<form method="post">
			<div class="input-group custom-search-form">
			<input type="text" class="form-control" name="cari" value="<?php echo isset($_POST['cari'])?$_POST['cari']:''?>" placeholder="Search...">
			<span class="input-group-btn">
			<button class="btn btn-default" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</span>
			</div
			</form>
			<!-- /input-group -->
			</li>
			<li>
			<a href="?halaman=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			<li>
			<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Data Master <span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
			<li>
			<a href="?halaman=barang"><span class="glyphicon glyphicon-book"></span>Data Barang</a>
			</li>
			<li>
			<a href="?halaman=user"><span class="glyphicon glyphicon-user"></span>Data User</a>
			</li>
			<li>
			<a href="?halaman=suplier"><span class="glyphicon glyphicon-briefcase"></span>Data Supplier</a>
			</li>
			<li>
			<a href="?halaman=masuk_barang"><span class="glyphicon glyphicon-import"></span>Data Barang Masuk</a>
			</li>
			<li>
			<a href="?halaman=pinjam_barang"><span class="glyphicon glyphicon-shopping-cart"></span>Data Pinjam Barang</a>
			</li>
			<li>
			<a href="?halaman=keluar_barang"><span class="glyphicon glyphicon-export"></span>Data Barang Keluar</a>
			</li>
			<li>
			<a href="?halaman=stok"><span class="glyphicon glyphicon-tasks"></span>Data Stok</a>
			</li>
			</ul>
			<!-- / .nav-second-level -->
			</li>
			</ul>
			</div>
			<!-- / .sidebar-collapse -->
			</div>
			<!-- /.navbar-fixed-side -->
			</nav>
			