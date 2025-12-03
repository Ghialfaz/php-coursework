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
<?php include "header.php"; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <a href="transaksiTambah.php" class="btn btn-sm btn-info pull-right">
                Transaksi Baru
            </a>
            <br><br>
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
                    <th width="20%">OPSI</th>
                </tr>

                <?php
                include "../koneksi.php";
                $data = mysqli_query($koneksi, "SELECT * FROM transaksi t INNER JOIN pelanggan p ON t.transaksi_pelanggan = p.pelanggan_id ORDER BY t.transaksi_id DESC");
                $no = 1;
                while ($d = mysqli_fetch_array($data)) :
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d["transaksi_id"]; ?></td>
                    <td><?php echo $d["transaksi_tgl"]; ?></td>
                    <td><?php echo $d["pelanggan_nama"]; ?></td>
                    <td><?php echo $d["transaksi_berat"]; ?></td>
                    <td><?php echo $d["transaksi_tgl_selesai"]; ?></td>
                    <td><?php echo "Rp." . number_format($d["transaksi_harga"]) . " ,-"; ?></td>
                    <td>
                        <?php
                        if ($d["transaksi_status"] == "0") {
                            echo "<div class='label label-warning'>PROSES</div>";
                        }else {
                            if ($d["transaksi_status"] == "1") {
                                echo "<div class='label label-warning'>DICUCI</div>";
                            }else {
                                if ($d["transaksi_status"] == "2") {
                                    echo "<div class='label label-warning'>SELESAI</div>";
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <a href="transaksiInvoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-warning">
                            Invoice
                        </a>
                        <a href="transaksiEdit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-info">
                            Edit
                        </a>
                        <a href="transaksiHapus.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger">
                            Batalkan
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>