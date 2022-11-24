<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus_movie = mysqli_query($db, "DELETE FROM data_anime_movie WHERE id='$id'");

    // Kondisi Percabagan DELETE data anime movies
    if($hapus_movie){
        echo"<script> alert('Penghapusan Berhasil!');
                window.location.href ='anime.php'; 
            </script>";
    } else {
        echo "Penghapusan Gagal!";
    }
}

?>