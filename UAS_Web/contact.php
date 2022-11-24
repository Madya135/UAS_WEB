<?php
    # Koneksi ke config.php
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJEK AKHIR WEB</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <!-- Bagian Header -->
    <div class="header">
        <div class="header-logo"> OuNime</div>
        <p id="judul">Website Informasi Anime Berbahasa Indonesia</p>        
    </div>
    
    <!-- Bagian Navigation Bar -->
    <div class="nav">
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="anime.php">DATA ANIME</a></li>
            </ul>
        </nav>
    </div>

<!-- GANTI -->
    <!-- Bagian Isi Website / Konten -->

    <!--  -    -    -    -     -     Bagian Main     -    -    -    -    -    -->
    <!-- Isi Contact Page -->
    <div class="contact">
        
        <h3 class="section-title">ABOUT US</h3>
        <div class="contents-item">
         <!-- PHP pemanggilan konten -->
         <?php
            $result = mysqli_query($db, "SELECT * FROM data_admin");                    
            if(mysqli_num_rows($result) > 0){
                while ($i = mysqli_fetch_array($result)){
         ?>
            <div class="card">
                <img src="assets/profpict/<?=$i['gambar']?>" width="300px" height="300px">
                    <div class="title">
                        <h4><b><?=$i['nama']?></b></h4>
                    </div>
                </a>
                <p><?=$i['nim']?></p>
                <p><?=$i['email']?></p>
                <nav>
                    <ul>
                        <li><a href="contact.php"><i class="gg-facebook"></i></a></li>
                        <li><a href="contact.php"><i class="gg-instagram"></i></a></li>
                        <li><a href="contact.php"><i class="gg-twitter"></i></a></li>
                    </ul>    
                </nav>
                
            </div>
         <!-- Php lanjutan penutup panggilan konten -->
         <?php
                }
            }
         ?>
        </div>          
    </div>
    
<!-- GANTI -->

    <!-- Bagian Footer Website -->
    <div class="footer">
        <nav>
            <h1 class="logo">OuNime</h1>
            <!-- Dark/Light Mode -->
            <ul>
                <li></li>
                <button onclick="dlmode()">Mode</button>
                <li></li>
            </ul>
        </nav>
        <p>Copyright &copy; 2022 || Pemrograman Web C1'20 - K4 </p>
    </div>
    
    
    <script src="js/main.js"></script> <!-- Penghubung penggantian mode Dark/Light -->
    
</body>
</html>