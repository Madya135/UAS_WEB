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
        <h2>Data Anime</h2>
    </header>
    
    <div class="form-class">
        <h3>Tambah Data Anime Movies</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Input Gambar -->
            <label for="">Thumbnail : </label> <br> 
            <input type="file" name="gambar_movie"><br><br>
            <!-- Input Judul Anime -->
            <label for="">Judul Anime</label><br>
            <input type="text" name="name" class="form-text"><br>
            <!-- Input Ranking Anime -->
            <label for="">Rank</label><br>
            <input type="float" name="rank" class="form-text"><br>
            <!-- Input Hari Rilis Anime -->
            <label for="">Tanggal Rilis</label><br>
            <input type="date" name="tanggal" class="form-text"><br>
            <!-- Input Status Anime -->
            <label for="">Durasi Movie</label><br>
            <input type="text" name="durasi" class="form-text"><br>
            <!-- Input Sinopsis Anime -->
            <label for="">Sinopsis Movie</label><br>
            <input type="text" name="sinopsis" class="form-text"><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>
</body>
</html>

<?php 

require 'config.php';
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
        $kirim = mysqli_query($db, "INSERT INTO data_anime_movie (gambar_movie,judul_movie,rank_movie,tanggal_rilis,durasi_movie,sinopsis_movie) 
                                VALUES ('$gambar_movie_baru','$judul_movie','$rank','$tanggal','$durasi','$sinopsis')");
            if($kirim){
                echo"<script> alert('Penambahan Berhasil!');
                    window.location.href ='anime.php'; 
                </script>";
            }else {
                echo "Penambahan gagal";
            }
    }
}

?>