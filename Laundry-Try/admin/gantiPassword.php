<?php include "header.php" ?>


<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <?php
        if(isset($_GET["pesan"])){
            if ($_GET["pesan"] == "oke") {
                echo "<div class='alert alert-success'>Password telah diganti!</div>";
            }
        }
        ?>
        <div class="panel">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form action="gantiPasswordAksi.php" method="post">
                    <div class="form-group">
                        <label for="">Masukkan Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" lplaceholder="Masukkan Password Baru Anda ..">
                    </div>
                    <br>
                    <input type="submit" value="Ganti Password" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

