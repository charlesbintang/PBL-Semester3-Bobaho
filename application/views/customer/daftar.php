<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

if (isset($_POST['signup'])) {

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username');
    // enkripsi password
    $password = md5($_POST["password"]);

    // menyiapkan query 
    $sql = "INSERT INTO customer (id_customer, nama_customer, kata_sandi) 
                VALUES (NULL, '$username', '$password');";


    // eksekusi query untuk menyimpan ke database
    $saved = mysqli_query($koneksi, $sql);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if ($saved) header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Bobaho</title>

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
            box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.4);
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
            box-shadow: -3px -3px 4px rgba(255, 255, 255, 0.582), 3px 3px 4px rgba(0, 0, 0, 0.4);
            padding: 19.2px;
            border-radius: 20px;
            border: 2px solid transparent;
            background-color: #d3d2d2dc;
            font-size: larger;
            margin-top: 20px;
            outline: none;
            justify-content: center;

        }

        button:hover {
            background: #d6dad6d3;
            color: #000000;


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
                height: 700px;
            }

            #emaill {
                width: 384px;
                height: 40px;
            }

            button {
                width: 420px;
                height: 55px;
            }
        }
    </style>
</head>

<body>
    <div class="MainContainer">
        <img width="50px" height="56px" style="margin-top: 0px" src="aset boba/person.png" alt="">
        SIGN UP

        <form action="" method="post">
            <div class="input">
                <label class="form-label"></label>
                <input type="text" class="form-control" id="emaill" name="username" placeholder="Username">
                <label class="form-label"></label>
                <input type="password" class="form-control" id="emaill" name="password" style="margin-bottom: 10px;" placeholder="Password">
                <button class="Button" type="submit" name="signup" value="signup" style="margin-top: 20px;">Sign Up</button>
            </div>
        </form>
    </div>
</body>

</html>