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
    <!-- Own CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css?v=0.0.4">
    <title>Perbarui Menu | Admin</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('admin') ?>">Admin</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin') ?>">Home</a>
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
                <h2><i class="bi bi-bag-plus-fill"></i>&nbsp;Perbarui Menu</h2>
            </div>
            <hr>
        </div>
        <div class="row mb-3">
            <div class="col-md">
                <form action="<?= base_url('admin/update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $queryBD->id_menu ?>">
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Jenis Produk</label>
                        <select class="form-select w-50" name="jenis">
                            <option value="minuman" <?php if ($queryBD->jenis_produk == 'minuman') {
                                                        echo 'selected';
                                                    }  ?>>Minuman</option>
                            <option value="topping" <?php if ($queryBD->jenis_produk == 'topping') {
                                                        echo 'selected';
                                                    }  ?>>Topping</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Kategori</label>
                        <select class="form-select w-50" name="kategori">
                            <option value="Best Seller" <?php if ($queryBD->kategori == 'Best Seller') {
                                                            echo 'selected';
                                                        }  ?>>Best Seller</option>
                            <option value="New Series" <?php if ($queryBD->kategori == 'New Series') {
                                                            echo 'selected';
                                                        }  ?>>New Series</option>
                            <option value="Chocolate" <?php if ($queryBD->kategori == 'Chocolate') {
                                                            echo 'selected';
                                                        }  ?>>Chocolate</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control w-50" name="nama" value="<?= $queryBD->nama_produk ?>" placeholder="Nama Produk" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="text" class="form-control w-50" name="harga" value="<?= $queryBD->harga ?>" placeholder="mis. 14" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Rating</label>
                        <input type="text" class="form-control w-50" name="rating" value="<?= $queryBD->rating ?>" placeholder="mis. 4.9" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="Catatan" class="form-label">Catatan</label>
                        <textarea class="form-control w-50" name="catatan" rows="3" placeholder="Catatan"><?= $queryBD->catatan ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Status Produk</label>
                        <select class="form-select w-50" name="status">
                            <option value="1" <?php if ($queryBD->status_produk == '1') {
                                                    echo 'selected';
                                                }  ?>>Aktif</option>
                            <option value="0" <?php if ($queryBD->status_produk == '0') {
                                                    echo 'selected';
                                                }  ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <hr>
                    <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="tambah" class="btn btn-primary m-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>