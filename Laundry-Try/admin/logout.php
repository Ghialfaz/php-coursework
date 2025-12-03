<?php

session_start();

// hapus semua session yang ada
session_destroy();

header("Location:../index.php?pesan=logout");