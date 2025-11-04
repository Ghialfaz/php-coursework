<?php
include_once "koneksi.php";

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$pekerjaan = $_POST["pekerjaan"];

mysqli_query($conn, "INSERT INTO user VALUES (NUll, '$nama', '$alamat', '$pekerjaan')");
header("Location: index.php?pesan=input")
?>