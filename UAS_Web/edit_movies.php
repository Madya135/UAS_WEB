<?php 
    # Penghubungan dengan config.php
    require 'config.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM data_anime_movie WHERE id = '$id' ");
        $row = mysqli_fetch_array($result);
    }

    if(isset($_POST['submit'])){
        $judul_movie = $_POST['name'];
        $rank = $_POST['rank'];
        $tanggal = $_POST['tanggal'];
        $durasi = $_POST['durasi'];
        $sinopsis = $_POST['sinopsis_movie'];
        // Gambar dan penamaan gambar
        $gambar_movie = $_FILES['gambar_movie']['name'];
            $x = explode('.', $gambar_movie);
            $ekstensi = strtolower(end($x));

        $gambar_movie_baru = "$judul_movie.$ekstensi";
        $tmp = $_FILES['gambar_movie']['tmp_name'];

        if(move_uploaded_file($tmp, 'assets/movies/'.$gambar_movie_baru)){
            $kirim = mysqli_query($db, "UPDATE data_anime_movie 
                                    SET gambar_movie='$gambar_movie_baru', judul_movie='$judul_movie', rank_movie='$rank', tanggal_rilis='$tanggal', durasi_movie='$durasi', sinopsis_movie='$sinopsis'
                                    WHERE id='$id'");
                // Percabangan kondisi UPDATE data anime
                if($kirim){
                    echo"<script> alert('Pengeditan Berhasil!');
                        window.location.href ='anime.php'; 
                    </script>";
                }else {
                    echo "Pengeditan gagal";
                }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJEK AKHIR WEB</title>
    <link rel="stylesheet" href="css/anime.css">
</head>
<body>
    <header>
        <h2>Data Anime Movies</h2>
    </header>
    
    <div class="form-class">
        <h3>Edit Data</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Input Gambar -->
            <label for="">Thumbnail : </label> <br> 
            <input type="file" name="gambar_movie" value=<?=$row['gambar_movie'];?>><br><br>
            <!-- Input Judul Anime -->
            <label for="">Judul Movie</label><br>
            <input type="text" name="name" class="form-text" value=<?=$row['judul_movie'];?>><br>
            <!-- Input Ranking Anime -->
            <label for="">Rank</label><br>
            <input type="text" name="rank" class="form-text" value=<?=$row['rank_movie'];?>><br>
            <!-- Input Hari Rilis Anime -->
            <label for="">Tanggal Rilis</label><br>
            <input type="date" name="tanggal" class="form-text" value=<?=$row['tanggal_rilis'];?>><br>
            <!-- Input Status Anime -->
            <label for="">Durasi Movie</label><br>
            <input type="text" name="durasi" class="form-text" value=<?=$row['durasi_movie'];?>><br>
            <!-- Input Sinopsis Anime -->
            <label for="">Sinopsis Movie</label><br>
            <input type="text" name="sinopsis" class="form-text" value=<?=$row['sinopsis_movie'];?>><br>
            
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>

</body>
</html>