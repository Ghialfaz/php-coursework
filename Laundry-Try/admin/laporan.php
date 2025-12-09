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
<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="tgl_sampai" class="form-control">
                        </td>
                        <td>
                            <br/>
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br/>
    <?php
    if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) :
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
    ?>
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
        </div>
        <div class="panel-body">
            <a target="_blank" href="cetakPrint.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary">
                <i class="glyphicon glyphicon-print"></i> CETAK
            </a>
            <a target="_blank" href="cetakPdf.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary">
                <i class="glyphicon glyphicon-print"></i> CETAK PDF
            </a>
            <br/>
            <br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
                <?php
                // koneksi database
                include '../koneksi.php';
                // mengambil data transaksi dari database
                $data = mysqli_query($koneksi,"SELECT * FROM pelanggan,transaksi 
                                                WHERE transaksi_pelanggan=pelanggan_id 
                                                AND date(transaksi_tgl) >= '$dari' 
                                                AND date(transaksi_tgl) <= '$sampai' 
                                                ORDER BY transaksi_id DESC");
                $no = 1;
                // mengubah data ke array dan menampilkannya dengan perulangan while
                while($d=mysqli_fetch_array($data)) :
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                    <td><?php echo $d['transaksi_tgl']; ?></td>
                    <td><?php echo $d['pelanggan_nama']; ?></td>
                    <td><?php echo $d['transaksi_berat']; ?></td>
                    <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                    <td><?php echo "Rp. ".number_format($d['transaksi_harga'])." ,-"; ?></td>
                    <td>
                        <?php
                        if($d['transaksi_status']=="0"){
                            echo "<div class='label label-warning'>PROSES</div>";
                        } else if($d['transaksi_status']=="1"){
                            echo "<div class='label label-info'>DICUCI</div>";
                        } else if($d['transaksi_status']=="2"){
                            echo "<div class='label label-success'>SELESAI</div>";
                        }
                        ?>
                    </td>
                </tr>
                <?php
                endwhile;
                ?>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
