<?php
    session_start();
    $ingataku = "";
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

    if (isset($_COOKIE['cookie_username'])){
        $cookie_username = $_COOKIE['cookie_username'];
        $cookie_password = $_COOKIE['cookie_password'];
    
        $query = "SELECT * FROM customer WHERE nama_customer = '$cookie_username'";
        $result = mysqli_query($koneksi,$query);
        $check = mysqli_fetch_array($result);
        if ($check["kata_sandi"] == $cookie_password){
            $_SESSION['session_username'] = $cookie_username;
            $_SESSION['session_password'] = $cookie_password;
            header("location: index.php");
            exit();
        }                 
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
            $query = "SELECT * FROM customer WHERE nama_customer = '$username'";
            $result = mysqli_query($koneksi, $query);
            $check = mysqli_fetch_array($result);

            if($check['nama_customer'] == '' || $check['kata_sandi'] != md5($password)){ 
                $err = 1;
            } 

            if($err != 1){
                $_SESSION['session_username'] = $username; //tersimpan dalam server
                $_SESSION['session_password'] = md5($password);

                if($ingataku == 1){
                    $cookie_name = "cookie_username";
                    $cookie_value = $username;
                    $cookie_time = time() + (60 * 60 * 1); //detik, menit, jam. time() digunakan untuk mengambil waktu sekarang
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                    $cookie_name = "cookie_password";
                    $cookie_value = md5($password);
                    $cookie_time = time() + (60 * 60 * 1); 
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Bobaho</title>

    <style>
        body {
            background-color: #69916F;
            margin: 0;
            padding: 0;
        }
        .MainContainer {
            width: 350px;
            height: 500px;
            border-radius: 45px;
            background-color: #D6D5D5;
            margin: auto;
            margin-top: 230px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }
        .person {
            display: flex;
            justify-content: center;
        }
        #emaill {
            box-shadow: inset 3px 3px 4px rgba(0,0,0,0.4) ;
            padding: 10px;
            border: 1px solid grey;
            display: flex;
            justify-content: center;
            margin-top: 30px;
            padding: 1em;
            border-radius: 25px;
            margin: auto;
            border: 2px solid transparent;
            outline: none;
            width: 234px;
            height: 40px;
            background-color: #d3d2d2;
            margin-top: 30px;
            font-size: larger;
        }

        button {
            
            width: 270px;
            height: 55px;
            display: flex;
            align-items: center;
            box-shadow: -3px -3px 4px rgba(255, 255, 255, 0.582), 3px 3px 4px rgba(0,0,0,0.4);
            padding: 19.2px;
            border-radius: 20px;
            border: 2px solid transparent;
            background-color: #d3d2d2dc;
            font-size: larger;
            margin-top: 20px
            outline: none;
            justify-content: center;
        
        }
        button:hover {
        background:#d6dad6d3;
        color:#000000;
        
           
        }
        button:active {
            background: #caceca;
            color: #000000;
            font-weight: bold;
        }

        .input {
            margin-top: -30px;
        }

        @media all and (min-width: 700px) {
            .MainContainer {
            width: 550px;
            height: 700px;}
            
            #emaill {
            width: 384px;
            height: 40px;
            }

            button {
            width: 420px;
            height: 55px;}
        }
    </style>
</head>
<body>
    <div class="MainContainer">
        <img width="50px" height="56px" style="margin-top: 0px" src="aset boba/person.png" alt="">
        SIGN IN
        
        <form action="" method="post">
        <div class="input">
        <label class="form-label"></label>
        <input type="text" class="form-control" id="emaill" name="username"  placeholder="Username">
        <label class="form-label"></label>
        <input type="password" class="form-control" id="emaill" name="password" style="margin-bottom: 10px;" placeholder="Password">
        <label class="form-label" style="margin-left: 40px;">Ingat Saya</label>
        <input type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> <br>
        <button class="Button" type="submit" name="login" value="Login" style="margin-top: 20px;">Sign In</button>
        </div>
        </form>        
    </div>
        <p align="center">Belum punya akun? <a href="daftar.php">Daftar di sini!</a></p>
</body>
</html>