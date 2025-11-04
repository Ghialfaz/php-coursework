<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1> 
        <h2>Menampilkan data dari database</h2> 
        <h3>www.smarttechacademy.com</h3>
    </div>
    <br>
    <?php
    if (isset($_GET["pesan"])) {
        $pesan = $_GET["pesan"];
        if ($pesan == "input") {
            echo "Data berhasil di input";
        } elseif ($pesan == "update") {
            echo "Data berhasil di update";
        } elseif ($pesan == "hapus") {
            echo "Data berhasil di hapus";
        }
    }
    ?>
    <br>
    <a href="input.php" class="tombol">+ Tambah Data Baru</a>
    <h3>Data User</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>
        <?php
            include_once "koneksi.php";
            $query_mysql = mysqli_query($conn, "SELECT * FROM user") OR
            die(mysqli_error($conn));
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysql)) :
        ?>
        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $data["nama"]; ?></td>
            <td><?= $data["alamat"]; ?></td>
            <td><?= $data["pekerjaan"]; ?></td>
            <td>
                <a class="edit" href="edit.php?id=<?= $data["id"]; ?>">Edit</a> | <a class="hapus" href="hapus.php?id=<?= $data["id"]; ?>">Hapus</a> 
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>