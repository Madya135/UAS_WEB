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
    <link rel="stylesheet" href="css/style.css">
    <link rel="https://fonts.googleapis.com/css?family-great+vibes" href="stylesheet" type="text/cs">
    <link rel="https://fonts.googleapis.com/css?family-great-raleway" href="stylesheet">
</head>
<body>
    <!-- Bagian Header -->
    <div class="header">
        <div class="header-logo">OuNime</div>
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

    <!-- Bagian Isi Website / Konten -->
    <div class="contents">
        <h3 class="section-title">UPDATE ANIME</h3>
        <div class="contents-item">
         <!-- PHP pemanggilan konten -->
         <?php
            $result = mysqli_query($db, "SELECT * FROM data_anime");                    
            if(mysqli_num_rows($result) > 0){
                while ($i = mysqli_fetch_array($result)){
         ?>
            <div class="card">
                <a href="detail_series.php?id=<?= $i['id']?>">
                    <img src="assets/series/<?=$i['gambar']?>" width="215px" height="310px">
                    <div class="title">
                        <h4><b><?=$i['judul_anime']?></b></h4>
                    </div>
                </a>
                <p><?=$i['rank']?></p>
                <p><?=$i['hari']?></p>
                <p><?=$i['status']?></p>
            </div>
         <!-- Php lanjutan penutup panggilan konten -->
         <?php
                }
            }
         ?>
        </div><br>
        
        <!-- Bagian Anime Movies -->
        <h3 class="section-title">ANIME MOVIES</h3>
        <div class="contents-item">
         <!-- PHP pemanggilan konten -->
         <?php
            $result = mysqli_query($db, "SELECT * FROM data_anime_movie");                    
            if(mysqli_num_rows($result) > 0){
                while ($i = mysqli_fetch_array($result)){
         ?>
            <div class="card">
                <a href="detail_movies.php?id=<?= $i['id']?>">
                    <img src="assets/movies/<?=$i['gambar_movie']?>" width="215px" height="310px">
                    <div class="title">
                        <h4><b><?=$i['judul_movie']?></b></h4>
                    </div>
                </a>
                <p><?=$i['rank_movie']?></p>
                <p><?=$i['tanggal_rilis']?></p>
                <p><?=$i['durasi_movie']?></p>
            </div>
         <!-- Php lanjutan penutup panggilan konten -->
         <?php
                }
            }
         ?>
        </div>      
    </div>
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
    
    <!-- Penghubung penggantian mode Dark/Light -->
    <script src="js/main.js"></script>

</body>
</html>