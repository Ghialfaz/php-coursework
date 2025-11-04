<?php
include_once "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$pekerjaan = $_POST["pekerjaan"];

mysqli_query($conn, "UPDATE user SET nama='$nama', alamat='$alamat', pekerjaan='$pekerjaan'
WHERE id='$id'");

header("Location:index.php?pesan=update");
?>