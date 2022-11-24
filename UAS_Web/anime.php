
<?php 
    # Koneksi ke config.php
    require 'config.php';
    # Session Login 
    session_start();
    if(!isset($_SESSION['loginadmin'])){
        header("Location:loginadmin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PROJEK AKHIR WEB</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
        <style>
            /*  --------------------- header Style ---------------------  */
            header {
                background-color: sienna;
                padding-top: 20px;
                text-align: center;
                border-bottom: 3px solid rgb(90, 46, 26);
            }
            body {
                background-color: rgb(243, 243, 243);
                transition: .5s;
            }
            /*  --------------------- nav Style ---------------------  */
            nav{
                width: 100%;
                background-color: sienna; 
                align-items: center;
            }
            nav ul{
                
                text-align: right;
            }
            nav ul li{
                display: inline-block;
                list-style: none;
                margin: 15px;   
            }
            nav ul li a{
                text-decoration: none;
                color: black;
            }
            nav ul li a:hover{
                color: chocolate;
            }
        </style>

    </head>
    <body>
        <header>
            <h2>OuNime</h2>
            <p>Database Anime Series dan Movies</p>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
                <li><a href="user.php">DATA USER</a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="table-responsive">
                <h4>Daftar Anime Series</h4>
                
                <a href="tambah_series.php" class="tambah">
                    <button type="button" class="btn btn-secondary btn-mg">
                        Tambah Data
                    </button>
                </a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th nowrap>Judul Anime</th>
                        <th>Rank</th>
                        <th>Hari</th>
                        <th>Status</th>
                        <th>Sinopsis</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                    <!--  -->
                    <?php
                        
                        $result = mysqli_query($db, "SELECT * FROM data_anime");
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <!--  -->
                    <tr>
                        <td><?=$i;?></td>
                        <td><a href="assets/series/<?=$row['gambar']?>"><img src="assets/series/<?=$row['gambar']?>" width="30px" height="50px"></a></td>
                        <td><?=$row['judul_anime']?></td>
                        <td><?=$row['rank']?></td>
                        <td><?=$row['hari']?></td>
                        <td nowrap><?=$row['status']?></td>
                        <td width="900px"><?=$row['sinopsis']?></td>
                        <td class="edit">
                            <a href="edit_series.php?id=<?=$row['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="hapus">
                            <a href="hapus_series.php?id=<?=$row['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <!--  -->
                    <?php
                        $i++; 
                        }
                    ?>
                    <!--  -->
                </table> <br><br><br><br>

                <h4>Daftar Anime Movie</h4>
                <a href="tambah_movies.php">
                    <button type="button" class="btn btn-secondary btn-mg">
                        Tambah Movies
                    </button>
                </a>
                <table class="table">
                    <tr class="thead">
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul Anime Movie</th>
                        <th>Rank</th>
                        <th>Tanggal Rilis</th>
                        <th>Durasi Movie</th>
                        <th>Sinopsis</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                    <!--  -->
                    <?php 
                        $result = mysqli_query($db, "SELECT * FROM data_anime_movie");
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <!--  -->
                    <tr>
                        <td><?=$i;?></td>
                        <td><a href="assets/movies/<?=$row['gambar_movie']?>"><img src="assets/movies/<?=$row['gambar_movie']?>" width="30px" height="50px"></a></td>
                        <td><?=$row['judul_movie']?></td>
                        <td><?=$row['rank_movie']?></td>
                        <td><?=$row['tanggal_rilis']?></td>
                        <td><?=$row['durasi_movie']?></td>
                        <td width="900px"><?=$row['sinopsis_movie']?></td>
                        <td class="edit">
                            <a href="edit_movies.php?id=<?=$row['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="hapus">
                            <a href="hapus_movies.php?id=<?=$row['id'];?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <!--  -->
                    <?php
                        $i++; 
                        }
                    ?>
                    <!--  -->
                </table>
            </div><br><br><br>
        </div>                        
    </body>
</html>