<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Login Dengan PHP dan MySQL | Course Pak Fabio</title>
</head>
<body>
    <h1>Halaman Login Sederhana</h1>
    <!-- ketika submit ditekan maka data yang di inputkan akan dikirim melalui
    method post yang nantinya bisa ditangkap melalui variable $_POST -->
    <form action="./login.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="login">Login</button></td>
        </tr>
    </table>
    </form>
</body>
</html>