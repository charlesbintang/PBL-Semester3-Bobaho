<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
$sesUnCus = $_SESSION['session_username'];
$sqlIdCus = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
$qryIdCus = mysqli_query($koneksi, $sqlIdCus);
$idCustomer = mysqli_fetch_array($qryIdCus);


if (!$koneksi) {
  die("Gagal terhubung dengan database : " . mysqli_connect_error());
}

$id_customer = $_POST["id_customer"];
$id_menu = $_POST["id_menu"];
$jumlah_pesanan = $_POST["jumlah_pesanan"];
$harga = $_POST["harga"];
$total_harga = $_POST["total_harga"];
$catatan = $_POST["catatan"];
// $tanggal = $_POST["tanggal"];
// $waktu = $_POST["submit"];

$query = "INSERT INTO `membeli` (`id_customer`, `id_menu`, `jumlah_pesanan`, `harga`, `total_harga`, `catatan`) VALUES ('$id_customer', '$id_menu', '$jumlah_pesanan', '$harga', '$total_harga', '$catatan');";

$saved = mysqli_query($koneksi, $query);

if ($saved == false) {
  echo '
  <script> alert("Pesanan gagal ditambahkan ke keranjang. Silahkan ulangi");
  document.location.href = "' . base_url("menu") . '";
  </script>
  ';
  exit;
} else {
  //update total harga pesanan
  $updateTotalHarga = "UPDATE `membeli` SET `total_harga` = `harga` * `jumlah_pesanan` WHERE id_customer = '$idCustomer[id_customer]'; ";
  $updateToHar = mysqli_query($koneksi, $updateTotalHarga);

  if ($updateToHar) {
    echo '
    <script> 
    alert("Pesanan berhasil ditambahkan ke keranjang!")
    document.location.href = "' . base_url("menu") . '"; 
    </script>
    ';
    exit;
  } else {
    echo '
    <script> 
    alert("Harga gagal diperbarui. Silahkan ulangi pemesanan");
    document.location.href = "' . base_url("menu") . '"; 
    </script>
    ';
    exit;
  }
}
