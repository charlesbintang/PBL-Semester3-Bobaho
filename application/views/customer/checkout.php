<?php
//start of "wajib ada"
session_start();
//hapus error reporting ketika debugging. Jangan hapus jika tidak debugging
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION['session_username'])) {
    header("location: " . base_url() . "");
}
$koneksi = mysqli_connect("localhost", "root", "", "bobaho");
$sesUnCus = $_SESSION['session_username'];
$sqlIdCus = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
$qryIdCus = mysqli_query($koneksi, $sqlIdCus);
$idCustomer = mysqli_fetch_array($qryIdCus);
//end of "wajib ada"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Bobaho</title>
    <style>
        body {
            background-color: #E3D9CF;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 10px;
            margin-top: 10px;
        }

        #barcode {
            display: flex;
            justify-content: center;
            margin: auto;
            margin-top: 10px;
        }

        .bayartulisan {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #bayar {
            display: flex;
            justify-content: center;
            margin: auto;
            height: 30px;
            width: 170px;
            outline: none;
            border-radius: 10px;
            border: 2px solid transparent;
            background-color: #B31A21;
            color: white;
            align-items: center;
        }

        #bayar:hover {
            background-color: #9c171d;
        }

        #bayar:active {
            background-color: #cf1e27;
        }

        .tombolBack {
            border-radius: 50%;
            font-size: 24px;
            background-color: transparent;
            width: 35px;
            height: 35px;
            padding: 0;
            border: 1px solid transparent;
            margin-left: 5px;
        }

        .tombolBack:hover {
            color: #2c2c2c;
        }

        .tombolBack:active {
            color: #858585;
        }

        .backButton {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        h3 {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <!-- logo dan Judul -->
    <header>
        <img src="<?= base_url('assets/'); ?>aset boba/Judul.png" width="150px" id="Bobaandtea" alt="">
        <img src="<?= base_url('assets/'); ?>aset boba/logo.png" width="100px" id="ayam" alt="">
    </header>

    <div id="barcode">
        <img height="400px" src="<?= base_url('assets/'); ?>aset boba/barcode.jpg" alt="">
    </div>

    <h3 style="display:flex; justify-content:center;">Sertakan bukti Screenshot-nya ya!</h3>
    <div style="display:flex; justify-content:center;">
        <input class="form-control" type="file" id="formFile">
    </div>

    <h3 style="display:flex; justify-content:center;">Atau Bayar Melalui Kasir</h3>

    <div class="bayartulisan">
        <button id="bayar" type="button">Bayar Cash</button>
    </div>



    <!-- tombol back -->
    <div>
        <button class="tombolBack" type="button" onclick="document.location.href = 'Topping.php'">
            <span class="backButton">
                <ion-icon name="arrow-round-back"></ion-icon>
            </span>
            <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        </button>
    </div>

</body>

</html>