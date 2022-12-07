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
} else {
    "<script>
            document.location.href = '" . base_url('menu/cart') . "'
            </script>";
}
