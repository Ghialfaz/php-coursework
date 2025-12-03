<?php 

$koneksi = mysqli_connect("localhost", "root", "", "laundry");

if (mysqli_connect_errno()) {
    echo "koneksi ke database gagal! : " . mysqli_connect_error();
}