	<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data Suplier</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding: 15px;">
            <a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
            <div class="pull-right">
                <a href="cetak_data_suplier.php" class="btn btn-warning"> <i class="fa fa-print"></i> Cetak Data </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Suplier
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kode Suplier</th>
                            <th>Nama Suplier</th>
                            <th>Alamat Suplier</th>
                            <th>Telepon Suplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql   = "SELECT * FROM suplier";
                    $query = mysqli_query($koneksi, $sql);

                    while( $suplier = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $suplier["id_suplier"]; ?></td>
                            <td><?php echo $suplier["nama_suplier"]; ?></td>
                            <td><?php echo $suplier["alamat_suplier"]; ?></td>
                            <td><?php echo $suplier["telp_suplier"]; ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?php echo $suplier["id_suplier"]; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?php echo $suplier["id_suplier"]; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Supplier </h4>
      </div>
      <div class="modal-body">
          <?php
            $query = mysqli_query($koneksi, "SELECT MAX(id_suplier)+1 AS kode_baru FROM suplier");
            $kode_baru = mysqli_fetch_array($query, MYSQLI_ASSOC);
          ?>
          <form class="form-horizontal" method="POST" action="proses_tambah_suplier.php">
            <div class="form-group">
                <label class="control-label col-md-3">ID Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="id_suplier" placeholder="Kode Suplier" value="<?php echo $kode_baru["kode_baru"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_suplier" placeholder="Nama Suplier" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Alamat Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="alamat_suplier" placeholder="Alamat Suplier">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Telp Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="telp_suplier" placeholder="Telepon Suplier">
                </div>
            </div>
          </div><!-- Modal Body -->
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal"> Kembali </button>
             <button type="submit" class="btn btn-primary"> Tambah </button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php 
$sql   = "SELECT * FROM suplier";
$query = mysqli_query($koneksi, $sql);
    
while( $suplier = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
$id_suplier = $suplier["id_suplier"];	
?>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?php echo $id_suplier ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Supplier</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="proses_ubah_suplier.php">
            <div class="form-group">
                <label class="control-label col-md-3">Id Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="id_suplier" placeholder="Id Suplier" value="<?php echo $suplier["id_suplier"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_suplier" placeholder="Nama Suplier"  value="<?php echo $suplier["nama_suplier"]; ?>" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Alamat Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="alamat_suplier" placeholder="Alamat Suplier" value="<?php echo $suplier["alamat_suplier"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Telepon Suplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="telp_suplier" placeholder="Telepon Suplier" value="<?php echo $suplier["telp_suplier"]; ?>">
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
<div class="modal fade" id="modal-hapus-data<?php echo $id_suplier ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Supplier</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="proses_delete_suplier.php?id_suplier=<?php echo $id_suplier; ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php } //Endwhile ?>

</div>
<!-- /.page-wrapper -->