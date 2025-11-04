<?php
// memanggil file koneksi (sama dengan memindahkannya ke atas sini)
include_once "koneksi.php";

$username = $_POST["username"];
// md5 adalah function untuk enkripsi string namun sudah tidak digunakan
// karena masalah keamanan
// $password = md5($_POST["password"]);
$password = $_POST["password"];

// echo "Username: $username<br>";
// echo "Password MD5: $password<br>";

// mengambil data di tabel admin dimana(where) username sama dengan
// variable post username (atau sama dengan yang di input user)
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$log = mysqli_query($conn, $query);

// function untuk mengecek berapa panjang data dari query
$cek = mysqli_num_rows($log); 
echo $cek;


// jika data ada lebih dari 0 atau sama dengan true
// maka mulai sesi login
if ($cek > 0) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["status"] = "login";
    header("Location: admin/index.php");
}else {
    header("Location: index.php");
}

?>
