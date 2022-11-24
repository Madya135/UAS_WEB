<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Login</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="assets/logopaweb.jpg" alt="logopaweb" width="70%">
        </div>
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="usn" placeholder="email atau username" class="input" required>
                <input type="password" name="psw" placeholder="password" class="input" required>

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>
        </div>
    </div>
</body>
</html>

<?php 
    session_start(); // agar tidak langsung ke halaman index, buat sesi trlbh dhulu
    require 'config.php';

    if(isset($_POST['login'])){
        $usn = $_POST['usn'];
        $psw = $_POST['psw'];
        $psw = md5($psw); // password yg diinputkan akan menjadi type md5

        $query = "SELECT * FROM data_admin WHERE usern='$usn' OR email='$usn'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        $admin = $row['nama'];

        // Mencocokkan pass login dengan database
        // if(password_verify($psw, $row['passw'])){
        if($psw == $row['passw'] && $usn == $row['usern']){

            $_SESSION['login'] = true;
            $_SESSION['loginadmin'] = true;
        
            echo "
                <script>
                    alert('Welcome $admin');
                    document.location.href = 'anime.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Wrong Username / Password');
                </script>
            ";
        }
    }
?>