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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css?v=0.0.3">
    <title>Daftar Menu | CRUD PHP</title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top text-uppercase">
    <div class="container">
        <a class="navbar-brand" href="login.php">BOBAHO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<!-- Close Navbar -->

<!-- Container -->

<div class="container">
    <div class="row my-3">
        <div class="col-md">
            <h2 class="text-uppercase text-center fw-bold">Daftar Menu</h2>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="cold-md">
            <a href="tambah.php" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i>&nbsp;Tambah Daftar Produk</a>
            <a href="fixedadminpesanan.php" class="btn btn-success ms-1"><i class="bi bi-cart2"></i></i>&nbsp;Keranjang</a>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Jenis Produk</th>
                    <th>kategori</th>
                    <th>Nama Produk</th>
                    <th>harga </th>
                    <th>Catatan</th>
                    <th colspan = 2>Tindakan</th>
                </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Close Container -->

<!-- Footer -->
    <div class="container-fluid bg-dark fixed-bottom text-white">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-uppercase fw-bold">About</h4>
                <p>Bobaho adalah outlet tempat penjualan minuman dengan berbagai macam rasa khususnya minuman boba 
outlet ini sudah memiliki berbagai cabang di kota-kota besar seperti medan,batam,dan pangkal pinang.
</p>
           
    </div>
<!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    
    <!-- Data Tables -->
</body>
</html>