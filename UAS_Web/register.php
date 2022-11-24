<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Register</title>
</head>
<body>
    <div class="container regis">

        <div class="judul">
            <h2>Registrasi</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" class="input" placeholder="Masukkan nama" required><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Masukkan email" required><br>

                <label for="username">Username</label><br>
                <input type="text" name="usn" class="input" placeholder="Masukkan username" required><br>

                <label for="password">Password</label><br>
                <input type="password" name="psw" class="input" placeholder="Password" required><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konf" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" name="regis" class="submit" value="Registrasi"><br><br>
            </form>

            <p>Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
</body>
</html>

<?php 
    require 'config.php';
    if(isset($_POST['regis'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        $usn = $_POST['usn'];
        $psw = $_POST['psw'];
        $konf = $_POST['konf'];

        // mengecek apakah udh ad yg daftar / blum
        $user = $db->query("SELECT * FROM akun WHERE usn='$usn'");
        $num_user = mysqli_num_rows($user);

        if($num_user > 0){
            echo "
                <script>
                    alert('Username tlah dipakai');
                </script>
            ";
        } else {
            //  Cek konfirmasi passw
            if($psw == $konf){
                //  untuk enkripsi passw
                // $psw = password_hash($psw, PASSWORD_DEFAULT); // enkripsi pakai semua karakter
                $psw = md5($psw); // enskripsi dalam model m5 
                $query = "INSERT INTO data_user (nama,email,usern,passw)
                            VALUE ('$nama','$email','$usn','$psw')";
                $result = $db->query($query);

                if($result){
                    echo "
                        <script>
                            alert('Registrasi berhasil');
                            document.location.href = 'index.php';
                        </script>
                    ";
                }else {
                    echo "
                    <script>
                        alert('Regis gagal');
                        document.location.href = 'index.php';
                    </script>
                ";
                }
            } else {
                echo "
                    <script>
                        alert('konfirmasi passw salah');
                    </script>
                ";
            }
        }
    }    
?>