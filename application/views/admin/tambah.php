<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- DataTables css -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Own CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css?v=0.0.4">
    <title>Daftar Menu | CRUD PHP</title>

    <style>
        select.input-sm {
            height: 38px;
            line-height: 30px;
        }

        .child {
            color: white;
            background-color: #28533f;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD | PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
                <a href="<?= base_url('user/tambah_produk/'); ?>" class="btn btn-primary"><i class="bi bi-bag-plus-fill"></i>&nbsp;Tambah Daftar Produk</a>
                <a href="tmbhtoping.php" class="btn btn-secondary"><i class="bi bi-bag-plus-fill"></i>&nbsp;Ubah Status Produk</a>
            </div>
            <br> <br>
            <table id="tabel-data" class="display nowrap table-striped table-bordered table" style="width:100%; color:white;">
                <thead>
                    <tr>
                        <th>ID Menu</th>
                        <th>Source Gambar</th>
                        <th>Jenis Produk</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Rating</th>
                        <th>Catatan</th>
                        <th>Status Produk</th>
                        <th>Aksi Update</th>
                        <th>Aksi Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($queryAB as $row) {
                    ?>
                        <tr>
                            <td><?= $row->id_menu ?></td>
                            <td><?= $row->src_gambar ?></td>
                            <td><?= $row->jenis_produk ?></td>
                            <td><?= $row->kategori ?></td>
                            <td><?= $row->nama_produk ?></td>
                            <td><?= $row->harga ?></td>
                            <td><?= $row->rating ?></td>
                            <td><?= $row->catatan ?></td>
                            <td><?= $row->status_produk ?></td>
                            <td><a href="<?= base_url('user/edit_produk'); ?>/<?= $row->id_menu ?>">Update</a></td>
                            <td><a href="<?= base_url('user/fungsi_delete') ?>/<?= $row->id_menu ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Close Container -->
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel-data').DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>







</body>

</html>