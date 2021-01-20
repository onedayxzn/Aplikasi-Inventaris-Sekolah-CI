
<div id="page-wrapper">

	<div class="row">
		<div class="col-md-12" style="padding-top: 25px;">
			<h1 class="page-header">Data Keluar Barang</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="padding: 15px;">
			<a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success hide-on-print"> <i class="fa fa-plus"></i> Tambah Data </a>
			<div class="pull-right">
				<a href="cetak_data_keluar_barang.php" class="btn btn-warning hide-on-print"> <i class="fa fa-print"></i> Cetak Data </a>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bar-chart-o fa-fw"></i> Data Keluar Barang
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Id barang</th>
							<th>Nama barang</th>
							<th>Tanggal keluar</th>
							<th>Jumlah Keluar</th>
							<th>lokasi</th>
							<th>penerima</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = "SELECT * FROM barang_keluar";
					$query = mysqli_query($koneksi, $sql);
					
					while( $keluar_barang = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
					?>
						<tr>
							<td><?php echo $keluar_barang["id_barang"]; ?></td>
							<td><?php echo $keluar_barang["nama_barang"]; ?></td>
							<td><?php echo $keluar_barang["tgl_keluar"]; ?></td>
							<td><?php echo $keluar_barang["jml_keluar"]; ?></td>
							<td><?php echo $keluar_barang["lokasi"]; ?></td>
							<td><?php echo $keluar_barang["penerima"]; ?></td>
							<td style="min-width: 175px;">
								<a data-target="#modal-edit-data<?php echo $keluar_barang["id_barang"]; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
								<a data-target="#modal-hapus-data<?php echo $keluar_barang["id_barang"]; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
				<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Keluar Barang</h4>
			</div>
			<div class="modal-body">
				<?php
					$query = mysqli_query($koneksi, "SELECT MAX(id_barang)+1 AS id_baru FROM barang_keluar");
					$id_baru = mysqli_fetch_array($query, MYSQLI_ASSOC);
				?>
				<form class="form-horizontal" method="POST" action="proses_tambah_keluar_barang.php">
					<div class="form-group">
						<label class="control-label col-md-3">Id Barang </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_barang" placeholder="Id Barang" value="<?php echo $id_baru["id_baru"]; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Barang</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_barang" placeholder="ID Barang" >
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Tanggal Keluar</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="Tgl_keluar" placeholder="Tanggal Keluar">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">Jumlah Keluar</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="Jml_keluar" placeholder="Jumlah Keluar">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-md-3">lokasi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">penerima</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="penerima" placeholder="penerima">
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
$sql = "SELECT * FROM barang_keluar";
$query = mysqli_query($koneksi, $sql);

while( $keluar_barang = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
	$id_barang = $keluar_barang["id_barang"];
?>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?php echo $id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Keluar Barang</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="proses_ubah_keluar_barang.php">
<div class="form-group">
<label class="control-label col-md-3">ID Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="id_barang" placeholder="ID Barang" value="<?php echo $keluar_barang["id_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Nama Barang</label>
<div class="col-md-9">
<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php echo $keluar_barang["nama_barang"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Tanggal Keluar</label>
<div class="col-md-9">
<input type="text" class="form-control" name="tgl_keluar" placeholder="tanggal keluar" value="<?php echo $keluar_barang["tgl_keluar"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Jumlah keluar</label>
<div class="col-md-9">
<input type="text" class="form-control" name="jml_keluar" placeholder="jumlah keluar" value="<?php echo $keluar_barang["jml_keluar"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Lokasi</label>
<div class="col-md-9">
<input type="text" class="form-control" name="lokasi" placeholder="lokasi" value="<?php echo $keluar_barang["lokasi"]; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Penerima</label>
<div class="col-md-9">
<input type="text" class="form-control" name="penerima" placeholder="penerima" value="<?php echo $keluar_barang["penerima"]; ?>">
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
<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Keluar Barang</h4>
</div>
<div class="modal-body">
<p> Apakah anda yakin akan menghapus data ini? </p>
<p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
</div><!-- Modal Body -->
<div class="modal-footer">
<button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
<a href="proses_delete_keluar_barang.php?id_barang=<?php echo $id_barang; ?>" class="btn btn-danger">Hapus</a>
</div>
</div>
</div>
</div>

<?php } //Endwhile ?>

</div>
<!-- /.page-wrapper -->

