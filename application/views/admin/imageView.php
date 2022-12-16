<?php
if (isset($_GET['id_cart'])) {
    $koneksi = mysqli_connect("localhost", "root", "", "bobaho");
    $query = mysqli_query($koneksi, "SELECT * FROM dibayar WHERE id_cart = '" . $_GET['id_cart'] . "';");
    $row = mysqli_fetch_array($query);
    header("Content-type: " . $row["tipe_gambar"]);
    echo $row["gambar"];
} else {
    print_r($row);
}
