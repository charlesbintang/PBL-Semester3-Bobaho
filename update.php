<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
$id_menu = $_GET['id'];
$data = query("SELECT * FROM menu_costumer WHERE id_menu = $id_menu")[0];

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}

function ubah($sambung){
  global $koneksi;

  $id_menu = $sambung['id_menu'];
  $jenisproduk = $sambung['jenisproduk'];
  $kategori = $sambung['kategori'];
  $namaproduk = $sambung['namaproduk'];
  $harga = $sambung['harga'];
  $catatan = $sambung['catatan'];

  $query = "UPDATE menu_costumer SET jenisproduk = '$jenisproduk', kategori = '$kategori', namaproduk = '$namaproduk', harga = '$harga', catatan = '$catatan' WHERE id_menu = $id_menu";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

if ( isset($_POST["submit"]) ){
  if (ubah($_POST) > 0){
    echo 
    "<script>
    alert('Data berhasil diubah');
    document.location.href = 'login.php';
    </script>";
  }
  else{
    echo 
    "<script>
    alert('Data gagal diubah');
    document.location.href = 'update.php';
    </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Ubah Data</h1>
      <form action="" method="post">
          <input type="hidden" name="id_menu" value="<?php echo $data['id_menu']; ?>">
          <label>Pilih Jenis Produk</label> 
          <select name="jenisproduk">
            <option value="minuman" <?php if($data["jenisproduk"] == 'minuman') echo 'selected'; ?> >Minuman</option>
            <option value="topping" <?php if($data["jenisproduk"] == 'topping') echo 'selected'; ?> >Topping</option>
          </select> <br>
          <label>Pilih Kategori</label>
          <select name="kategori">
            <option value="best seller" <?php if($data["kategori"] == 'best seller') echo 'selected'; ?> >Best Seller</option>
            <option value="chocolate" <?php if($data["kategori"] == 'chocolate') echo 'selected'; ?> >Chocolate</option>
            <option value="yakult" <?php if($data["kategori"] == 'yakult') echo 'selected'; ?> >Yakult</option>
            <option value="mocktail" <?php if($data["kategori"] == 'mocktail') echo 'selected'; ?> >Mocktail</option>
            <option value="fruit & smothies" <?php if($data["kategori"] == 'fruit & smothies') echo 'selected'; ?>>Fruit & Smothies</option>
            <option value="tea series" <?php if($data["kategori"] == 'tea series') echo 'selected'; ?> >Tea Series</option>
          </select> <br>
          <label>Nama Produk</label>
          <input type="text" name="namaproduk" value = "<?php echo $data['namaproduk']; ?>" > <br>
          <label>Harga</label>
          <input type="text" name="harga" value = "<?php echo $data['harga']; ?>" > <br>
          <label>Catatan :</label> <br>
          <textarea name="catatan" rows="8" cols="80"><?php echo $data['catatan']; ?></textarea> <br>
          <button type="submit" name="submit">Submit</button>
      </form>
  </body>
</html>