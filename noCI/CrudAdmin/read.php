<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
$statistik = query("SELECT * FROM menu_costumer");

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kumpulan Data Produk</title>
  </head>
  <body>
    <h1>Hasil Data</h1>
    <table border = 1 cellpadding = 10 cellspacing = 0>
      <tr>
        <th>Nomor</th>
        <th>Jenis Produk</th>
        <th>Kategori</th>
        <th>Nama Produk</th>
        <th>Harga </th>
        <th>Jumlah Produk</th>
        <th>Catatan</th>
        <th colspan = 2>Tindakan</th>
      </tr>

      <?php $y = 1; ?>
      <?php foreach($statistik as $data) : ?>
      <tr>
        <td><?php echo $y; ?></td>
        <td><?php echo $data["jenisproduk"]; ?></td>
        <td><?php echo $data["kategori"]; ?></td>
        <td><?php echo $data["namaproduk"]; ?></td>
        <td><?php echo $data["harga"]; ?></td>
        <td><?php echo $data["catatan"]; ?></td>
        <td> <a href="update.php?id=<?php echo $data["id_menu"]; ?>">Ubah</a> </td>
        <td> <a href="delete.php?id=<?php echo $data["id_menu"]; ?>">Hapus</a> </td>
      </tr>
      <?php $y++; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <p>Total Data = <?php echo ($y - 1); ?></p>
    <br>
    <a href="index.php">Isi Data</a>
  </body>
</html>