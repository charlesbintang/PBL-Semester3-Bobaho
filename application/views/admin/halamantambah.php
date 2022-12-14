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
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- Own CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css?v=0.0.4">
    <title>Tambah | Daftar Menu | CRUD PHP</title>
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
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
                <h2><i class="bi bi-bag-plus-fill"></i>&nbsp;Tambah Daftar Menu</h2>
            </div>
            <hr>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <form action="<?= base_url('user/tambah') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Source Gambar</label>
                        <input type="text" class="form-control w-50" name="source" placeholder="Source Gambar" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Jenis Produk</label>
                        <input type="text" class="form-control w-50" name="jenis" placeholder="Jenis Produk" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Kategori</label>
                        <input type="text" class="form-control w-50" name="kategori" placeholder="Kategori" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control w-50" name="nama" placeholder="Nama Produk" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="text" class="form-control w-50" name="harga" placeholder="Harga" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Rating</label>
                        <input type="text" class="form-control w-50" name="rating" placeholder="Rating" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Catatan" class="form-label">Catatan</label>
                        <textarea class="form-control w-50" name="catatan" rows="3" placeholder="Catatan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Status Produk</label>
                        <input type="text" class="form-control w-50" name="status" placeholder="Status Produk" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary m-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>