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

if (isset($_POST['submit'])) {
    if (!isset($_FILES['gambar']['tmp_name'])) {
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    } else {
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png')) {
            $image = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $upload = mysqli_query($koneksi, "UPDATE `membeli` SET gambar = '$image', tipe_gambar = '$file_type' WHERE `membeli`.`id_customer` = '" . $idCustomer['id_customer'] . "'");
            $_SESSION['QRIS'] = true;
        } else {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
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
    <title>Payment | Bobaho</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>Topping.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JQuery-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #E3D9CF;
            padding: 0 1rem;
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

        .container {
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 5px;
            width: 350px;
        }

        .totalBelanja {
            margin-right: auto;
            margin-left: auto;
            width: 170px;
        }

        .table {
            color: #fff;
            background-color: #28533F;
            border-color: transparent;
            border-radius: 15px;
        }

        @media all and (min-width: 552px) {
            .container {
                width: 516px;
            }
        }
    </style>

</head>

<body>
    <!-- logo dan Judul -->
    <header>
        <img src="<?= base_url('assets/'); ?>aset boba/Judul.png" width="150px" id="Bobaandtea" alt="">
        <img src="<?= base_url('assets/'); ?>aset boba/logo.png" width="100px" id="ayam" alt="">
    </header>

    <?php
    $sqlMembeli = "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]'; ";
    $result = mysqli_query($koneksi, $sqlMembeli);
    $check = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0 && $check['catatan'] != ' ') {
        //session payment, untuk mencegah user direct ke notifQRIS/notifCash tanpa melalui payment
        session_start();
        $_SESSION['session_payment'] = $idCustomer['id_customer'];
        // looping php, dibeli
        $totalPembayaran = 0;
        $sqlMembeli = "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]'; ";
        $result = mysqli_query($koneksi, $sqlMembeli);
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <div class="container">
                <table class="table">
                    <tr>
                        <td rowspan="2" style="width: 35%;" align="center">
                            <img src="<?= base_url('assets/') ?>aset boba/1x/<?php echo $row["src_gambar"]; ?>" alt="..." width="50%">
                        </td>
                        <td rowspan="2" class="boba">
                            <h6><?php echo $row["nama_produk"]; ?></h6> <img src="<?= base_url('assets/') ?>aset boba/bintang.png" alt="..." class="bintang" style="margin-bottom:-1px;">&nbsp;<?php echo $row["rating"]; ?>
                        </td>
                        <td style="padding-top:17px;">
                            <span class="box">Rp&nbsp;<?php echo $row["total_harga"]; ?>.000</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="left" style="padding-left: 10px; padding-bottom:10px;">
                            <?php
                            //konversi nilai string dari table topping dan extra topping ke array
                            $arrTopping = explode(",", $row['topping']);
                            $jumlahTopping = count($arrTopping);
                            $arrExtraTopping = explode(",", $row['extratopping']);
                            $jumlahExTop = count($arrExtraTopping);

                            //buat update harga jika tidak ada isi dari table topping dan extra topping
                            if ($jumlahTopping == 1 && $jumlahExTop == 1) {
                                echo "Tidak ada topping terpilih..";
                            } else {
                                if ($jumlahTopping > 1) {
                                    for ($z = 0; $z < $jumlahTopping; $z++) {
                                        echo $arrTopping[$z] . "<br>";
                                    }
                                }
                                if ($jumlahExTop > 1) {
                                    for ($w = 0; $w < $jumlahExTop; $w++) {
                                        echo $arrExtraTopping[$w] . "<br>";
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        <?php $totalPembayaran += $row["total_harga"];
        } ?>
        <?php if ($upload) { ?>
            <!-- Button trigger modal -->
            <button type="button" id="btnModel" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display: none;">
                Alert
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Bobaho</h1>
                            <button type="button" class="btn-close" onclick="document.location.href = '<?= base_url('menu/email') ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Pesanan diterima! Mohon menunggu sebentar hingga diarahkan ke halaman berikutnya.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="document.location.href = '<?= base_url('menu/email') ?>'" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    document.querySelector('#btnModel').click();
                });
            </script>
        <?php } ?>

        <h4 style="display:flex; justify-content:center;">Total Belanja: <?php echo "Rp " . number_format($totalPembayaran, 3); ?></h4>

        <h3 style="display:flex; justify-content:center;">Silahkan Bayar Melalui QRIS</h3>

        <div id="barcode">
            <img height="400px" src="<?= base_url('assets/'); ?>aset boba/barcode.jpg" alt="">
        </div>

        <h3 style="display:flex; justify-content:center; width:auto;">Sertakan bukti Screenshot-nya!</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div style="display:flex; justify-content:center;">
                <input name="gambar" type="file" accept=".jpg" required>
            </div>
            <div style="display:flex; justify-content:center; padding-top:10px;">
                <input type="submit" name="submit" style="padding: 5px 15px;">
            </div>
        </form>
        <h3 style="display:flex; justify-content:center;">Atau Bayar Melalui Kasir</h3>

        <div class="bayartulisan">
            <button id="bayar" type="button">Bayar Cash</button>
        </div>

        <!-- Button trigger model -->
        <button type="button" id="btnModelCash" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropCash" style="display: none;">
            Alert
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdropCash" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Bobaho</h1>
                        <button type="button" class="btn-close" onclick="document.location.href = '<?= base_url('menu/email') ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Pesanan diterima! Mohon menunggu sebentar hingga diarahkan ke halaman berikutnya.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="document.location.href = '<?= base_url('menu/email') ?>'" data-bs-dismiss="modal">Oke</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#bayar').click(function() {
                document.querySelector('#btnModelCash').click();
            });
        </script>


        <!-- tombol back -->
        <div>
            <button class="tombolBack" type="button" onclick="document.location.href = '<?= base_url('menu/note') ?>'">
                <span class="backButton">
                    <ion-icon name="arrow-round-back"></ion-icon>
                </span>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

            </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php } else {
        redirect('menu');
    } ?>
</body>

</html>