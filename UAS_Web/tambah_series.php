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
        <h3>Tambah Data Anime Series</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Input Gambar -->
            <label for="">Thumbnail : </label> <br> 
            <input type="file" name="gambar"><br><br>
            <!-- Input Judul Anime -->
            <label for="">Judul Anime</label><br>
            <input type="text" name="name" class="form-text"><br>
            <!-- Input Ranking Anime -->
            <label for="">Rank</label><br>
            <input type="float" name="rank" class="form-text"><br>
            <!-- Input Hari Rilis Anime -->
            <label for="">Hari</label><br>
            <input type="text" name="hari" class="form-text"><br>
            <!-- Input Status Anime -->
            <label for="">Status</label><br>
            <input type="text" name="status" class="form-text"><br>
            <!-- Input Sinopsis Anime -->
            <label for="">Sinopsis</label><br>
            <input type="text" name="sinopsis" class="form-text"><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>
</body>
</html>

<?php 

require 'config.php';
if(isset($_POST['submit'])){
    $judul_anime = $_POST['name'];
    $rank = $_POST['rank'];
    $hari = $_POST['hari'];
    $status = $_POST['status'];
    $sinopsis = $_POST['sinopsis'];
    // Gambar dan penamaan gambar
    $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
    
    $gambar_baru = "$judul_anime.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if(move_uploaded_file($tmp, 'assets/series/'.$gambar_baru)){
        $kirim = mysqli_query($db, "INSERT INTO data_anime (gambar,judul_anime,rank,hari,status,sinopsis) 
                                VALUES ('$gambar_baru','$judul_anime','$rank','$hari','$status','$sinopsis')");
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