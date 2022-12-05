<?php
    //start of "wajib ada"
    session_start();
    //hapus error reporting ketika debugging. Jangan hapus jika tidak debugging
    error_reporting(0);
    date_default_timezone_set("Asia/Jakarta");
    if(!isset($_SESSION['session_username'])){
    header("location: login.php");
    }
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
    $sesUnCus = $_SESSION['session_username'];
    $sqlIdCus = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
    $qryIdCus = mysqli_query($koneksi, $sqlIdCus);
    $idCustomer = mysqli_fetch_array($qryIdCus);
    //end of "wajib ada"

    //proses delete cart
    if(!empty($_GET['del'])){
        $hapusIdCart = $_GET['del'];
        function hapus($hapusIdCart){
            global $koneksi;
            mysqli_query($koneksi, "DELETE FROM membeli WHERE membeli.id_cart = $hapusIdCart");
        
            return mysqli_affected_rows($koneksi);
        }
        if (hapus($hapusIdCart) > 0 ){
            echo
            "<script>
            alert('Pesanan berhasil dihapus');
            </script>"; 
        } else {
            echo
            "<script>
            alert('Pesanan gagal dihapus');
            </script>";
        }
    }
    
    //tampilkan boba yang aktif
    $arrToppingAktif = [];
    $sqlBobaAktif = "SELECT nama_produk FROM `menu_costumer` WHERE jenis_produk = 'topping' AND status_produk = '1';";
    $qryBobaAktif = mysqli_query($koneksi, $sqlBobaAktif);
    while($bobaAktif = mysqli_fetch_array($qryBobaAktif)){
        $arrToppingAktif[] = $bobaAktif["nama_produk"];
    }
    $jumlahBoba = count($arrToppingAktif);
    

    //proses post untuk pilih Topping
    if(isset($_POST['pilihTopping'])){
        $idcart = $_POST['id_cart'];
        $topping = $_POST['pilihTopping'];
        $sqlIsi= "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]' AND id_cart = '$idcart' ";
        $qryIsi = mysqli_query($koneksi ,$sqlIsi);
        $rowIsi = mysqli_fetch_array($qryIsi);
        $isiTopping = $rowIsi['topping'];
        
            $sqlTopping = "UPDATE `membeli` SET topping = '".$isiTopping . $topping."' WHERE `membeli`.`id_cart` = '$idcart' AND `membeli`.`id_customer` = '$idCustomer[id_customer]';";
            $qryTopping = mysqli_query($koneksi, $sqlTopping);
            if ($qryTopping){
                echo '
                <script> 
                alert("Topping berhasil diperbarui!");
                document.location.href = "Topping.php";
                </script>
                ';
            } else {
                echo '
                <script> alert("Topping gagal diperbarui..")</script>
                ';
            }
            
    } 
    
    if (isset($_POST['pilihExtraTopping'])) {
        $idcart = $_POST['id_cart'];
        $sqlIsi= "SELECT * FROM membeli INNER JOIN menu_costumer ON membeli.id_menu = menu_costumer.id_menu WHERE id_customer = '$idCustomer[id_customer]' AND id_cart = '$idcart' ";
        $qryIsi = mysqli_query($koneksi ,$sqlIsi);
        $rowIsi = mysqli_fetch_array($qryIsi);
        $isiExtraTopping = $rowIsi['extratopping'];
        $extraTopping = implode(",", $_POST['pilihExtraTopping']);
        $xharga = $_POST['pilihExtraTopping'];
        $yharga = count($xharga);
        $harga = 0;
        for ($i=1; $i <= $yharga; $i++) { 
            $harga += 2;
        }
        $ubahHarga = $harga; 
        $sqlExtraTopping = "UPDATE `membeli` SET total_harga = total_harga + $ubahHarga, extratopping = '". $isiExtraTopping . $extraTopping."' WHERE `membeli`.`id_cart` = '$idcart' AND `membeli`.`id_customer` = '$idCustomer[id_customer]';";
        $qryExtraTopping = mysqli_query($koneksi, $sqlExtraTopping);
        if ($qryExtraTopping){
            echo '
            <script> 
            alert("Extra Topping berhasil diperbarui!");
            document.location.href = "Topping.php";
            </script>
            ';
        } else {
            echo '
            <script> alert("Extra Topping gagal diperbarui..")</script>
            ';
        }
    }
    
    //konversi nilai string di table topping dan extra topping ke array
    $sqlKonversi = "SELECT * FROM membeli WHERE id_customer = '$idCustomer[id_customer]'; ";
    $qryKonversi = mysqli_query($koneksi ,$sqlKonversi);
    $toppingExtraTopping = mysqli_fetch_array($qryKonversi);
    $arrTopping = explode(",", $toppingExtraTopping['topping']);
    // echo $arrTopping[0]; 
    $arrExtraTopping = explode(",", $toppingExtraTopping['extratopping']);
    // echo $arrExtraTopping[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobaho</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="Topping.css">
    
