<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

if(!$koneksi){
  die("Gagal terhubung dengan database : " . mysqli_connect_error());
}

$jenisproduk = $_POST['jenisproduk'];
$kategori = $_POST['kategori'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$catatan = $_POST['catatan'];

$query = "INSERT INTO `menu_costumer` (`id_menu`, `jenisproduk`, `kategori`, `namaproduk`, `harga`, `jumlahproduk`, `catatan`) VALUES (NULL, '$jenisproduk', '$kategori', '$namaproduk', '$harga', '$jumlahproduk','$catatan');";

mysqli_query($koneksi, $query);

if (isset($_POST["submit"])){
  header('Location: read.php');
  exit;
}
?>