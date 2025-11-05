<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery.js"></script>
    <title>Membuat Halaman Web Dinamis Dengan PHP www.smarttechacademy.com</title>
</head>
<body>
    <div class="content"> 
        <header> 
            <h1 class="judul">WWW.smarttechacademy.COM</h1> 
            <h3 class="deskripsi">Membuat Halaman Web Dinamis Dengan PHP</h3> 
        </header> 
        <div class="menu"> 
            <ul> 
                <li><a href="index.php?page=home">HOME</a></li> 
                <li><a href="index.php?page=tentang">TENTANG</a></li> 
                <li><a href="index.php?page=tutorial">TUTORIAL</a></li> 
                <li><a href="index.php?page=kalkulator">KALKULATOR</a></li> 
            </ul> 
        </div>

    <?php 
    if (isset($_GET['page'])) {
    $page = $_GET['page']; 
    switch ($page) :
        case 'home': 
            include "halaman/home.php"; 
            break; 
        case 'tentang': 
            include "halaman/tentang.php"; 
            break; 
        case 'tutorial': 
            include "halaman/tutorial.php"; 
            break; 
        case 'kalkulator': 
            include "halaman/kalkulator.php"; 
            break; 
        default: 
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>"; 
        break; 
    endswitch;
    } else { 
        include "halaman/home.php"; 
    }
    ?> 
    </div> 
</div> 
</body>
</html>