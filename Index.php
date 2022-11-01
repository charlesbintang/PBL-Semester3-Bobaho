<?php
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == '' or $password == ''){
            echo "<script> alert('Silahkan masukkan username dan password Anda'); </script>";
            $err = 1;
        } else {
            $query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $check = mysqli_fetch_array($result);

            if($check['username'] == '' || $check['password'] != md5($password)){ 
                $err = 1;
            } 

            if($err != 1){
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = md5($password);
                header("location: login.php");
            } else {
                echo "<script>
                    alert('Username atau password salah');
                    window.location = 'index.php';
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/login.css?v=0.0.2">
    <title>Login | CRUD PHP</title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD | PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<!-- Close Navbar -->

<!-- Container -->

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <form action="" method="post">
                <h4 class="my-5 fw-bold">Login</h4>
                <div class="mb-3">
                    <input type="text" class="form-control w-50" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50" name="password" placeholder="Password">
                </div>
                <button type="submit" value="login" name="login" class="btn btn-primary text-uppercase">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Close Container -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>