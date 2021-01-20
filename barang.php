

<div id="page-wrapper">

	<div class="row">
		<div class="col-md-12" style="padding-top: 25px;">
			<h1 class="page-header">Data Barang</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="padding: 15px;">
			<a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success hide-on-print"> <i class="fa fa-plus"></i> Tambah Data </a>
			<div class="pull-right">
				<a href="cetak_data_barang.php" class="btn btn-warning hide-on-print"> <i class="fa fa-print"></i> Cetak Data </a>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bar-chart-o fa-fw"></i> Data Barang
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Id Barang</th>
							<th>Nama Barang</th>
							<th>Spesifikasi</th>
							<th>Lokasi</th>
							<th>Kondisi</th>
							<th>Jumlah Barang</th>
							<th>Sumber Dana</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "SELECT * FROM barang";
					$query = mysqli_query($koneksi, $sql);
					
					while( $barang = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
					?>
						<tr>
							<td><?php echo $barang["id_barang"]; ?></td>
							<td><?php echo $barang["nama_barang"]; ?></td>
							<td><?php echo $barang["spesifikasi"]; ?></td>
							<td><?php echo $barang["lokasi"]; ?></td>
							<td><?php echo $barang["kondisi"]; ?></td>
							<td><?php echo $barang["jml_barang"]; ?></td>
							<td><?php echo $barang["sumber_dana"]; ?></td>
							<td style="min-width: 175px;">
								<a data-target="#modal-edit-data<?php echo $barang["id_barang"]; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
								<a data-target="#modal-hapus-data<?php echo $barang["id_barang"]; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
				<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Barang</h4>
			</div>
			<div class="modal-body">
				<?php
					$query = mysqli_query($koneksi, "SELECT MAX(id_barang)+1 AS id_baru FROM barang");
					$id_baru = mysqli_fetch_array($query, MYSQLI_ASSOC);
				?>
				<form class="form-horizontal" method="POST" action="proses_tambah_barang.php">
					<div class="form-group">
						<label class="control-label col-md-3">ID Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_barang" placeholder="Id Barang" value="<?php echo $id_baru["id_baru"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" autofocus>
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Spesifikasi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Lokasi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Kondisi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="kondisi" placeholder="Kondisi">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Sumber Dana</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="sumber_dana" placeholder="Sumber Dana">
						</div>
					</div>
				</div><!-- Modal Body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$sql = "SELECT * FROM barang";
$query = mysqli_query($koneksi, $sql);

while( $barang = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
	$id_barang = $barang["id_barang"];
?>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?php echo $id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Barang</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="proses_ubah_barang.php">
<div class="form-group">
<label class="control-label col-md-3">ID Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="id_barang" placeholder="ID Barang" value="<?php echo $barang["id_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Nama Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $barang["nama_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Spesifikasi</label>
<div class="col-md-9">
<input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi" value="<?php echo $barang["spesifikasi"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Lokasi</label>
<div class="col-md-9">
<input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="<?php echo $barang["lokasi"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Kondisi</label>
<div class="col-md-9">
<input type="text" class="form-control" name="kondisi" placeholder="Kondisi" value="<?php echo $barang["kondisi"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Jumlah Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" value="<?php echo $barang["jml_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Sumber Dana</label>
<div class="col-md-9">
<input type="text" class="form-control" name="sumber_dana" placeholder="Sumber Dana" value="<?php echo $barang["sumber_dana"]; ?>">
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


<!-- Modal Hapus Data -->
<div class="modal fade" id="modal-hapus-data<?php echo $id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Barang</h4>
</div>
<div class="modal-body">
<p> Apakah anda yakin akan menghapus data ini? </p>
<p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
</div><!-- Modal Body -->
<div class="modal-footer">
<button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
<a href="proses_hapus_barang.php?id_barang=<?php echo $id_barang; ?>" class="btn btn-danger">Hapus</a>
</div>
</div>
</div>
</div>

<?php } //Endwhile ?>

</div>
<!-- /.page-wrapper -->