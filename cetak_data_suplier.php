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
    <title>Data Suplier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="page-header"> Data Suplier</h1>
        <div class="pull-right">
            <p> Dicetak oleh : <b> <?php echo $_SESSION["username"]; ?> </b> </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID Suplier</th>
                            <th>Nama Suplier</th>
                            <th>Alamat</th>
                            <th>Telepon </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM suplier");
                        while( $suplier = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $suplier["id_suplier"]; ?></td>
                            <td><?php echo $suplier["nama_suplier"]; ?></td>
                            <td><?php echo $suplier["alamat_suplier"]; ?></td>
                            <td><?php echo $suplier["telp_suplier"]; ?></tr>
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