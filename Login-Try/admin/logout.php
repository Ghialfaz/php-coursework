<?php

// menghapus semua sesi dan memindahkahkan admin ke halaman index awal
session_start(); 
session_destroy(); 
header("location:../index.php");