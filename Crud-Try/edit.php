<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Edit Data</title>
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1> 
        <h2>Menampilkan data dari database</h2> 
        <h3>www.smarttechacademy.com</h3> 
    </div>
    <br>
    <a href="index.php">Lihat semua data</a>
    <br>
    <h3>Edit Data</h3>
    <?php
        include_once "koneksi.php";
        $id = $_GET["id"];
        $query_mysql = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'") OR
        die(mysqli_error($conn));
        $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)) :
    ?>
    <form action="update.php" method="post">
        <table>
            <td><input type="hidden" name="id" id="id" value="<?= $data["id"]; ?>"></td>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="nama" value="<?= $data["nama"]; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" id="alamat" value="<?= $data["alamat"]; ?>"></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="pekerjaan" id="pekerjaan" value="<?= $data["pekerjaan"]; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
    <?php endwhile; ?>
</body>
</html>