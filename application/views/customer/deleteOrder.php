<?php
if ($_GET['del']) {
    $hapusIdCart = $_GET['del'];
    function hapus($hapusIdCart)
    {
        $koneksi = mysqli_connect("localhost", "root", "", "bobaho");
        $sqlDelete = "DELETE FROM `membeli` WHERE id_cart = '$hapusIdCart';";
        mysqli_query($koneksi, $sqlDelete);

        return mysqli_affected_rows($koneksi);
    }
    if (hapus($hapusIdCart) > 0) {
        echo
        "<script>
            alert('Pesanan berhasil dihapus');
            document.location.href = '" . base_url('menu/cart') . "'
            </script>";
    } else {
        echo
        "<script>
            alert('Pesanan gagal dihapus');
            document.location.href = '" . base_url('menu/cart') . "'
            </script>";
    }
} //else {
//     "<script>
//             document.location.href = '" . base_url('menu/cart') . "'
//             </script>";
// }
if ($_GET['delTop']) {
    $hapusIdCart = $_GET['delTop'];
    function hapus($hapusIdCart)
    {
        $koneksi = mysqli_connect("localhost", "root", "", "bobaho");
        $sesUnCus = $_SESSION['session_username'];
        $sqlIdCus = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
        $qryIdCus = mysqli_query($koneksi, $sqlIdCus);
        $idCustomer = mysqli_fetch_array($qryIdCus);
        $sqlDelete = "UPDATE `membeli` SET `topping` = NULL, `extratopping` = NULL WHERE `membeli`.`id_cart` = '$hapusIdCart';";
        mysqli_query($koneksi, $sqlDelete);

        $updateHarga = "UPDATE `membeli` SET total_harga = harga WHERE `membeli`.`id_customer` = '" . $idCustomer['id_customer'] . "' AND `membeli`.`id_cart` = '" . $hapusIdCart . "';";
        mysqli_query($koneksi, $updateHarga);

        return mysqli_affected_rows($koneksi);
    }
    if (hapus($hapusIdCart) > 0) {
        echo
        "<script>
            document.location.href = '" . base_url('menu/cart') . "'
            </script>";
    } else {
        echo
        "<script>
            alert('Pesanan gagal dihapus');
            document.location.href = '" . base_url('menu/cart') . "'
            </script>";
    }
}
