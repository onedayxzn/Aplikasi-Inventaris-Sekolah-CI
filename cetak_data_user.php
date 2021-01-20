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
    <title>Data User</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1 class="page-header"> Data User</h1>
        <div class="pull-right">
            <p> Dicetak oleh : <b> <?php echo $_SESSION["username"]; ?> </b> </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password </th>
                            <th>Level</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM user");
                        while( $user = mysqli_fetch_array($query, MYSQLI_ASSOC) ){
                    ?>
                        <tr>
                            <td><?php echo $user["id_user"]; ?></td>
                            <td><?php echo $user["nama"]; ?></td>
                            <td><?php echo $user["username"]; ?></td>
                            <td><?php echo $user["password"]; ?></td>
                            <td><?php echo $user["level"]; ?></td>
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