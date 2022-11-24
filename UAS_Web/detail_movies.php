<?php 
    require 'config.php';
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT AKHIR WEB</title>
    <link rel="stylesheet" href="css/style4.css">
    <link rel="https://fonts.googleapis.com/css?family-great+vibes" href="stylesheet" type="text/cs">
    <link rel="https://fonts.googleapis.com/css?family-great-raleway" href="stylesheet">
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
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div> 

    <!-- Bagian detail Anime Movie  -->
    <?php
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM data_anime_movie WHERE id = $id");
                        
        if(mysqli_num_rows($result) > 0){
            while ($i = mysqli_fetch_array($result)){

     ?>

    <div class="contents">
        <h3 class="section-title"><?=$i['judul_movie']?></h3>
        <div class="contents-item">
                <table border="0">
                    <tr>
                        <th colspan="3" rowspan="4">
                            <img src="assets/movies/<?=$i['gambar_movie']?>" width="215px" height="310px">
                        </th>
                        <th class="th" align="left">Sinopsis</th>
                        <td class="td">:</td>
                        <td colspan=""><?=$i['sinopsis_movie']?></td>
                    </tr>
                    <tr>
                        <th class="th" align="left">Rank</th>
                        <td class="td">:</td>
                        <td><?=$i['rank_movie']?></td>
                    </tr>
                    <tr>
                        <th class="th" align="left">Tangagl Rilis</th>
                        <td class="td">:</td>
                        <td><?=$i['tanggal_rilis']?></td>
                    </tr>
                    <tr>
                        <th class="th" align="left">Durasi Movie</th>
                        <td class="td">:</td>
                        <td><?=$i['durasi_movie']?></td>
                    </tr>
                </table>
        </div>
    </div> 
       
    <?php
            }
        }
    ?>

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
     
        
     