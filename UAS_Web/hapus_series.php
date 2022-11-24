<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM data_anime WHERE id='$id'");

    // Kondisi Percabagan DELETE data anime
    if($hapus){
        echo"<script> alert('Penghapusan Berhasil!');
                window.location.href ='anime.php'; 
            </script>";
    } else {
        echo "Penghapusan Gagal!";
    }
}

?>