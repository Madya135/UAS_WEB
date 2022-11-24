<?php 
    # Penghubungan dengan config.php
    require 'config.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM data_anime WHERE id = '$id' ");
        $row = mysqli_fetch_array($result);
    }

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
            $kirim = mysqli_query($db, "UPDATE data_anime SET gambar='$gambar_baru', judul_anime='$judul_anime', rank='$rank', hari='$hari', status='$status', sinopsis='$sinopsis' WHERE id='$id'");
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
        <h2>Data Anime Series</h2>
    </header>
    
    <div class="form-class">
        <h3>Edit Data</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Input Gambar -->
            <label for="">Thumbnail : </label> <br> 
            <input type="file" name="gambar" value=<?=$row['gambar'];?>><br><br>
            <!-- Input Judul Anime -->
            <label for="">Judul Series</label><br>
            <input type="text" name="name" class="form-text" value=<?=$row['judul_anime'];?>><br>
            <!-- Input Ranking Anime -->
            <label for="">Rank</label><br>
            <input type="text" name="rank" class="form-text" value=<?=$row['rank'];?>><br>
            <!-- Input Hari Rilis Anime -->
            <label for="">Hari</label><br>
            <input type="text" name="hari" class="form-text" value=<?=$row['hari'];?>><br>
            <!-- Input Status Anime -->
            <label for="">Status</label><br>
            <input type="text" name="status" class="form-text" value=<?=$row['status'];?>><br><br><br>
            <!-- Input Sinopsis Anime -->
            <label for="">Sinopsis</label><br>
            <input type="text" name="sinopsis" class="form-text" value=<?=$row['sinopsis'];?>><br><br><br>
            
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>

</body>
</html>