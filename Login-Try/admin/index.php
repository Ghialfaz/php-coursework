<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php include "cek-login.php"; ?>
    <h1>HALAMAN ADMIN</h1>
    <h3><?php echo "Selamat datang pak/bu " . $_SESSION["username"]; ?></h3>
    <a href="logout.php">Logout</a>
</body>
</html>