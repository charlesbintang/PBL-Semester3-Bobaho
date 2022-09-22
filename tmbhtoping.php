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
    <link rel="stylesheet" href="css/tambah.css?v=0.0.2">
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
            <h2><i class="bi bi-bag-plus-fill"></i>&nbsp;Tambah Daftar Topping</h2>
        </div>
        <hr>
    </div>
    <div class="row mb-3">
        <div class="col-md">
            <form action="" method="post">
            <div class="mb-3">
                <label></label>
                <select class="form-select w-50">
                    <option selected disabled>---------------------Pilih Kategori---------------------</option>
                    <option value="1">Best Seller</option>
                    <option value="2">Coffee</option>
                    <option value="3">Yakult</option>
                    <option value="4">Chocolate</option>
                    <option value="5">Tea Series</option>
                    <option value="6">Fruit & Smoothies</option>
                    <option value="7">Mocktail</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Minuman</label>
                <input type="text" class="form-control w-50" id="nama" placeholder="Nama Minuman" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label>Topping</label>
                <select class="form-select w-50">
                    <option selected disabled>---------------------Pilih Topping---------------------</option>
                    <option value="1">Boba Crystal Jelly</option>
                    <option value="2">Black Boba</option>
                    <option value="3">Choco Chip</option>
                    <option value="4">Oreo</option>
                    <option value="5">Cheese</option>
                    <option value="6">Chocolate</option>
                    <option value="7">Cream Cheese</option>
                    <option value="8">Nata de Coco</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga Minuman</label>
                <input type="varchar" class="form-control w-50" id="Harga" placeholder="Harga Minuman" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="Catatan" class="form-label">Catatan</label>
                <textarea class="form-control w-50" id="Catatan" rows="3" placeholder="Catatan"></textarea>
            </div>
            <hr>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                    </div>
                </div>
            </div>
            <a href="login.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="tambah" class="btn btn-primary m-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Close Container -->

<!-- Footer -->
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-uppercase fw-bold">About</h4>
                <p>Bobaho merupakan stand boba dengan minuman boba terenak di Batam Bobaho merupakan stand boba dengan minuman boba terenak di Batam Bobaho merupakan stand boba dengan minuman boba terenak di Batam Bobaho merupakan stand boba dengan minuman boba terenak di Batam</p>
            </div>
            <div class="col-md-6 text-center">
                <h4 class="text-uppercase fw-bold">Link Account</h4>
                <a href="" target="_blank"></a>
                <a href="" target="_blank"></a>
                <a href="" target="_blank"></a>
                <a href="" target="_blank"></a>
            </div>
        </div>
    </div>
<!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>