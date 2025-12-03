<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laundry</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
</head>
<body style="background-color: #f0f0f0;">
    <?php
    session_start();
    if ($_SESSION["status"]!="login") {
        header("Location:../index.php?pesan=belum_login");
    }
    ?>
    <?php include "header.php" ?>

    <div class="container">
        <div class="alert alert-info text-center">
            <h4 style="margin-bottom: 0px;">
                <b>Selamat datang!</b> di sistem informasi laundry
            </h4>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h4>Dashboard</h4>
            </div>
            <div class="panel-body">
                Sistem Informasi Laundry
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>