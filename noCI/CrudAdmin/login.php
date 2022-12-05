<?php
    session_start();
    $ingataku = "";
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

    if (isset($_COOKIE['cookie_username_admin'])){
        $cookie_username_admin = $_COOKIE['cookie_username_admin'];
        $cookie_password_admin = $_COOKIE['cookie_password_admin'];
    
        $query = "SELECT * FROM admin WHERE nama_admin = '$cookie_username_admin'";
        $result = mysqli_query($koneksi,$query);
        $check = mysqli_fetch_array($result);
        if ($check['kata_sandi'] == $cookie_password_admin){
            $_SESSION['session_username_admin'] = $cookie_username_admin;
            $_SESSION['session_password_admin'] = $cookie_password_admin;
        }                 
    }

    if(isset($_SESSION['session_username_admin'])){
        header("location: index.php");
        exit();
    }

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $ingataku = $_POST['ingataku'];

        if($username == '' or $password == ''){
            echo "<script> 
                alert('Silahkan masukkan username dan password Anda'); 
                window.location = 'login.php'; 
                </script>";
        } else {
            $query = "SELECT * FROM admin WHERE nama_admin = '$username'";
            $result = mysqli_query($koneksi, $query);
            $check = mysqli_fetch_array($result);

            if($check['nama_admin'] == '' || $check['kata_sandi'] != md5($password)){ 
                $err = 1;
            } 

            if($err != 1){
                $_SESSION['session_username_admin'] = $username; //tersimpan dalam server
                $_SESSION['session_password_admin'] = md5($password);

                if($ingataku == 1){
                    $cookie_name = "cookie_username_admin";
                    $cookie_value = $username;
                    $cookie_time = time() + (60 * 60 * 2); //detik, menit, jam. time() digunakan untuk mengambil waktu sekarang
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                    $cookie_name = "cookie_password_admin";
                    $cookie_value = md5($password);
                    $cookie_time = time() + (60 * 60 * 2); 
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
                }

                header("location: index.php");
            } else {
                echo "<script>
                    alert('Username atau password salah');
                    window.location = 'login.php';
                    </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <form action="" method="post">
      <label>Username</label>
      <input type="text" name="username" placeholder="Username"> <br>
      <label>Password</label>
      <input type="password" name="password" placeholder="Password"> <br>
      <label>Ingat Saya</label>
        <input type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> <br>
      <button type="submit" name="login" value="Login">Login</button>
    </form>
</body>
</html>