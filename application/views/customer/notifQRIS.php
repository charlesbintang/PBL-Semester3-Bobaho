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

//mengirim email jika user sudah ada session payment
if (isset($_SESSION['session_payment'])) {
    $this->_sendEmail();
} else {
    redirect('menu');
}

//kode pesanan
$sqlMembeli = "SELECT * FROM membeli WHERE id_customer = '$idCustomer[id_customer]'; ";
$result = mysqli_query($koneksi, $sqlMembeli);
$row = mysqli_fetch_array($result);
$kodePesanan = "A" . $idCustomer['id_customer'] . "" . $row['id_cart'] . "";
$sqlKirim = "UPDATE `membeli` SET catatan = '" . $row['catatan'] . " | " . $kodePesanan . "' WHERE `membeli`.`id_customer` = '" . $idCustomer['id_customer'] . "'";
mysqli_query($koneksi, $sqlKirim);

//duplikasi isi tabel dan pindahkan ke tabel dibayar
$sqlDibayar = "INSERT INTO dibayar SELECT * FROM membeli WHERE `membeli`.`id_customer` = '$idCustomer[id_customer]';";
mysqli_query($koneksi, $sqlDibayar);
$sqlHapus = "DELETE FROM membeli WHERE `membeli`.`id_customer` = '$idCustomer[id_customer]';";
mysqli_query($koneksi, $sqlHapus);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Bobaho</title>

    <script>
    </script>
    <style>
        body {
            background-color: #69916F;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 10px;
            margin-top: 10px;
        }

        .Pemberitahuan {
            width: 88%;
            height: 190px;
            border: 2px solid transparent;
            border-radius: 10px;
            text-align: center;
            background: #D9D9D9;
            color: #28533F;
            margin: 100px auto;
            align-items: center;
            padding: 5px;
        }

        #yamiDanchou {
            display: flex;
            align-items: center;
            margin-left: 13px;
            justify-content: space-between;
            opacity: 85%;
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
            float: left;
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
        }

        .Footer {
            margin-top: auto;
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-top: -35px;
        }

        @media all and (min-width: 360px) {
            #yamiDanchou {
                width: 220px;
            }

            h1 {
                font-size: 27px;
            }
        }

        @media all and (min-width: 560px) {
            #yamiDanchou {
                width: 260px;
            }

            h1 {
                font-size: 40px;
            }
        }
    </style>
</head>

<body>
    <!-- judul dan logo -->
    <header>
        <img src="<?= base_url('assets/aset boba/'); ?>Judul.png" width="150px" id="Bobaandtea" alt="">
        <img src="<?= base_url('assets/aset boba/'); ?>logo.png" width="100px" id="ayam" alt="">
    </header>

    <!-- isi pesan -->
    <div class="Pemberitahuan">
        <h1>Pesanan Anda diterima! </h1>
        <p align="center">Namun Kami akan verifikasi terlebih dahulu. Jika sesuai akan langsung dibuat! Mohon menunggu. <br> Kode pesanan Anda :<span id="kodePesanan"> <?= $kodePesanan; ?> </span> </p>
        <p>Ditunggu pesanan selanjutnya!</p>
    </div>

    <footer class="Footer">
        <!-- tombol back -->
        <button class="tombolBack" type="button" onclick="document.location.href = '<?= base_url('menu') ?>'">
            <span class="backButton">
                <ion-icon name="arrow-round-back"></ion-icon>
            </span>
            <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        </button>

        <!-- yami paling keren sedunia -->
        <div id="footer">
            <div class="yamiDanchou">
                <img src="<?= base_url('assets/aset boba/'); ?>bobaberry.png" width="100px" id="yamiDanchou" alt="">
            </div>
        </div>
    </footer>
</body>

</html>