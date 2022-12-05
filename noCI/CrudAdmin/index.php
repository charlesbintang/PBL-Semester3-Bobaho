<?php
  session_start();
  if(!isset($_SESSION['session_username_admin'])){
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Register</title>
  </head>
  <body>
    <h1>Isi Daftar Minuman</h1>
    <form action="create.php" method="post">
      <label>Pilih Jenis Produk</label> 
      <select name="jenisproduk">
        <option value="minuman">Minuman</option>
        <option value="topping">Topping</option>
      </select> <br>
      <label>Pilih Kategori</label>
      <select name="kategori">
        <option value="best seller">Best Seller</option>
        <option value="chocolate">Chocolate</option>
        <option value="yakult">Yakult</option>
        <option value="mocktail">Mocktail</option>
        <option value="fruit & smothies">Fruit & Smothies</option>
        <option value="tea series">Tea Series</option>
      </select> <br>
      <label>Nama Produk</label>
      <input type="text" name="namaproduk"> <br>
      <label>Harga</label>
      <input type="text" name="harga"> <br>
      <label>Catatan :</label> <br>
      <textarea name="catatan" rows="8" cols="80"></textarea> <br>
      <button type="submit" name="submit">Submit</button>
    </form> <br>
    <a href="read.php">Lihat semua data produk</a>
  </body>
</html>