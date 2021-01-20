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
    <title>Data stok</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="page-header"> Data stok</h1>
        <div class="pull-right">
            <p> Dicetak oleh : <b> <?php echo $_SESSION["username"]; ?> </b> </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah masuk</th>
                            <th>Jumlah keluar </th>
                            <th>Total Barang </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM stok");
                        while( $stok = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $stok["id_barang"]; ?></td>
                            <td><?php echo $stok["nama_barang"]; ?></td>
                            <td><?php echo $stok["jml_masuk"]; ?></td>
                            <td><?php echo $stok["jml_keluar"]; ?></td>
                            <td><?php echo $stok["total_barang"]; ?></td>
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