<div id="page-wrapper">
	
		<div class="row">
			<div class="col-lg-12" style="padding-top: 25px;">
				<h1 class="page-header">Dashboard</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<?php
			//Query
			$barang = mysqli_query($koneksi, "SELECT * FROM barang");
			$stok = mysqli_query($koneksi, "SELECT * FROM stok");
			$barang_masuk = mysqli_query($koneksi, "SELECT * FROM barang_masuk");
			$barang_keluar = mysqli_query($koneksi, "SELECT * FROM barang_keluar");
			$pinjam_barang = mysqli_query($koneksi, "SELECT * FROM pinjam_barang");
			
		    //Ambil hasil query dalam bentuk jumlah data yang ada pada tiap tabel
			$jml_barang = mysqli_num_rows($barang);
			$jumlah_stok = mysqli_num_rows($stok);
			$jml_masuk = mysqli_num_rows($barang_masuk);
			$jml_keluar = mysqli_num_rows($barang_keluar);
			$jml_pinjam = mysqli_num_rows($pinjam_barang);
			

		
		?>
		<div class="row">
			<?php if (isset($_SESSION["username"]) ) { ?>
				<div class="alert alert-success">
					<div class="alert-heading">
						<div class="pull-right">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
						<?php echo "Selamat datang, {$_SESSION['username']}. Anda telah login sebagai {$_SESSION['level']}"?>
					</div>
				</div>
			<?php } ?>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-book fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jml_barang; ?></div>
								<div>Data Barang</div>
							</div>
						</div>
					</div>
					<a href="admin.php?halaman=barang">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-tasks fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jumlah_stok; ?></div>
								<div>Data Stok</div>
							</div>
						</div>
					</div>
					<a href ="admin.php?halaman=stok">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jml_masuk; ?></div>
								<div>Data Masuk Barang</div>
							</div>
						</div>
					</div>
					<a href="admin.php?halaman=masuk_barang">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jml_keluar; ?></div>
								<div>Data Keluar Barang</div>
							</div>
						</div>
					</div>
					<a href="admin.php?halaman=keluar_barang">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
		</div><div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-briefcase fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jml_barang; ?></div>
								<div>Data Suplier</div>
							</div>
						</div>
					</div>
					<a href="admin.php?halaman=suplier">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
				</div><div class="col-lg-3 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $jml_pinjam; ?></div>
								<div>Data Pinjam Barang</div>
							</div>
						</div>
					</div>
					<a href="admin.php?halaman=pinjam_barang">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			
	
	</div>
	<!-- /#page-wrapper -->

