<?php
session_start();
//hapus error reporting ketika debugging. Jangan hapus jika tidak debugging
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION['session_username'])) {
  header("location: " . base_url() . "");
}
//dapatkan id_customer
$koneksi = mysqli_connect("localhost", "root", "", "bobaho");
$sesUnCus = $_SESSION['session_username'];
$qry = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
$sqlIdCus = mysqli_query($koneksi, $qry);
$idCustomer = mysqli_fetch_array($sqlIdCus);

//tampilkan kategori yang ada
$arrKategori = [];
$sqlKategori = "SELECT DISTINCT kategori FROM `menu_costumer`;";
$qryKategori = mysqli_query($koneksi, $sqlKategori);
while ($kategori = mysqli_fetch_array($qryKategori)) {
  $arrKategori[] = $kategori["kategori"];
}
$jumlahKategori = count($arrKategori);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu | Bobaho </title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
  <!-- Own CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>menuUtama.css">
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-green" style="top: -8px;">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('menu'); ?>">Boba and Tea</a>
        <img src="<?= base_url('assets/'); ?>aset boba/logo bobaho.png" alt="tidak tersedia" width="98px" onclick="document.location.href = '<?= base_url('menu'); ?>'">

        <form class="d-flex" role="search" action="" method="get">
          <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search" value="<?php echo $_GET['search'] ?>">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="wrapper-scroll">
          <?php for ($i = 0; $i < $jumlahKategori; $i++) { ?>
            <div class="wrapper-item">
              <button type="button" class="btn btn-primary" onclick="document.location.href = '<?= base_url('menu'); ?>?kat=<?= $arrKategori[$i]; ?>'"><?= $arrKategori[$i]; ?></button><br>
            </div>
          <?php } ?>
        </div>
      </div>
      </div>
    </nav>
  </header>
  <!-- Close Navbar -->

  <main>
    <h2 align="center" height="40%" class="textt">Menu</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        //looping PHP, Menu
        if (!empty($_GET['search']) || !empty($_GET['kat'])) {
          $search = "AND nama_produk LIKE '%" . $_GET['search'] . "%' AND kategori LIKE '%" . $_GET['kat'] . "%' ";
          $sql = "SELECT * FROM menu_costumer WHERE status_produk = 1 $search AND jenis_produk = 'minuman'";
        } else {
          $sql = "SELECT * FROM menu_costumer WHERE status_produk = 1 AND jenis_produk = 'minuman'";
        }

        $result = mysqli_query($koneksi, $sql);
        $counter = 1;
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <div class="carousel-item <?php if ($counter <= 1) {
                                      echo "active";
                                    } ?> ">
            <div class="card" style="width: 15rem;">
              <img src="<?= base_url('assets/'); ?>aset boba/1x/<?php echo $row["src_gambar"]; ?>" class="card-img-top" alt="..." width="100%">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row["nama_produk"]; ?></h5>
                <p class="card-text">Rp <?php echo $row["harga"]; ?>.000</p>

                <button id='decrement<?php echo $row['id_menu']; ?>' class="btn btn-light" aria-hidden="true" onclick="displayDecrement<?php echo $row['id_menu']; ?>()">-</button>
                <span id="valueDisplay<?php echo $row['id_menu']; ?>" class="box">1</span>
                <button id='increment<?php echo $row['id_menu']; ?>' class="btn btn-light" aria-hidden="true" onclick="displayIncrement<?php echo $row['id_menu']; ?>()">+</button>

                <form action="<?= base_url('menu/add') ?>" method="post">
                  <input type="hidden" name="id_customer" value="<?php echo $idCustomer['id_customer'] ?>">
                  <input type="hidden" name="id_menu" value="<?php echo $row['id_menu'] ?>">
                  <input name="jumlah_pesanan" class="inputt" id="input<?php echo $row['id_menu']; ?>" type="hidden" value="1" aria-valuemin<?php echo $row['id_menu']; ?>="1" autocomplete="off" aria-valuemax<?php echo $row['id_menu']; ?>="100" aria-valuenow<?php echo $row['id_menu']; ?>="1" tabIndex="0">
                  <input type="hidden" name="harga" value="<?php echo $row['harga'] ?>">
                  <input type="hidden" name="total_harga" value="0">
                  <input type="hidden" name="catatan" value=" ">
                  <!-- <input type="hidden" name="tanggal" value="<?php //echo date('d-m-Y'); 
                                                                  ?>"> -->
                  <button type="submit" name="submit" value="<?php //echo date('H:i:s'); 
                                                              ?>" class="btn btn-warning" style="margin-top: 10px; display: flex; justify-content: center;">Masukkan ke Keranjang</button>
                </form>
                <script>
                  let count<?php echo $row['id_menu']; ?> = 1;
                  const valueDisplay<?php echo $row['id_menu']; ?> = document.getElementById("valueDisplay<?php echo $row['id_menu']; ?>");

                  function displayIncrement<?php echo $row['id_menu']; ?>() {
                    count<?php echo $row['id_menu']; ?>++;
                    valueDisplay<?php echo $row['id_menu']; ?>.innerText = count<?php echo $row['id_menu']; ?>;
                  }

                  function displayDecrement<?php echo $row['id_menu']; ?>() {
                    if (count<?php echo $row['id_menu']; ?> > 1) {
                      count<?php echo $row['id_menu']; ?>--;
                      valueDisplay<?php echo $row['id_menu']; ?>.innerText = count<?php echo $row['id_menu']; ?>;
                    }
                  }

                  /** @type {!Element} The input element. */
                  let inputEl<?php echo $row['id_menu']; ?>;
                  /** @type {!Element} The button up element. */
                  let incrementButtonEl<?php echo $row['id_menu']; ?>;
                  /** @type {!Element} The button down element. */
                  let decrementButtonEl<?php echo $row['id_menu']; ?>;

                  /** @type {number} The value as a number. */
                  let valueNumber<?php echo $row['id_menu']; ?>;
                  /** @type {string} The string value of the input. */
                  let valueText<?php echo $row['id_menu']; ?>;

                  /** @type {number} Constant representing aria-valuemax<?php echo $row['id_menu']; ?>. */
                  let MIN_VALUE<?php echo $row['id_menu']; ?>;
                  /** @type {number} Constant representing aria-valuemin<?php echo $row['id_menu']; ?>. */
                  let MAX_VALUE<?php echo $row['id_menu']; ?>;
                  /** @type {number} Constant representing the initial aria-valuenow<?php echo $row['id_menu']; ?>. */
                  let INITIAL_VALUE<?php echo $row['id_menu']; ?>;
                  /** @type {number} Constant representing increment/decrement size. */
                  let STEP_SIZE<?php echo $row['id_menu']; ?>;

                  function init() {
                    inputEl<?php echo $row['id_menu']; ?> = document.getElementById('input<?php echo $row['id_menu']; ?>');
                    incrementButtonEl<?php echo $row['id_menu']; ?> = document.getElementById('increment<?php echo $row['id_menu']; ?>');
                    decrementButtonEl<?php echo $row['id_menu']; ?> = document.getElementById('decrement<?php echo $row['id_menu']; ?>');
                    MIN_VALUE<?php echo $row['id_menu']; ?> = Number(inputEl<?php echo $row['id_menu']; ?>.getAttribute('aria-valuemin<?php echo $row['id_menu']; ?>'));
                    MAX_VALUE<?php echo $row['id_menu']; ?> = Number(inputEl<?php echo $row['id_menu']; ?>.getAttribute('aria-valuemax<?php echo $row['id_menu']; ?>'));
                    valueNumber<?php echo $row['id_menu']; ?> = Number(inputEl<?php echo $row['id_menu']; ?>.getAttribute('aria-valuenow<?php echo $row['id_menu']; ?>'));
                    valueText<?php echo $row['id_menu']; ?> = inputEl<?php echo $row['id_menu']; ?>.value;
                    INITIAL_VALUE<?php echo $row['id_menu']; ?> = valueNumber<?php echo $row['id_menu']; ?>;
                    STEP_SIZE<?php echo $row['id_menu']; ?> = 1;
                    setEventListeners<?php echo $row['id_menu']; ?>();
                  }

                  function setEventListeners<?php echo $row['id_menu']; ?>() {
                    inputEl<?php echo $row['id_menu']; ?>.addEventListener('input', handleInputInput<?php echo $row['id_menu']; ?>, false);
                    inputEl<?php echo $row['id_menu']; ?>.addEventListener('keydown', handleInputKeyDown<?php echo $row['id_menu']; ?>, false);
                    incrementButtonEl<?php echo $row['id_menu']; ?>.addEventListener('click', handleIncrementButtonClick<?php echo $row['id_menu']; ?>, false);
                    decrementButtonEl<?php echo $row['id_menu']; ?>.addEventListener('click', handleDecrementButtonClick<?php echo $row['id_menu']; ?>, false);
                  }

                  function handleIncrementButtonClick<?php echo $row['id_menu']; ?>(e) {
                    increment<?php echo $row['id_menu']; ?>();
                    inputEl<?php echo $row['id_menu']; ?>.focus();
                  }


                  function handleDecrementButtonClick<?php echo $row['id_menu']; ?>(e) {
                    0
                    decrement<?php echo $row['id_menu']; ?>();
                    inputEl<?php echo $row['id_menu']; ?>.focus();
                  }

                  /**
                   * Sets input field to default upon blur of the empty input.
                   * Sets value to default if value is no longer valid.
                   * Otherwise truncates value and updates aria-valuenow<?php echo $row['id_menu']; ?>.
                   * @param {!Event} e
                   */
                  function handleInputInput<?php echo $row['id_menu']; ?>(e) {
                    if (!input.value || input.value === '-' || input.value === '.') {
                      // clear the value.
                      inputEl<?php echo $row['id_menu']; ?>.setAttribute('aria-valuenow<?php echo $row['id_menu']; ?>', '');
                      valueNumber<?php echo $row['id_menu']; ?> = null;
                      valueText<?php echo $row['id_menu']; ?> = input.value;
                      return;
                    }
                    let newValueNumber<?php echo $row['id_menu']; ?> = Number(input.value);
                    if (isNaN(newValueNumber<?php echo $row['id_menu']; ?>)) {
                      input.value = valueText<?php echo $row['id_menu']; ?>;
                    } else {
                      // Note that this will set an invalid aria-valuenow<?php echo $row['id_menu']; ?>.
                      // Bug tracking how and when to modify aria-valuenow<?php echo $row['id_menu']; ?>:
                      // https://github.com/w3c/aria-practices/issues/704
                      setValue<?php echo $row['id_menu']; ?>(newValueNumber<?php echo $row['id_menu']; ?>);
                    }
                  }

                  /**
                   * Switch that handles all valid non-numerical key downs.
                   * @param {!Event} e
                   */
                  function handleInputKeyDown<?php echo $row['id_menu']; ?>(e) {
                    switch (e.key) {
                      case 'ArrowUp':
                        increment<?php echo $row['id_menu']; ?>();
                        break;
                      case 'ArrowDown':
                        decrement<?php echo $row['id_menu']; ?>();
                        break;
                      case 'Home':
                        setValue<?php echo $row['id_menu']; ?>(MIN_VALUE<?php echo $row['id_menu']; ?>);
                        break;
                      case 'End':
                        setValue<?php echo $row['id_menu']; ?>(MAX_VALUE<?php echo $row['id_menu']; ?>);
                        break;
                      default:
                        return;
                    }
                    e.preventDefault();
                    e.stopPropagation();
                  }

                  // add jsdoc
                  function increment<?php echo $row['id_menu']; ?>() {
                    if (valueNumber<?php echo $row['id_menu']; ?> >= MAX_VALUE<?php echo $row['id_menu']; ?>) {
                      setValue<?php echo $row['id_menu']; ?>(MAX_VALUE<?php echo $row['id_menu']; ?>);
                    } else if (valueNumber<?php echo $row['id_menu']; ?> < MIN_VALUE<?php echo $row['id_menu']; ?>) {
                      setValue<?php echo $row['id_menu']; ?>(MIN_VALUE<?php echo $row['id_menu']; ?>);
                    } else {
                      setValue<?php echo $row['id_menu']; ?>(valueNumber<?php echo $row['id_menu']; ?> + STEP_SIZE<?php echo $row['id_menu']; ?>)
                    }
                  }

                  // add jsdoc
                  function decrement<?php echo $row['id_menu']; ?>() {
                    if (valueNumber<?php echo $row['id_menu']; ?> <= MIN_VALUE<?php echo $row['id_menu']; ?>) {
                      setValue<?php echo $row['id_menu']; ?>(MIN_VALUE<?php echo $row['id_menu']; ?>);
                    } else if (valueNumber<?php echo $row['id_menu']; ?> > MAX_VALUE<?php echo $row['id_menu']; ?>) {
                      setValue<?php echo $row['id_menu']; ?>(MAX_VALUE<?php echo $row['id_menu']; ?>);
                    } else {
                      setValue<?php echo $row['id_menu']; ?>(valueNumber<?php echo $row['id_menu']; ?> - STEP_SIZE<?php echo $row['id_menu']; ?>)
                    }
                  }

                  /**
                   * Sets value property and aria-valuenow<?php echo $row['id_menu']; ?> attribute together.
                   * @param {number} newValue
                   */
                  function setValue<?php echo $row['id_menu']; ?>(newValue<?php echo $row['id_menu']; ?>) {
                    inputEl<?php echo $row['id_menu']; ?>.value = newValue<?php echo $row['id_menu']; ?>;
                    inputEl<?php echo $row['id_menu']; ?>.setAttribute('aria-valuenow<?php echo $row['id_menu']; ?>', newValue<?php echo $row['id_menu']; ?>);
                    valueNumber<?php echo $row['id_menu']; ?> = newValue<?php echo $row['id_menu']; ?>;
                    valueText<?php echo $row['id_menu']; ?> = inputEl<?php echo $row['id_menu']; ?>.value;
                  }
                  window.addEventListener('load', init, false);
                </script>
              </div>
            </div>
            <br>
            <p class="fst-italic" align="center">Rasa:<br> <?php echo $row["catatan"] ?></p>
          </div>
        <?php $counter++;
        }
        //end of looping php, Menu
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </main>

  <footer>
    <nav class="navbar navbar-expand-lg fixed-bottom bg-green">
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <!-- btn log out -->
        <button type="button" class="btn btn-warning" onclick="document.location.href = '<?= base_url(); ?>'">
          <svg style="width:10rem;height:2rem" viewBox="0 0 24 24">
            <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
          </svg>
        </button>
        <!-- btn Lihat Keranjang -->
        <button type="button" class="btn btn-warning" onclick="document.location.href = '<?= base_url('menu/cart'); ?>'">
          <svg xmlns="http://www.w3.org/2000/svg" width="10rem" height="2rem" viewBox="0 0 24 24">
            <path fill="#000000" d="M10 0V4H8L12 8L16 4H14V0M1 2V4H3L6.6 11.6L5.2 14C5.1 14.3 5 14.6 5 15C5 16.1 5.9 17 7 17H19V15H7.4C7.3 15 7.2 14.9 7.2 14.8V14.7L8.1 13H15.5C16.2 13 16.9 12.6 17.2 12L21.1 5L19.4 4L15.5 11H8.5L4.3 2M7 18C5.9 18 5 18.9 5 20S5.9 22 7 22 9 21.1 9 20 8.1 18 7 18M17 18C15.9 18 15 18.9 15 20S15.9 22 17 22 19 21.1 19 20 18.1 18 17 18Z" />
          </svg>
        </button>
      </div>
    </nav>
  </footer>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>