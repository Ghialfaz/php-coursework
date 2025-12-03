<?php include "header.php"; ?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Pengaturan Harga Laundry</h4>
            </div>
            <div class="panel-body">
                <?php
                include "../koneksi.php";
                $data = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga ");
                while ($d = mysqli_fetch_array($data)) :
                ?>
                <form action="hargaUpdate.php" method="post">
                    <div class="form-group">
                        <label>Harga per kilo</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $d["harga_per_kilo"]; ?>">
                    </div>
                    <br>
                    <input type="submit" value="Ubah Harga" class="btn btn-primary">
                </form>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>