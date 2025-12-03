<?php include "header.php" ?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pelanggan Baru</h4>
            </div>
            <div class="panel-body">
                <form action="pelangganAksi.php" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama ..">
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" name="hp" class="form-control" placeholder="Masukkan no.hp ..">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat ..">
                    </div>
                    <br>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>