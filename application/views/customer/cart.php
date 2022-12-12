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

//tampilkan boba yang aktif
$sqlBobaAktif = "SELECT * FROM `menu_costumer` WHERE jenis_produk = 'topping' AND status_produk = '1';";
$qryBobaAktif = mysqli_query($koneksi, $sqlBobaAktif);
$arrToppingAktif = [];
$arrToppingBoba = [];
while ($bobaAktif = mysqli_fetch_array($qryBobaAktif)) {
    $arrToppingAktif[] = $bobaAktif["nama_produk"];
    $arrToppingBoba[] = $bobaAktif["src_gambar"];
}
$jumlahBoba = count($arrToppingAktif);



//proses post untuk pilih Topping
if (isset($_POST['submit'])) {
    $idCart = $_POST['id_cart'];

    $updateHarga = "UPDATE `membeli` SET total_harga = harga * jumlah_pesanan WHERE `membeli`.`id_customer` = '" . $idCustomer['id_customer'] . "' AND `membeli`.`id_cart` = '" . $idCart . "';";
    mysqli_query($koneksi, $updateHarga);

    $sqlIsi = "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]' AND id_cart = '$idCart' ";
    $qryIsi = mysqli_query($koneksi, $sqlIsi);
    $rowIsi = mysqli_fetch_array($qryIsi);
    $arrTopping = [];
    for ($a = 1; $a <= $rowIsi["jumlah_pesanan"]; $a++) {
        $arrTopping[] = $_POST['pilihTopping' . $a . ''];
    }
    $topping = implode($arrTopping);
    if ($topping) {
        $isiExtraTopping = $rowIsi['extratopping'];
        $extraTopping = implode($_POST['pilihExtraTopping']);
        $xharga = $_POST['pilihExtraTopping'];
        $yharga = count($xharga);
        $harga = 0;
        for ($i = 1; $i <= $yharga; $i++) {
            $harga += 2;
        }
        $ubahHarga = $harga;
        $sqlTopping = "UPDATE `membeli` SET total_harga = total_harga + $ubahHarga, topping = '" . $topping . "', extratopping = '" . $extraTopping . "' WHERE `membeli`.`id_cart` = '$idCart';";
        $qryExtraTopping = mysqli_query($koneksi, $sqlTopping);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Bobaho</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>Topping.css">

</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar fixed-top bg-green" style="top: -8px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('menu'); ?>">Boba and Tea</a>
                <img src="<?= base_url('assets/') ?>aset boba/logo bobaho.png" alt="tidak tersedia" width="98px" style="padding-top:2px;" onclick="document.location.href ='<?= base_url('menu'); ?>'">

                <button type="button" class="btn btn-secondary" style="width: 80px; border-top-width: 0; padding-top: 0; padding-bottom: 0;" onclick="document.location.href= '<?= base_url('menu'); ?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80%" viewBox="0 0 24 24">
                        <path fill="#fff" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z"></path>
                    </svg>
                    <path fill="#000000" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                    </svg>
                </button>

                <div class="pengenbuatline">&nbsp;</div>
            </div>
        </nav>
    </header>
    <!-- Close Navbar -->

    <!-- Boba -->
    <main class="container">
        <?php
        // looping php, dibeli
        $sqlMembeli = "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]'; ";
        $result = mysqli_query($koneksi, $sqlMembeli);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <table class="table">
                    <tr>
                        <td rowspan="2" style="width: 35%;" align="center">
                            <img src="<?= base_url('assets/') ?>aset boba/1x/<?php echo $row["src_gambar"]; ?>" alt="..." width="50%">
                        </td>
                        <td rowspan="2" class="boba">
                            <h6><?php echo $row["nama_produk"]; ?></h6> <img src="<?= base_url('assets/') ?>aset boba/bintang.png" alt="..." class="bintang">&nbsp;<?php echo $row["rating"]; ?>
                        </td>
                        <td style="padding-top:35px;">
                            <span class="box">Rp&nbsp;<?php echo $row["total_harga"]; ?>.000</span>
                        </td>
                        <td><br>
                            <button class="btn btn-danger" onclick="confirm('Apakah Anda yakin?') ? document.location.href = '<?= base_url('menu/delete') ?>?del=<?= $row['id_cart'] ?>' : ''">X</button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="left">
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
                                echo '
                                <div class="mx-auto" style="width: 185px;">
                                    <button class="btn btn-danger"><a href="' . base_url('menu/delete') . '?delTop=' . $row['id_cart'] . '" style="text-decoration:none; color:white;">Hapus Semua Topping</a></button>
                                </div>
                                <hr>';
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <p>
                                <button class="btn btn-success" type="button" id="btn-topping" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $row["id_cart"] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row["id_cart"] ?>">
                                    Topping
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7%" viewBox="0 0 24 24" style="margin: auto;">
                                        <path fill="#b2b3b4" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                    </svg>
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample<?php echo $row["id_cart"] ?>">
                                <?php
                                for ($x = 1; $x <= $row["jumlah_pesanan"]; $x++) { ?>
                                    <!-- Topping -->
                                    <table class="table">

                                        <tr>
                                            <td colspan="8" align="center">Pilihan <?php echo $x ?>:</td>
                                        </tr>
                                        <tr>
                                            <!-- Tanpa Topping -->
                                            <td colspan="8">Tanpa Topping:</td>
                                        </tr>
                                        <tr align="center">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="flexCheckDefault" type="checkbox" data-bs-toggle="collapse" data-bs-target="#collapseTopping<?php echo $row["id_cart"];
                                                                                                                                                                                    echo $x; ?>" aria-expanded="true" aria-controls="collapseTopping<?php echo $row["id_cart"];
                                                                                                                                                                                                                                                    echo $x; ?>">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse show" id="collapseTopping<?php echo $row["id_cart"];
                                                                                    echo $x; ?>">
                                        <table class="table">
                                            <form action="" method="post">
                                                <input type="hidden" name="id_cart" value="<?php echo $row["id_cart"] ?>">
                                                <tr>
                                                    <td colspan="8">Topping:</td>
                                                </tr>
                                                <!-- Bonus Topping  -->
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td> <img src="<?= base_url('assets/aset boba/'), $arrToppingBoba[$y]; ?>" alt="..." width="30px"></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td><?= $arrToppingAktif[$y]; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td>
                                                            <div class="mx-auto">
                                                                <input class="form-check-input" type="radio" name="pilihTopping<?= $x ?>" id="flexRadioDefault1" value="Pilihan <?php echo $x ?>: <?php echo $arrToppingAktif[$y] ?>,">
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                                <!-- Extra Topping -->
                                                <tr>
                                                    <td colspan="8">Extra Topping: +2K/Topping</td>
                                                </tr>
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td> <img src="<?= base_url('assets/aset boba/'), $arrToppingBoba[$y]; ?>" alt="..." width="30px"></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td><?= $arrToppingAktif[$y]; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr align="center">
                                                    <?php for ($y = 0; $y < $jumlahBoba; $y++) { ?>
                                                        <td>
                                                            <div class="mx-auto">
                                                                <input class="form-check-input" type="checkbox" name="pilihExtraTopping[]" id="flexCheckDefault" value="Extra topping pilihan <?php echo $x ?>: <?php echo $arrToppingAktif[$y] ?>,">
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                        </table>
                                        <hr>
                                    </div>
                                <?php   }  ?>
                                <div class="mx-auto" style="width: 95px;">
                                    <button type="submit" class="btn btn-success" name="submit">
                                        Selesai
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php } ?>
            <!-- Close Boba -->
    </main>


    <footer>
        <?php
            $totalPembayaran = 0;
            $result = mysqli_query($koneksi, $sqlMembeli);
            while ($row = mysqli_fetch_array($result)) {
                $totalPembayaran += $row["total_harga"];
            }
        ?>
        <nav class="navbar navbar-expand-lg fixed-bottom bg-green" style="padding-bottom: 0;">
            <div class="container-fluid" style="padding-right: 0;padding-left: 0;padding-bottom:0;">
                <button type="button" class="btn btn-warning" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" onclick="document.location.href = '<?= base_url('menu/note'); ?>'">Bayar Sekarang <br>
                    <h4><?php echo "Rp " . number_format($totalPembayaran, 3); ?></h4>
                </button>
            </div>
            </div>
        </nav>
    </footer>
<?php } else { ?>
    <p align="center">Keranjang Anda kosong! Silahkan kembali ke <a href="<?= base_url('menu') ?>" style="color:#212529">menu</a>.</p>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>