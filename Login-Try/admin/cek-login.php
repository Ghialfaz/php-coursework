<?php

session_start();

if ($_SESSION["status"] == "") {
    header("Location : ../index.php");
}

?>