</head>
<body>
<!-- Navbar -->
<header>
<nav class="navbar fixed-top bg-green">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Boba and Tea</a>
    <img src="aset boba/logo bobaho.png" alt="tidak tersedia" width="25%" onclick="document.location.href ='index.php'">
    
        <button type="button" class="btn btn-secondary" style="width: 80px; border-top-width: 0; padding-top: 0; padding-bottom: 0;" onclick="document.location.href= 'index.php'">
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
    $result = mysqli_query($koneksi ,$sqlMembeli);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
    ?>
    <table class="table">
        <tr>
            <td rowspan="2" style="width: 35%;" align="center">
                <img src="aset boba/1x/<?php echo $row["src_gambar"]; ?>" alt="..." width="50%">        
            </td>
            <td rowspan="2" class="boba"> <h6><?php echo $row["nama_produk"]; ?></h6> <img src="aset boba/bintang.png" alt="..." class="bintang">&nbsp;<?php echo $row["rating"]; ?></td>
            <td style="padding-top:35px;">
                <span class="box">Rp&nbsp;<?php echo $row["total_harga"]; ?>.000</span>
            </td>
            <td><br>
                <button class="btn btn-danger" onclick="return(confirm('Apakah Anda yakin?'))"><a href="Topping.php?del=<?php echo $row['id_cart']?>" style="text-decoration:none; color:white;">X</a></button>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><p>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $row["id_cart"]?>" aria-expanded="false" aria-controls="collapseExample<?php echo $row["id_cart"]?>">
                Topping
                <svg xmlns="http://www.w3.org/2000/svg" width="7%" viewBox="0 0 24 24" style="margin: auto;">
                    <path fill="#b2b3b4" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                </svg>
                </button>
                </p>
                <?php
                    for($x = 1; $x <= $row["jumlah_pesanan"]; $x++ ){ ?>
                        <div class="collapse" id="collapseExample<?php echo $row["id_cart"]?>">
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
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" data-bs-toggle="collapse" data-bs-target="#collapseTopping<?php echo $row["id_cart"];echo $x;?>" aria-expanded="true" aria-controls="collapseTopping<?php echo $row["id_cart"];echo $x;?>">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>    
            
                        <div class="collapse show" id="collapseTopping<?php echo $row["id_cart"];echo $x;?>">      
                            <table class="table">
                            <form action="" method="post">
                            <input type="hidden" name="id_cart" value="<?php echo $row["id_cart"]?>">  
                                <tr>
                                    <td colspan="8">Topping:</td>
                                </tr>
                                <!-- Bonus Topping  -->
                                <tr align="left">
                                    <?php for ($y=0; $y < $jumlahBoba; $y++) { ?>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihTopping" id="flexRadioDefault1" value="Pilihan <?php echo $x ?>: <?php echo $arrToppingAktif[$y] ?>," <?php if($arrTopping[$y] == "Pilihan ".$x.": ".$arrToppingAktif[$y].""){ echo "checked";} ?>>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            </label>
                                        </div>
                                    </td>
                                    <?php } ?>
                                </tr>

                                <tr align="left">
                                    <?php for ($y=0; $y < $jumlahBoba; $y++) { ?>
                                    <td><?php echo $arrToppingAktif[$y] ?></td>
                                    <?php } ?>
                                </tr>
                                        <!-- Extra Topping -->
                                <tr>
                                    <td colspan="8"> Extra Topping: +2K/Topping</td>
                                </tr>
                                    <tr align="center">
                                        <?php for ($y=0; $y < $jumlahBoba; $y++) { ?>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="pilihExtraTopping[]" id="flexCheckDefault" value="Pilihan <?php echo $x ?>: <?php echo $arrToppingAktif[$y] ?>," <?php if($arrExtraTopping[$y] == "Pilihan ".$x.": ".$arrToppingAktif[$y].""){ echo "checked";} ?>>
                                            <label class="form-check-label" for="flexCheckDefault">
                                            </label>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>                                
                                    <tr align="left">
                                        <?php for ($y=0; $y < $jumlahBoba; $y++) { ?>
                                        <td><?php echo $arrToppingAktif[$y]; ?></td>
                                        <?php } ?>
                                    </tr>
                            </table>
                                    <button type="submit" >Tekan Aku jika sudah selesai memilih Topping!</button>
                                    </form>  
                        </div>
                        </div>
            <?php   }  ?>
            </td>
        </tr>
    </table>
    <?php } ?> 
    <!-- Close Boba -->
</main>


<footer>
    <?php 
    $totalPembayaran = 0;
    $result = mysqli_query($koneksi ,$sqlMembeli);
    while($row = mysqli_fetch_array($result)){
        $totalPembayaran += $row["total_harga"];
    }
    ?>
    <nav class="navbar navbar-expand-lg fixed-bottom bg-green" style="padding-bottom: 0;">
    <div class="container-fluid" style="padding-right: 0;padding-left: 0;padding-bottom:0;">
            <button type="button" class="btn btn-warning" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" onclick="document.location.href = 'barcode.php'">Bayar Sekarang <br> <h4><?php echo "Rp ".number_format($totalPembayaran, 3); ?></h4></button>
        </div>  
    </div>
    </nav>
</footer>  
    <?php } else { ?>
    <p align="center">Keranjang Anda kosong! Silahkan kembali ke menu.</p>
    <?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>