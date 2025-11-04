<?php

include_once "koneksi.php";

$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM user WHERE id = '$id'") OR die(mysqli_error($conn));

header("Location: index.php?pesan=hapus");

?>