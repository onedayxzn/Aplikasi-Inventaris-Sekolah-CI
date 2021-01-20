<?php
session_start();
require_once "db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pinjam barang</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="page-header"> Data Pinjam barang</h1>
        <div class="pull-right">
            <p> Dicetak oleh : <b> <?php echo $_SESSION["username"]; ?> </b> </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>peminjam</th>
                            <th>ID Barang </th>
                            <th>Nama Barang </th>
                            <th>Jumlah Barang </th>
                            <th> tgl_kembali </th>
                            <th> kondisi </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM pinjam_barang");
                        while( $barang_pinjam = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $barang_pinjam["id_pinjam"]; ?></td>
                            <td><?php echo $barang_pinjam["tgl_pinjam"]; ?></td>
                            <td><?php echo $barang_pinjam["peminjam"]; ?></td>
                            <td><?php echo $barang_pinjam["id_barang"]; ?></td>
                            <td><?php echo $barang_pinjam["nama_barang"]; ?></td>
                            <td><?php echo $barang_pinjam["jml_barang"]; ?></td>
                            <td><?php echo $barang_pinjam["tgl_kembali"]; ?></td>
                            <td><?php echo $barang_pinjam["kondisi"]; ?></td>
                        </tr>
                    <?php } //Endwhile ?>
                    </tbody>
                </table>
            </div><!-- col md 12 -->
        </div><!-- row -->
    </div><!-- container -->

    <script>
        window.onload = () => {
            window.print();
        }
    </script>
</body>
</html>