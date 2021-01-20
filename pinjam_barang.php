<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12" style="padding-top: 25px;">
			<h1 class="page-header"> Data Pinjam Barang </h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="padding: 15px;">
			<a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success hide-on-print"><i class="fa fa-plus"></i> Tambah Data </a>
			<div class="pull-right">
				<a href="cetak_data_pinjam_barang.php" class="btn btn-warning hide-on-print"><i class="fa fa-print"></i> Cetak Data </a>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bar-chart-o fa-fw"></i> Data Pinjam Barang
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>ID Pinjam</th>
							<th>peminjam</th>
							<th>Tanggal Pinjam</th>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Jumlah pinjam</th>
							<th>tgl_kembali</th>
							<th>kondisi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql   = "SELECT * FROM pinjam_barang";
						$query = mysqli_query($koneksi, $sql);
						
						while( $pinjam_barang = mysqli_fetch_array($query, MYSQL_ASSOC) ){
						?>
							<tr>
								<td><?php echo $pinjam_barang["id_pinjam"]; ?></td>
								<td><?php echo $pinjam_barang["peminjam"]; ?></td>
								<td><?php echo $pinjam_barang["tgl_pinjam"]; ?></td>
								<td><?php echo $pinjam_barang["id_barang"]; ?></td>
								<td><?php echo $pinjam_barang["nama_barang"]; ?></td>
								<td><?php echo $pinjam_barang["jml_barang"]; ?></td>
								<td><?php echo $pinjam_barang["tgl_kembali"]; ?></td>
								<td><?php echo $pinjam_barang["kondisi"]; ?></td>
								<td style="min-width: 175px;"> 
									<a data-target="#modal-edit-data<?php echo $pinjam_barang["id_pinjam"]; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-pencil"></i> Edit </a>
									<a data-target="#modal-hapus-data<?php echo $pinjam_barang["id_pinjam"]; ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </a>
								</td>
							</tr>
						<?php } //Endwhile ?>
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
	
<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Pinjam Barang</h4>
			</div>
			<div class="modal-body">
				<?php
					$query = mysqli_query($koneksi, "SELECT MAX(id_pinjam)+1 AS id_baru FROM pinjam_barang");
					$id_baru = mysqli_fetch_array($query, MYSQLI_ASSOC);
				?>
				<form class="form-horizontal" method="POST" action="proses_tambah_pinjam_barang.php">
					<div class="form-group">
						<label class="control-label col-md-3">ID Pinjam</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_pinjam" placeholder="Id Pinjam" value="<?php echo $id_baru["id_baru"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Peminjam</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="peminjam" placeholder="peminjam">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">tanggal pinjam</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tgl_pinjam" placeholder="tanggal Pinjam">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">ID Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_barang" placeholder="id barang ">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Nama Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama_barang" placeholder="nama barang">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Pinjam</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="jml_pinjam" placeholder="Jumlah pinjam">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Tanggal Kembali</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tgl_kembali" placeholder="tanggal kembali">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Kondisi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="kondisi" placeholder="kondisi">
						</div>
					</div>
				</div><!-- Modal Body -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<?php
		$sql 	= "SELECT * FROM pinjam_barang";
		$query  = mysqli_query($koneksi, $sql);
		
		while( $pinjam_barang = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
			$id_pinjam = $pinjam_barang["id_pinjam"];
	?>
	
	<!-- MODAL EDIT DATA -->
	<div class="modal fade" id="modal-edit-data<?php echo $id_pinjam ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Pinjam Barang</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="proses_ubah_pinjam_barang.php">
<div class="form-group">
<label class="control-label col-md-3">ID Pinjam</label>
<div class="col-md-9">
<input type="text" class="form-control" name="id_pinjam" placeholder="ID pinjam" value="<?php echo $pinjam_barang["id_pinjam"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Peminjam</label>
<div class="col-md-9">
<input type="text" class="form-control" name="peminjam" placeholder="peminjam" value="<?php echo $pinjam_barang["peminjam"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Tanggal Pinjam</label>
<div class="col-md-9">
<input type="text" class="form-control" name="tgl_pinjam" placeholder="Spesifikasi" value="<?php echo $pinjam_barang["tgl_pinjam"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">ID Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="id_barang" placeholder="id barang" value="<?php echo $pinjam_barang["id_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Nama Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="nama_barang" placeholder="nama_barang" value="<?php echo $pinjam_barang["nama_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Jumlah Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" value="<?php echo $pinjam_barang["jml_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Tanggal kembali</label>
<div class="col-md-9">
<input type="text" class="form-control" name="tgl_kembali" placeholder="tanggal kembali" value="<?php echo $pinjam_barang["tgl_kembali"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Kondisi</label>
<div class="col-md-9">
<input type="text" class="form-control" name="kondisi" placeholder="kondisi" value="<?php echo $pinjam_barang["kondisi"]; ?>">
</div>
</div>
							</div><!-- Modal Body -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-primary">Ubah</button>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>
	
	<!-- Modal Hapus Data -->
	<div class="modal fade" id="modal-hapus-data<?php echo $id_pinjam ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-bar-chart-o fa-fw"></i>Hapus Data Barang Pinjam</h4>
				</div>
				<div class="modal-body">
					<p> Apakah anda yakin akan menghapus data ini ?</p>
					<p>Data yang di hapus <b>tidak dapat</b> dikembalikan lagi seperti semula</p>
				</div><!-- Modal Body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
					<a href="proses_delete_pinjam_barang.php?id_pinjam=<?php echo $id_pinjam; ?>" class="btn btn-danger">Hapus</a>
				</div>
			</div>
		</div>
	</div>

		<?php } //Endwhile ?>
</div>
<!-- /.page-wrapper -->
</div>