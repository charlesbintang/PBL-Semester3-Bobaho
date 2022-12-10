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

if (isset($_POST['form'])) {
    $form = implode(", ", $_POST['form']);
    $sqlKirim = "UPDATE `membeli` SET `catatan` = '" . $form . "' WHERE `membeli`.`id_customer` = '$idCustomer[id_customer]';";
    $qryKirim = mysqli_query($koneksi, $sqlKirim);
    if ($qryKirim) {
        echo '
        <script>
        document.location.href = "' . base_url('menu/payment') . '";
        </script>
        ';
    } else {
        echo '
        <script>
        alert("Gagal mengirim. Silahkan ulangi!");
        document.location.href = "' . base_url('menu/note') . '";
        </script>
        ';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note | Bobaho</title>
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

        .Container {
            width: 335px;
            height: 575px;
            background-color: #d9d9d9b0;
            border: 5px;
            border-radius: 15px;
            margin: 40px auto;
            position: relative;
        }

        .BoxCatatan {
            position: sticky;
            margin: 10px auto;
            padding: 10px 20px 10px 20px;
        }

        #exampleFormControlTextarea1 {
            line-height: 1.4;
            margin-top: 10px;
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            width: 265px;
            height: 360px;
            background-color: #D9D9D9;
        }

        #exampleFormControlInput1 {
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            width: 210px;
            height: 12px;
            background-color: #D9D9D9;
        }

        .ButtonKirim {
            display: inline-flex;
            height: 40px;
            width: 110px;
            padding: 0;
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            /* margin-left: 245px; */
            background: #F5B202;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.25);
            align-items: center;
            justify-content: space-evenly;
            flex-direction: row-reverse;

        }

        .ButtonKirim:hover {
            background: #D99D00;
        }

        .ButtonKirim:active {
            background: #B28100;
        }

        .Button,
        .Button1 {
            display: inline-flex;
            align-items: center;
            padding: 0 24px;
            height: 100%;
        }

        .Button1 {
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.08);
        }

        .tombolBack {
            border-radius: 50%;
            font-size: 24px;
            background-color: transparent;
            width: 35px;
            height: 35px;
            padding: 0;
            border: 1px solid;
        }

        .backButton {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bawah {
            justify-content: space-around;
            display: flex;
        }

        @media all and (min-width: 600px) {
            .Container {
                width: 535px;
                height: 575px;
            }

            #exampleFormControlTextarea1 {
                width: 465px;
                height: 360px;
            }

            #exampleFormControlInput1 {
                width: 410px;
                height: 12px;
            }

        }

        @media all and (min-width: 1000px) {
            .Container {
                width: 835px;
                height: 575px;
            }

            #exampleFormControlTextarea1 {
                width: 765px;
                height: 360px;
            }

            #exampleFormControlInput1 {
                width: 710px;
                height: 12px;
            }

        }
    </style>

</head>

<body>
    <!-- logo dan Judul -->
    <header>
        <img src="<?= base_url('assets/aset boba/'); ?>Judul.png" width="150px" id="Bobaandtea" alt="..." onclick="document.location.href = '<?= base_url('menu/cart'); ?>'">
        <img src="<?= base_url('assets/aset boba/'); ?>logo.png" width="100px" id="ayam" alt="..." onclick="document.location.href = '<?= base_url('menu/cart'); ?>'">
    </header>

    <!-- catatan dan nama -->
    <div class="Container">
        <div class="BoxCatatan">
            <form action="" method="POST">
                <p>Tolong isi form dibawah ini ya!</p>
                <label for="exampleFormControlInput1" class="form-label">Nama : </label>
                <input type="text" name="form[]" class="form-control" id="exampleFormControlInput1" placeholder="Isi nama Anda" required>
        </div>
        <div class="BoxCatatan">
            <label for="exampleFormControlTextarea1" class="form-label">Isi permintaan khusus dan posisi Anda!</label>
            <textarea class="form-control" name="form[]" id="exampleFormControlTextarea1" rows="8" placeholder='contoh: "tidak pakai es batu ya"
"Posisi saya di Kenji Kopitiam, meja dekat dengan sate, baju saya warna biru"' required></textarea>
        </div>
    </div>


    <div class="bawah">

        <!-- tombol back -->
        <div>
            <button class="tombolBack" type="button" onclick="document.location.href = '<?= base_url('menu/cart'); ?>'">
                <span class="backButton">
                    <ion-icon name="arrow-round-back"></ion-icon>
                </span>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

            </button>
        </div>

        <!-- button kirim -->
        <div class="kirim">
            <button class="ButtonKirim" type="submit">
                <span class="button">Kirim</span>
                <span class="button1">
                    <ion-icon name="send"></ion-icon>
                </span>
            </button>
            </form>
            <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        </div>

    </div>

</body>

</html>