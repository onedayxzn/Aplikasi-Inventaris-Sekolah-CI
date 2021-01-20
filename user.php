<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding: 15px;">
            <?php if ($_SESSION["level"] == "Admin"){ ?>
                <a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
            <?php } //EndIf ?>
            <div class="pull-right">
                <a href="cetak_data_user.php" class="btn btn-warning"> <i class="fa fa-print"></i> Cetak Data </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data User
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <?php if ($_SESSION["level"] == "Admin"){ ?>
                                <th>Password</th>
                            <?php } //EndIf ?>
                            <th>Level</th>
                            <?php if ($_SESSION["level"] == "Admin"){ ?>
                                <th>Aksi</th>
                            <?php } //EndIf ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql   = "SELECT * FROM user";
                    $query = mysqli_query($koneksi, $sql);

                    while( $user = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $user["id_user"]; ?></td>
                            <td><?php echo $user["nama"]; ?></td>
                            <td><?php echo $user["username"]; ?></td>
                            <?php if ($_SESSION["level"] == "Admin"){ ?>
                                <td><?php echo $user["password"]; ?></td>
                            <?php } //EndIf ?>
                            <td><?php echo $user["level"]; ?></td>
                            <?php if ($_SESSION["level"] == "Admin"){ ?>
                                <td style="min-width: 175px;">
                                    <a data-target="#modal-edit-data<?php echo $user["id_user"]; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                    <a data-target="#modal-hapus-data<?php echo $user["id_user"]; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
                                </td>
                            <?php } //EndIf ?>
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
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data User</h4>
      </div>
      <div class="modal-body">
          <?php
            $query = mysqli_query($koneksi, "SELECT MAX(id_User)+1 AS id_baru FROM user");
            $id_baru = mysqli_fetch_array($query, MYSQLI_ASSOC)
          ?>
          <form class="form-horizontal" method="POST" action="proses_tambah_user.php">
            <div class="form-group">
                <label class="control-label col-md-3">ID User</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="id_User" placeholder="ID User" value="<?php echo $id_baru["id_baru"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Username</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Level</label>
                <div class="col-md-9">
                    <select name="level" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select>
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
$sql   = "SELECT * FROM user";
$query = mysqli_query($koneksi, $sql);

while( $user = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
    $id_user = $user["id_user"];
?>

<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?php echo $id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data User</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="proses_ubah_user.php">
        <div class="form-group">
            <label class="control-label col-md-3">ID User</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="id_user" placeholder="ID User" value="<?php echo $user["id_user"]; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Nama</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="nama" placeholder="Nama"  value="<?php echo $user["nama"]; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Username</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="username" placeholder="Username"  value="<?php echo $user["username"]; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Password</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="password" placeholder="Password"  value="<?php echo $user["password"]; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Level</label>
            <div class="col-md-9">
                <select name="level" id="" class="form-control">
                    <option value="admin" <?php if ($user["level"] == 1){ echo "selected"; } ?> >Admin</option>
                    <option value="operator" <?php if ($user["level"] == 2){ echo "selected"; } ?> >Operator</option>
                </select>
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
<div class="modal fade" id="modal-hapus-data<?php echo $id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data User</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="proses_delete_user.php?id_user=<?php echo $id_user; ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php } //Endwhile ?>

</div>
<!-- /.page-wrapper -->

